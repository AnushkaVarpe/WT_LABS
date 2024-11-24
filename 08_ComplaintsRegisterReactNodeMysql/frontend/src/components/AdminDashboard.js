import React, { useEffect, useState } from 'react';
import axios from 'axios';

function AdminDashboard() {
  const [complaints, setComplaints] = useState([]);

  useEffect(() => {
    const fetchComplaints = async () => {
      const token = localStorage.getItem('adminToken'); // Get admin token

      try {
        const response = await axios.get('http://localhost:5000/api/admin/complaints', {
          headers: {
            Authorization: token,
          },
        });
        setComplaints(response.data);
      } catch (error) {
        console.error('Error fetching complaints:', error);
      }
    };

    fetchComplaints();
  }, []);

  return (
    <div>
      <h2>Admin Dashboard</h2>
      <h3>All Complaints</h3>
      <table className="table">
        <thead>
          <tr>
            <th>Serial No.</th>
            <th>Student Name</th>
            <th>Complaint Title</th>
            <th>Complaint Description</th>
          </tr>
        </thead>
        <tbody>
          {complaints.map((complaint, index) => (
            <tr key={complaint.id}>
              <td>{index + 1}</td> {/* Serial Number */}
              <td>{complaint.student_name}</td>
              <td>{complaint.title}</td>
              <td>{complaint.description}</td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}

export default AdminDashboard;
