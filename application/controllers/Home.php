<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk');
        $this->load->model('resi');
        $this->load->model('keuangan');
    }

    public function index()
    {
        $data['produk'] = $this->produk->getProduk();
        if ($this->session->userdata('user_priv') == "Pelanggan") {
            $this->load->view("header");
            $this->load->view("content/pelanggan/main", $data);
            $this->load->view("footer");
        } elseif ($this->session->userdata('user_priv') == "Distri") {
            redirect('distributor');
        } elseif ($this->session->userdata('user_priv') == "Admin") {
            redirect('admin');
        } elseif ($this->session->userdata('user_priv') == "Kasir") {
            redirect("kasir");
        } else {
            redirect('greeter');
        }
    }

    public function beli()
    {
        $data = new $this->resi((int)$this->session->userdata('user_id'));
        $data->setdistributor(NULL);
        $data->setproduk((int)$this->input->post('id'));
        $data->setTotal((int)$this->input->post('jumlah'));
        $data->setHarga((int)$this->input->post('jumlah') * $this->input->post('harga'));
        $data->setStatus("To be accepted");
        $this->resi->createResi($data);
        $this->produk->updateJumlahProduk((int)$this->input->post('kuantitas') - (int)$this->input->post('jumlah'), (int)$this->input->post('id'));

        $this->keuangan->updateKeuntungan((int)$this->input->post('jumlah') * $this->input->post('harga'));
        
        redirect('home');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('greeter');
    }
}