const express = require('express');
const { getBooks } = require('../models/Book');
const router = express.Router();

router.get('/books', (req, res) => {
  getBooks((err, results) => {
    if (err) return res.status(500).send('Error fetching books');
    res.status(200).json(results);
  });
});

module.exports = router;
