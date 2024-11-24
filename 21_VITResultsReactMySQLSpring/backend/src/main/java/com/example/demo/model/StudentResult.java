package com.example.demo.model;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;

@Entity
public class StudentResult {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)

    private int id;
    private String name;
    private String rollNo;
    private int semester;
    private int webProgrammingMSE;
    private int webProgrammingESE;
    private int dataStructuresMSE;
    private int dataStructuresESE;
    private int databaseSystemsMSE;
    private int databaseSystemsESE;
    private int operatingSystemsMSE;
    private int operatingSystemsESE;
    private float totalWebProgramming;
    private float totalDataStructures;
    private float totalDatabaseSystems;
    private float totalOperatingSystems;
    private float sgpa;

    // Getters and setters
    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getRollNo() {
        return rollNo;
    }

    public void setRollNo(String rollNo) {
        this.rollNo = rollNo;
    }

    public int getSemester() {
        return semester;
    }

    public void setSemester(int semester) {
        this.semester = semester;
    }

    // Getters and Setters for Web Programming MSE and ESE
    public int getWebProgrammingMSE() {
        return webProgrammingMSE;
    }

    public void setWebProgrammingMSE(int webProgrammingMSE) {
        this.webProgrammingMSE = webProgrammingMSE;
    }

    public int getWebProgrammingESE() {
        return webProgrammingESE;
    }

    public void setWebProgrammingESE(int webProgrammingESE) {
        this.webProgrammingESE = webProgrammingESE;
    }

// Getters and Setters for Data Structures MSE and ESE
    public int getDataStructuresMSE() {
        return dataStructuresMSE;
    }

    public void setDataStructuresMSE(int dataStructuresMSE) {
        this.dataStructuresMSE = dataStructuresMSE;
    }

    public int getDataStructuresESE() {
        return dataStructuresESE;
    }

    public void setDataStructuresESE(int dataStructuresESE) {
        this.dataStructuresESE = dataStructuresESE;
    }

// Getters and Setters for Database Systems MSE and ESE
    public int getDatabaseSystemsMSE() {
        return databaseSystemsMSE;
    }

    public void setDatabaseSystemsMSE(int databaseSystemsMSE) {
        this.databaseSystemsMSE = databaseSystemsMSE;
    }

    public int getDatabaseSystemsESE() {
        return databaseSystemsESE;
    }

    public void setDatabaseSystemsESE(int databaseSystemsESE) {
        this.databaseSystemsESE = databaseSystemsESE;
    }

// Getters and Setters for Operating Systems MSE and ESE
    public int getOperatingSystemsMSE() {
        return operatingSystemsMSE;
    }

    public void setOperatingSystemsMSE(int operatingSystemsMSE) {
        this.operatingSystemsMSE = operatingSystemsMSE;
    }

    public int getOperatingSystemsESE() {
        return operatingSystemsESE;
    }

    public void setOperatingSystemsESE(int operatingSystemsESE) {
        this.operatingSystemsESE = operatingSystemsESE;
    }

    public float getTotalWebProgramming() {
        return totalWebProgramming;
    }

    public void setTotalWebProgramming(float totalWebProgramming) {
        this.totalWebProgramming = totalWebProgramming;
    }

    public float getTotalDataStructures() {
        return totalDataStructures;
    }

    public void setTotalDataStructures(float totalDataStructures) {
        this.totalDataStructures = totalDataStructures;
    }

    public float getTotalDatabaseSystems() {
        return totalDatabaseSystems;
    }

    public void setTotalDatabaseSystems(float totalDatabaseSystems) {
        this.totalDatabaseSystems = totalDatabaseSystems;
    }

    public float getTotalOperatingSystems() {
        return totalOperatingSystems;
    }

    public void setTotalOperatingSystems(float totalOperatingSystems) {
        this.totalOperatingSystems = totalOperatingSystems;
    }

    public float getSgpa() {
        return sgpa;
    }

    public void setSgpa(float sgpa) {
        this.sgpa = sgpa;
    }
}
