<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('user_priv') == "Pelanggan") {
            redirect('pelanggan');
        } elseif ($this->session->userdata('user_priv') == "Distri") {
            redirect('distributor');
        } elseif ($this->session->userdata('user_priv') == "Admin") {
            $this->load->view("header");
            $this->load->view("content/admin/pelamar");
            $this->load->view("footer");
        } elseif ($this->session->userdata('user_priv') == "Kasir") {
            redirect("kasir");
        } else {
            redirect('greeter');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('greeter');
    }
}