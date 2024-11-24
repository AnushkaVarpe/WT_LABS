package com.example.demo.service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.example.demo.model.StudentResult;
import com.example.demo.repository.StudentResultRepository;

@Service
public class ResultService {

    @Autowired
    private StudentResultRepository studentResultRepository;

    public StudentResult saveStudentResult(StudentResult studentResult) {
        // Log input
        System.out.println("Received student result: " + studentResult);

        // Calculate total marks
        studentResult.setTotalWebProgramming(calculateTotal(studentResult.getWebProgrammingMSE(), studentResult.getWebProgrammingESE()));
        studentResult.setTotalDataStructures(calculateTotal(studentResult.getDataStructuresMSE(), studentResult.getDataStructuresESE()));
        studentResult.setTotalDatabaseSystems(calculateTotal(studentResult.getDatabaseSystemsMSE(), studentResult.getDatabaseSystemsESE()));
        studentResult.setTotalOperatingSystems(calculateTotal(studentResult.getOperatingSystemsMSE(), studentResult.getOperatingSystemsESE()));

        // Calculate SGPA
        float sgpa = calculateSGPA(studentResult);
        studentResult.setSgpa(sgpa);

        // Log processed data
        System.out.println("Processed student result: " + studentResult);

        return studentResultRepository.save(studentResult);
    }

    private float calculateTotal(int mse, int ese) {
        return ((mse / 50.0f) * 30) + ((ese / 100.0f) * 70);
    }

    private float calculateSGPA(StudentResult result) {
        float totalMarks = result.getTotalWebProgramming() + result.getTotalDataStructures()
                + result.getTotalDatabaseSystems() + result.getTotalOperatingSystems();
        return totalMarks / 4; // Calculate SGPA by averaging the total marks
    }
}
