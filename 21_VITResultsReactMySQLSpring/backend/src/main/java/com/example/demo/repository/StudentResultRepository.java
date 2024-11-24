package com.example.demo.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.example.demo.model.StudentResult;

public interface StudentResultRepository extends JpaRepository<StudentResult, Integer> {
}
