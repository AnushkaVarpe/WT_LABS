const express = require('express');
const cors = require('cors');
const bodyParser = require('body-parser');
const authRoutes = require('./routes/authRoutes');
const bookRoutes = require('./routes/bookRoutes');
const app = express();

app.use(cors());
app.use(bodyParser.json());
app.use('/api', authRoutes);
app.use('/api', bookRoutes);

app.listen(5000, () => {
  console.log('Server running on port 5000');
});
