import React, { useState } from 'react';
import axios from 'axios';
import { useNavigate } from 'react-router-dom';

function ComplaintForm() {
  const [title, setTitle] = useState('');
  const [description, setDescription] = useState('');
  const navigate = useNavigate();

  const handleSubmitComplaint = async (e) => {
    e.preventDefault();

    const token = localStorage.getItem('token'); // Get token from localStorage

    try {
      const response = await axios.post(
        'http://localhost:5000/api/students/complaints',
        { title, description },
        {
          headers: {
            Authorization: token, // Pass the token for authentication
          },
        }
      );
      alert('Complaint submitted successfully');
      navigate('/'); // Redirect to login page or a success page
    } catch (error) {
      console.error('Error submitting complaint:', error);
      alert('Failed to submit complaint');
    }
  };

  return (
    <div>
      <h2>Submit Complaint</h2>
      <form onSubmit={handleSubmitComplaint}>
        <input
          type="text"
          placeholder="Complaint Title"
          value={title}
          onChange={(e) => setTitle(e.target.value)}
          required
        />
        <textarea
          placeholder="Complaint Description"
          value={description}
          onChange={(e) => setDescription(e.target.value)}
          required
        ></textarea>
        <button type="submit">Submit Complaint</button>
      </form>
    </div>
  );
}

export default ComplaintForm;
