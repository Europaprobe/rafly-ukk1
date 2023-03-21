<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_admindash extends CI_Controller
{
    public function index()
    {
        $this->load->view('v_admindash');
    }
}