import React from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom'; 
import Header from './components/Header';
import StudentLogin from './components/StudentLogin';
import StudentRegister from './components/StudentRegister';
import ComplaintForm from './components/ComplaintForm';
import AdminLogin from './components/AdminLogin';
import AdminDashboard from './components/AdminDashboard';
import AdminRegister from './components/AdminRegister';

function App() {
  return (
    <Router>
      <Header /> {/* Display the navigation bar on all pages */}
      <Routes>
        <Route path="/" element={<StudentLogin />} />
        <Route path="/register" element={<StudentRegister />} />
        <Route path="/complaint-form" element={<ComplaintForm />} />
        <Route path="/admin-login" element={<AdminLogin />} />
        <Route path="/admin-dashboard" element={<AdminDashboard />} />
        <Route path="/admin-register" element={<AdminRegister />} />
      </Routes>
    </Router>
  );
}

export default App;
