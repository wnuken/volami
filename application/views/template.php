<?php 

$this->load->view('/template/header');
$this->load->view("/template/navbar");
$this->load->view('/template/' . $view);
$this->load->view('/template/footer');