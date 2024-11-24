package com.electricity.controller;

import com.electricity.service.BillService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;

@Controller
public class BillController {

    @Autowired
    private BillService billService;

    @GetMapping("/")
    public String home() {
        return "index"; // This serves the "index.html" from the templates folder
    }

    @PostMapping("/calculate")
public String calculateBill(@RequestParam("units") double units, Model model) {
    System.out.println("Units received: " + units); // Debug log
    double bill = billService.calculateBill(units);
    System.out.println("Calculated Bill: " + bill); // Debug log
    model.addAttribute("bill", bill);
    model.addAttribute("units", units);
    return "index"; // Returning back to the same page with results
}
    
}
