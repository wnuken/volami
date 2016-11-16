<?php 

$this->load->view('/admin/header');
$this->load->view("/admin/navbar");
$this->load->view('/admin/' . $view);
$this->load->view('/admin/footer');