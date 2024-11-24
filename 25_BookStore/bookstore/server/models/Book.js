const db = require('../config/db');

const getBooks = (callback) => {
  const query = 'SELECT * FROM books';
  db.query(query, callback);
};

module.exports = { getBooks };
