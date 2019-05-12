<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Distributor extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('pengiriman');
   }
   public function index()
   {
        if ($this->session->userdata('user_priv')=="Pelanggan"){
            redirect('home');
        } elseif ($this->session->userdata('user_priv')=="Distri") {
            $this->load->view("header");
            $this->load->view("content/distributor/main");
            $this->load->view("footer");
        } elseif($this->session->userdata('user_priv')=="Admin") {
            redirect('admin');
        } elseif($this->session->userdata('user_priv')=="Kasir") {
            redirect('kasir');
        } else {
            redirect('greeter');
        }
   }

   public function updateStatusPengiriman()
   {
        $this->pengiriman->updateStatusPengiriman(
            $this->input->post('status'),
            $this->input->post('penerima'),
            $this->input->post('alamat'),
            $this->input->post('telepon'),
            $this->input->post('kurir'),
            $this->input->post('id')
        );
        redirect('distributor');
   }

   public function logout()
   {
      $this->session->sess_destroy();
      redirect('greeter');
   }
}
