import React, { useState } from 'react';
import './App.css';

function App() {
  // Hardcoded exchange rate (1 USD = 83 INR as an example)
  const exchangeRate = 83;

  // States to manage the input and conversion result
  const [dollars, setDollars] = useState(0);
  const [rupees, setRupees] = useState(0);

  // Handle input change for dollars
  const handleDollarChange = (e) => {
    const dollarValue = e.target.value;
    setDollars(dollarValue);
    setRupees(dollarValue * exchangeRate); // Convert to INR
  };

  return (
    <div className="App">
      <h1>Currency Converter</h1>
      <div className="converter-container">
        <label htmlFor="usd-input">Enter Amount in USD:</label>
        <input
          id="usd-input"
          type="number"
          value={dollars}
          onChange={handleDollarChange}
          placeholder="Enter USD"
        />
        <p>Equivalent in INR: ₹{rupees}</p>
      </div>
    </div>
  );
}

export default App;
