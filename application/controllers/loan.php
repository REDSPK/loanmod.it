<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of loan
 *
 * @author FAIZAN ALI
 */
class loan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('loanmodel');
    }
    public function calculateMonthlyPayment() {
        $loanAmount = $this->input->post('loan-amount');
        $loanDuration = $this->input->post('loan-duration');
        $interestRate = $this->input->post('interest-rate');
        $assesment = $this->input->post('assesment');
        $propertyTax = $this->input->post('property-tax');
        $homeInsurance = $this->input->post('home-insurance');
        $monthlyPayment = $this->loanmodel->calculateMonthlyPayment($loanAmount,$loanDuration,$interestRate,$assesment,$propertyTax,$homeInsurance);
        $this->output->set_content_type(JSON_CONTENT_TYPE)->set_output(json_encode(array('code'=>0,"data"=>$monthlyPayment)));
    }
}

?>
