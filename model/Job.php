<?php

class Job {
    private $id;
    private $company_logo;
    private $company_name;
    private $company_desc;
    private $job_title;
    private $job_description;
    private $salary;
    private $job_type;
    private $created_at;

    function __construct($company_logo, $company_name,$company_desc, $job_title, $job_description, $salary, $job_type) {
        $this->company_logo = $company_logo;
        $this->company_name = $company_name;
        $this->company_desc = $company_desc;
        $this->job_title = $job_title;
        $this->job_description = $job_description;
        $this->salary = $salary;
        $this->job_type = $job_type;
    }

    function getCompanyLogo() {
        return $this->company_logo;
    }

    function getCompanyName() {
        return $this->company_name;
    }
    function getCompanyDesc() {
        return $this->company_desc;
    }
    function getJobTitle() {
        return $this->job_title;
    }

    function getJobDescription() {
        return $this->job_description;
    }

    function getSalary() {
        return $this->salary;
    }

    function getJobType() {
        return $this->job_type;
    }
}
