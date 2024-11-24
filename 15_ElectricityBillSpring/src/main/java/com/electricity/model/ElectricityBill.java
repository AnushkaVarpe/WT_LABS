package com.electricity.model;

public class ElectricityBill {
    private double units;
    private double billAmount;

    public double getUnits() {
        return units;
    }

    public void setUnits(double units) {
        this.units = units;
        calculateBill();
    }

    public double getBillAmount() {
        return billAmount;
    }

    private void calculateBill() {
        double remainingUnits = units;
        billAmount = 0.0;

        if (remainingUnits > 250) {
            billAmount += (remainingUnits - 250) * 6.50;
            remainingUnits = 250;
        }
        if (remainingUnits > 150) {
            billAmount += (remainingUnits - 150) * 5.20;
            remainingUnits = 150;
        }
        if (remainingUnits > 50) {
            billAmount += (remainingUnits - 50) * 4.00;
            remainingUnits = 50;
        }
        if (remainingUnits > 0) {
            billAmount += remainingUnits * 3.50;
        }
    }
}
