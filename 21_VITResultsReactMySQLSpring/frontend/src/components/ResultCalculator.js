import React, { useState } from "react";
import axios from "axios";
import "../index.css"; // Assuming the index.css file is at the same level

const ResultCalculator = () => {
  const [subjects, setSubjects] = useState([
    { name: "Web Programming", mse: "", ese: "", total: null },
    { name: "Data Structures", mse: "", ese: "", total: null },
    { name: "Database Systems", mse: "", ese: "", total: null },
    { name: "Operating Systems", mse: "", ese: "", total: null },
  ]);

  const [studentInfo, setStudentInfo] = useState({
    name: "",
    rollNo: "",
    semester: "5",
  });

  const calculateTotal = (mse, ese) => {
    const mseMark = parseFloat(mse);
    const eseMark = parseFloat(ese);

    if (!isNaN(mseMark) && !isNaN(eseMark)) {
      const msePercentage = (mseMark / 50) * 30; // MSE is out of 50, converted to 30%
      const esePercentage = (eseMark / 100) * 70; // ESE is out of 100, converted to 70%
      return msePercentage + esePercentage;
    }
    return null;
  };

  const handleSubjectChange = (index, field, value) => {
    const newSubjects = [...subjects];
    newSubjects[index][field] = value;

    if (field === "mse" || field === "ese") {
      newSubjects[index].total = calculateTotal(
        field === "mse" ? value : newSubjects[index].mse,
        field === "ese" ? value : newSubjects[index].ese
      );
    }

    setSubjects(newSubjects);
  };

  const calculateSGPA = () => {
    const validSubjects = subjects.filter((sub) => sub.total !== null);
    if (validSubjects.length === 0) return 0;

    const totalGradePoints = validSubjects.reduce((acc, sub) => {
      const grade = calculateGrade(sub.total);
      const gradePoint =
        grade === "O"
          ? 10
          : grade === "A+"
          ? 9
          : grade === "A"
          ? 8
          : grade === "B+"
          ? 7
          : grade === "B"
          ? 6
          : 0;
      return acc + gradePoint;
    }, 0);

    return (totalGradePoints / validSubjects.length).toFixed(2);
  };

  const calculateGrade = (total) => {
    if (total >= 90) return "O";
    if (total >= 80) return "A+";
    if (total >= 70) return "A";
    if (total >= 60) return "B+";
    if (total >= 50) return "B";
    return "F";
  };

  const handleSubmit = async () => {
    try {
      await axios.post("http://localhost:8080/api/results", {
        studentInfo,
        subjects,
      });
      alert("Results submitted successfully!");
    } catch (error) {
      console.error("Error submitting results:", error);
    }
  };

  return (
    <div className="container">
      <h2>VIT Semester Result Calculator</h2>
      <label>Student Name:</label>
      <input
        type="text"
        value={studentInfo.name}
        onChange={(e) =>
          setStudentInfo({ ...studentInfo, name: e.target.value })
        }
      />
      <label>Roll Number:</label>
      <input
        type="text"
        value={studentInfo.rollNo}
        onChange={(e) =>
          setStudentInfo({ ...studentInfo, rollNo: e.target.value })
        }
      />
      <label>Semester:</label>
      <input type="text" value={studentInfo.semester} readOnly />

      <table>
        <thead>
          <tr>
            <th>Subject</th>
            <th>MSE (50)</th>
            <th>ESE (100)</th>
            <th>Total (100)</th>
            <th>Grade</th>
          </tr>
        </thead>
        <tbody>
          {subjects.map((subject, index) => (
            <tr key={index}>
              <td>{subject.name}</td>
              <td>
                <input
                  type="number"
                  value={subject.mse}
                  onChange={(e) =>
                    handleSubjectChange(index, "mse", e.target.value)
                  }
                  min="0"
                  max="50"
                />
              </td>
              <td>
                <input
                  type="number"
                  value={subject.ese}
                  onChange={(e) =>
                    handleSubjectChange(index, "ese", e.target.value)
                  }
                  min="0"
                  max="100"
                />
              </td>
              <td>{subject.total ? subject.total.toFixed(2) : "-"}</td>
              <td>{subject.total ? calculateGrade(subject.total) : "-"}</td>
            </tr>
          ))}
        </tbody>
      </table>

      <div className="sgpabox">Semester GPA: {calculateSGPA()}</div>
      <button onClick={handleSubmit}>Submit Results</button>
    </div>
  );
};

export default ResultCalculator;
