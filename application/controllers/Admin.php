    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Admin extends CI_Controller
    {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk');
        $this->load->model('keuangan');
    }
    public function index()
    {
            if ($this->session->userdata('user_priv')=="Pelanggan"){
                redirect('pelanggan');
            } elseif ($this->session->userdata('user_priv')=="Distri") {
                redirect('distributor');
            } elseif($this->session->userdata('user_priv')=="Admin") {
                $this->load->view("header");
                $this->load->view("content/admin/main");
                $this->load->view("footer");
            } elseif($this->session->userdata('user_priv')=="Kasir") {
                redirect('kasir');
            } else {
                redirect('greeter');
            }
    }
    public function createProduk()
    {
        $config['upload_path'] = './assets/images/uploads/produk/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 0;
        $config['file_name'] = 'produk_'.$this->input->post('nama');
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
          echo 'gagal';
        } else {
            $data = new $this->produk($this->input->post('nama'));
            $data->setSpesifikasi($this->input->post('spesifikasi'));
            $data->setGambar($this->upload->file_name);
            $data->setKuantitas($this->input->post('kuantitas'));
            $data->setHarga($this->input->post('harga'));
            $data->setModal($this->input->post('modal'));
            $data->setAuthor("April- Water");
            $this->produk->createProduk($data);

            $this->keuangan->updatePengeluaran((int)$this->input->post('modal') * $this->input->post('kuantitas'));

            redirect('admin');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('greeter');
    }
    }
