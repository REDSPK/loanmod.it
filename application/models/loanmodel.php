<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Loan
 *
 * @author FAIZAN ALI
 */
class loanmodel extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function calculateMonthlyPayment($loanAmount,$loanDuration,$interestRate,$assesment,$propertyTax,$homeInsurance)
    {
       $toReturn = array();
       $toReturn[0]['interest_rate'] = $interestRate;
       $toReturn[0]['calculations'] = $this->doCalculation($loanAmount, $loanDuration, $interestRate, $assesment, $propertyTax, $homeInsurance);
       $interestRate = 2;
       $toReturn[1]['interest_rate'] = $interestRate;
       $toReturn[1]['calculations'] = $this->doCalculation($loanAmount, $loanDuration, $interestRate, $assesment, $propertyTax, $homeInsurance);
       $interestRate = 3;
       $toReturn[2]['interest_rate'] = $interestRate;
       $toReturn[2]['calculations'] = $this->doCalculation($loanAmount, $loanDuration, $interestRate, $assesment, $propertyTax, $homeInsurance);
       $interestRate = 4;
       $toReturn[3]['interest_rate'] = $interestRate;
       $toReturn[3]['calculations'] = $this->doCalculation($loanAmount, $loanDuration, $interestRate, $assesment, $propertyTax, $homeInsurance);
       
       return $toReturn;
        
    }
    
    private function doCalculation($loanAmount,$loanDuration,$interestRate,$assesment,$propertyTax,$homeInsurance){
        $interestRate = ($interestRate/100)/12;
        $loanDuration = $loanDuration*12;
        $divider =  $interestRate*pow(($interestRate+1),$loanDuration);
        $quotient = pow(($interestRate+1),$loanDuration) - 1;
        $monthlyPayment = $loanAmount*($divider/$quotient);
        $totalMonthlyPayment = $monthlyPayment + $assesment + $propertyTax + $homeInsurance;
        $grossIncome = $totalMonthlyPayment/0.31;
        $data = array();
        $data['monthly_payment'] = $monthlyPayment;
        $data['total_monthly_payment'] = $totalMonthlyPayment;
        $data['gross_income'] = $grossIncome;
        return $data;
    }
}

?>
