<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Transaksi extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
   }
   public function index()
   {
        if ($this->session->userdata('user_priv')=="Pelanggan"){
            redirect('home');
        } elseif ($this->session->userdata('user_priv')=="Distri") {
            redirect('distributor');
        } elseif($this->session->userdata('user_priv')=="Admin") {
            redirect('admin');
        } elseif($this->session->userdata('user_priv')=="Kasir") {
            $this->load->view("header");
            $this->load->view("content/kasir/transaksi");
            $this->load->view("footer");
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
