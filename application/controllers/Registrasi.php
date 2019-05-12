<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('content/registrasi/main');
		$this->load->view('footer');
	}

	public function bukafile()
	{	
		$this->load->model('Admin');
		$data['data'] = $this->Admin->show();
		$no = 0;
            foreach ($data as $reg) {
                $no++;
                $judul = $reg->ijazah;
        }
		redirect('uploadedFile/');
	}

	public function successR()
	{
		$this->load->view('content/registrasi/success_regist');
	}

	public function admin()
	{
		$this->load->model('Admin');
		$data['data'] = $this->Admin->show();
		$this->load->view('header');
		$this->load->view('Admin/home',$data);
		$this->load->view('footer');
	}

	public function success()
	{
		$config['upload_path']          = './assets/files/uploads/';
		$config['allowed_types']		= 'pdf';
		$config['max_size']             = '2000';
		$config['overwrite']			= TRUE;
 		
		$this->load->library('upload', $config);
 		
		$this->upload->initialize($config);

		$this->upload->do_upload('file');
        $result1 = $this->upload->data();

        $this->upload->do_upload('file2');
        $result2 = $this->upload->data();
        $result = array
        	('file1'=>$result1,
        	 'file2'=>$result2
        	);
		if (! $this->upload->do_upload('file') && ! $this->upload->do_upload('file2') ){
			echo "Data yang dimasukan salah <br>";
			echo "<a href='"+base_url()+"'>Kembali</a>";
		}else{
			$nama = $this->input->post('nama');
			$tanggal = $this->input->post('ttl');
			$alamat = $this->input->post('alamat');
			$email = $this->input->post('email');
			$nomer = $this->input->post('nomer');
			$job = $this->input->post('job'); 
			$ijazah = $result['file1']['file_name'];
			$cv = $result['file2']['file_name'];

			$data = array(
				'nama' => $nama,
				'tanggal_lahir' => $tanggal,
				'alamat' => $alamat,
				'email' => $email,
				'nomer' => $nomer,
				'job' => $job,
				'ijazah' => $ijazah,
				'cv' => $cv
				);
			$this->db->insert('karyawan',$data);
			redirect('registrasi/successR');
		}
	}
}
