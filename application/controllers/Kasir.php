<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kasir extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('resi');
      $this->load->model('pengiriman');
   }
   public function index()
   {
        if ($this->session->userdata('user_priv')=="Pelanggan"){
            redirect('home');
        } elseif ($this->session->userdata('user_priv')=="Kasir") {
            $this->load->view("header");
            $this->load->view("content/kasir/main");
            $this->load->view("footer");
        } elseif($this->session->userdata('user_priv')=="Admin") {
            redirect('admin');
        } elseif($this->session->userdata('user_priv')=="Distri") {
            redirect('distributor');
        } else {
            redirect('greeter');
        }
   }
   
   public function acceptPembayaran()
   {
        $this->resi->acceptPembayaran(
            $this->session->userdata('user_id'),
            $this->input->post('statusUp'),
            $this->input->post('id')
        );
        redirect('kasir');
   }

   public function updateStatusPembayaran()
   {
        $this->resi->updateStatusPembayaran(
            $this->input->post('status'),
            $this->input->post('id')
        );
        if ($this->input->post('status')=="Lunas") {
            $data = new $this->pengiriman($this->input->post('pemesan'));
            $data->setPenerima('-');
            $data->setAlamat($this->input->post('alamat'));
            $data->setTelepon($this->input->post('telepon'));
            $data->setKurir($this->input->post('kurir'));
            $data->setPemesanan($this->input->post('produk'));
            $data->setStatus($this->input->post('statusP'));
            $this->pengiriman->createPengiriman($data);
        }
        redirect('kasir');
   }

   public function logout()
   {
      $this->session->sess_destroy();
      redirect('greeter');
   }
}
