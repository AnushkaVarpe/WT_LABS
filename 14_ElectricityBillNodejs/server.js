const express = require('express');
const path = require('path');

const app = express();
const PORT = 3000;

// Serve static files
app.use(express.static(path.join(__dirname, 'public')));

// Middleware to parse JSON data
app.use(express.json());

// Endpoint to calculate electricity bill
app.post('/calculate', (req, res) => {
    const { units } = req.body;
    let bill = 0;

    if (units <= 50) {
        bill = units * 3.5;
    } else if (units <= 150) {
        bill = (50 * 3.5) + ((units - 50) * 4.0);
    } else if (units <= 250) {
        bill = (50 * 3.5) + (100 * 4.0) + ((units - 150) * 5.2);
    } else {
        bill = (50 * 3.5) + (100 * 4.0) + (100 * 5.2) + ((units - 250) * 6.5);
    }

    res.json({ bill });
});

// Start server
app.listen(PORT, () => {
    console.log(`Server is running on http://localhost:${PORT}`);
});
