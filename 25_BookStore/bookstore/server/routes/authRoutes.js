const express = require('express');
const bcrypt = require('bcryptjs');
const { registerUser, findUserByEmail } = require('../models/User');
const router = express.Router();

router.post('/register', (req, res) => {
  const { name, email, password } = req.body;
  registerUser(name, email, password, (err) => {
    if (err) return res.status(500).send('Registration failed');
    res.status(200).send('Registration successful');
  });
});

router.post('/login', (req, res) => {
  const { email, password } = req.body;
  findUserByEmail(email, (err, results) => {
    if (err || !results.length) return res.status(400).send('User not found');
    bcrypt.compare(password, results[0].password, (err, isMatch) => {
      if (err || !isMatch) return res.status(400).send('Invalid password');
      res.status(200).send('Login successful');
    });
  });
});

module.exports = router;
