<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kritik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('comment');
    }

    public function index()
    {
        if ($this->session->userdata('user_priv') == "Pelanggan") {
            $this->load->view("content/pelanggan/comment");
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

    public function createPesan()
    {
        $data = new $this->comment($this->session->userdata('user_nama'));
        $data->setPesan($this->input->post('pesan'));
        $data->setEmail($this->session->userdata('user_mail'));
        $this->comment->createPesan($data);
         redirect('kasir');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('greeter');
    }
}