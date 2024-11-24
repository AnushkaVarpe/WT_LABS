let currentInput = '';  // Current expression (including numbers and operators)
let operator = '';      // Current operator
let lastInput = '';     // To store the last number entered

const display = document.getElementById('display');

// Function to append numbers to the display
function appendNumber(number) {
    currentInput += number;  // Append the clicked number to the current input
    display.value = currentInput;  // Update the display to show the current input
}

// Function to set the operator and append it to the display
function setOperator(op) {
    if (currentInput === '') return;  // Prevent operator when no number entered
    if (lastInput !== '') {
        calculateResult();  // Calculate if there's a previous input
    }
    operator = op;
    currentInput += ' ' + operator + ' ';  // Append the operator to the current input
    display.value = currentInput;  // Update the display
}

// Function to clear the display
function clearDisplay() {
    currentInput = '';  // Clear the input string
    operator = '';      // Clear the operator
    display.value = ''; // Clear the display
}

// Function to calculate the result
function calculateResult() {
    if (currentInput === '') return;

    try {
        // Evaluate the expression using the built-in JavaScript eval function
        const result = eval(currentInput); // This will evaluate the string as a mathematical expression
        display.value = result;  // Show the result on the display
        currentInput = result.toString();  // Save the result as current input for next calculation
        operator = '';  // Reset operator
    } catch (error) {
        display.value = 'Error';  // If invalid expression, show error
    }
}
