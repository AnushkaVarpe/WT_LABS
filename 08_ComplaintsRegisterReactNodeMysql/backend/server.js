const express = require('express');
const mysql = require('mysql2');
const bcrypt = require('bcryptjs');
const jwt = require('jsonwebtoken');
const cors = require('cors');
const bodyParser = require('body-parser');

const app = express();
const port = 5000;

app.use(cors());
app.use(bodyParser.json()); // For parsing application/json

// MySQL Database Connection
const db = mysql.createConnection({
  host: 'localhost',
  user: 'root', // Replace with your MySQL username
  password: 'anu@210904', // Replace with your MySQL password
  database: 'complaints_system' // Database name
});

db.connect((err) => {
  if (err) {
    console.error('Database connection failed: ', err.stack);
    return;
  }
  console.log('Connected to MySQL database');
});

// Middleware for verifying JWT
const verifyToken = (req, res, next) => {
  const token = req.headers['authorization'];

  if (!token) return res.status(403).send({ message: 'No token provided' });

  jwt.verify(token, 'secretkey', (err, decoded) => {
    if (err) return res.status(500).send({ message: 'Failed to authenticate token' });
    req.userId = decoded.id;
    next();
  });
};

// Student Registration
app.post('/api/students/register', (req, res) => {
  const { name, email, password } = req.body;

  const hashedPassword = bcrypt.hashSync(password, 8);
  const query = 'INSERT INTO students (name, email, password) VALUES (?, ?, ?)';

  db.query(query, [name, email, hashedPassword], (err, result) => {
    if (err) return res.status(500).send({ message: 'Error registering student' });
    res.status(200).send({ message: 'Student registered successfully' });
  });
});

// Student Login
app.post('/api/students/login', (req, res) => {
  const { email, password } = req.body;

  const query = 'SELECT * FROM students WHERE email = ?';
  db.query(query, [email], (err, results) => {
    if (err) return res.status(500).send({ message: 'Error logging in' });

    if (results.length === 0) return res.status(404).send({ message: 'Student not found' });

    const student = results[0];
    const isValidPassword = bcrypt.compareSync(password, student.password);

    if (!isValidPassword) return res.status(401).send({ message: 'Invalid credentials' });

    const token = jwt.sign({ id: student.id }, 'secretkey', { expiresIn: '1h' });
    res.status(200).send({ token });
  });
});

// Complaint Registration (Student)
app.post('/api/students/complaints', verifyToken, (req, res) => {
  const { title, description } = req.body;
  const student_id = req.userId; // Get student ID from the token

  const query = 'INSERT INTO complaints (title, description, student_id) VALUES (?, ?, ?)';
  db.query(query, [title, description, student_id], (err, result) => {
    if (err) return res.status(500).send({ message: 'Error submitting complaint' });
    res.status(200).send({ message: 'Complaint registered successfully' });
  });
});

// Admin Login
app.post('/api/admin/login', (req, res) => {
  const { email, password } = req.body;

  const query = 'SELECT * FROM admins WHERE email = ?';
  db.query(query, [email], (err, results) => {
    if (err) return res.status(500).send({ message: 'Error logging in' });

    if (results.length === 0) return res.status(404).send({ message: 'Admin not found' });

    const admin = results[0];
    const isValidPassword = bcrypt.compareSync(password, admin.password);

    if (!isValidPassword) return res.status(401).send({ message: 'Invalid credentials' });

    const token = jwt.sign({ id: admin.id }, 'secretkey', { expiresIn: '1h' });
    res.status(200).send({ token });
  });
});

// Admin Registration
app.post('/api/admin/register', (req, res) => {
  const { name, email, password } = req.body;

  // Hash the password before saving it
  const hashedPassword = bcrypt.hashSync(password, 8);

  const query = 'INSERT INTO admins (name, email, password) VALUES (?, ?, ?)';

  db.query(query, [name, email, hashedPassword], (err, result) => {
    if (err) {
      console.error(err);
      return res.status(500).send({ message: 'Error registering admin' });
    }
    res.status(200).send({ message: 'Admin registered successfully' });
  });
});


app.get('/api/admin/complaints', verifyToken, (req, res) => {
  const query = `
    SELECT complaints.id, students.name AS student_name, complaints.title, complaints.description 
    FROM complaints 
    JOIN students ON complaints.student_id = students.id
  `;
  db.query(query, (err, results) => {
    if (err) return res.status(500).send({ message: 'Error fetching complaints' });
    res.status(200).send(results);
  });
});


// Start Server
app.listen(port, () => {
  console.log(`Server running on http://localhost:${port}`);
});
