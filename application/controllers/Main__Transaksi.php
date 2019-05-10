<?php
	class Main_controller extends CI_Controller {
		public function __construct()
	  {
	    parent::__construct();
	    $this->load->model('main_model');
	  }
		public function index(){
				redirect(base_url('index.php/main_controller/dashboard'));
		}
		public function error_page(){
				$data['main_sidebar'] = 'sb_admin';
				$data['main_content'] = 'vw_404';
				$this->load->view('vw_dashboard',$data);
		}
		public function dashboard(){
				$data['main_sidebar'] = 'sb_admin';
				$data['main_content'] = 'vw_dashboard_home';
				$data['barang'] = $this->main_model->readBarang();
				$data['pembeli'] = $this->main_model->getDataPembeli();
				$data['trx'] = $this->main_model->getDataTrx(1);
				$this->load->view('vw_dashboard',$data);
		}
		// START OF BARANG
		public function create_barang(){
			$data = $this->input->post(null,TRUE);
			$query = $this->main_model->createBarang($data);
			if($query){
				$this->session->set_flashdata('success', 'Data barang berhasil ditambahkan');
			}else{
				$this->session->set_flashdata('danger', 'Data barang gagal ditambahkan');
			}
			redirect('main_controller/view_all_barang');
		}
		public function view_all_barang(){
			$data['main_sidebar'] = 'sb_admin';
			$data['main_content'] = 'vw_all_barang';
			$data['content'] = $this->main_model->readBarang();
			$this->load->view('vw_dashboard',$data);
		}
		public function update_barang(){
			$data = $this->input->post(null,TRUE);
			$query = $this->main_model->updateBarang($data);
			if($query){
				$this->session->set_flashdata('success', 'Data barang berhasil diubah');
			}else{
				$this->session->set_flashdata('danger', 'Data barang gagal diubah');
			}
			redirect('main_controller/view_all_barang');
		}
		public function delete_barang($id){
			$query = $this->main_model->deleteBarang($id);
			if($query){
				$this->session->set_flashdata('success', 'Data barang berhasil dihapus');
			}else{
				$this->session->set_flashdata('danger', 'Data barang gagal dihapus');
			}
			redirect('main_controller/view_all_barang');
		}
		public function get_satu_barang($id){
			$sukon = $this->main_model->getSatuBarang($id);
			return $sukon;
		}
		// END OF BARANG

		// start of Pembeli
		public function create_pembeli(){
			$data = $this->input->post(null,TRUE);
			$query = $this->main_model->createPembeli($data);
			if($query){
				$this->session->set_flashdata('success', 'Data pembeli berhasil ditambahkan');
			}else{
				$this->session->set_flashdata('danger', 'Data pembeli gagal ditambahkan');
			}
			redirect('main_controller/view_all_pembeli');
		}
		public function update_pembeli(){
			$data = $this->input->post(null,TRUE);
			$query = $this->main_model->updatePembeli($data);
			if($query){
				$this->session->set_flashdata('success', 'Data pembeli berhasil diubah');
			}else{
				$this->session->set_flashdata('danger', 'Data pembeli gagal diubah');
			}
			redirect('main_controller/view_all_pembeli');
		}
		public function view_all_pembeli(){
			$data['main_sidebar'] = 'sb_admin';
			$data['main_content'] = 'vw_all_pembeli';
			$data['content'] = $this->main_model->getDataPembeli();
			$this->load->view('vw_dashboard',$data);
		}
		public function delete_pembeli($id){
			$query = $this->main_model->deletePembeli($id);
			if($query){
				$this->session->set_flashdata('success', 'Data pembeli berhasil dihapus');
			}else{
				$this->session->set_flashdata('danger', 'Data pembeli gagal dihapus');
			}
			redirect('main_controller/view_all_pembeli');
		}
		public function get_satu_Pembeli($id){
			$sukon = $this->main_model->getSatuPembeli($id);
			return $sukon;
		}
		//end off pembeli

		// start of Transaksi
		public function create_transaksi(){
			$data = $this->input->post(null,TRUE);
			$query = $this->main_model->createTransaksi($data);
			if($query){
				$this->session->set_flashdata('success', 'Data transaksi berhasil ditambahkan');
			}else{
				$this->session->set_flashdata('danger', 'Data transaksi gagal ditambahkan');
			}
			redirect('main_controller/view_all_trx/1');
		}
		public function view_all_trx($id){
				$data['stat'] = $id;
				$data['main_sidebar'] = 'sb_admin';
				$data['main_content'] = 'vw_all_trx';
				$data['content'] = $this->main_model->getDataTrx($id);
				$data['pembeli'] = $this->main_model->getDataPembeli();
				$data['barang'] = $this->main_model->readBarang();
				$this->load->view('vw_dashboard',$data);
		}
		public function update_trx(){
			$data = $this->input->post(null,TRUE);
			$query = $this->main_model->updateTrx($data);
			if($query){
				$this->session->set_flashdata('success', 'Data transaksi berhasil diubah');
			}else{
				$this->session->set_flashdata('danger', 'Data transaksi gagal diubah');
			}
			redirect('main_controller/view_all_trx/1');
		}
		public function delete_transaksi($id){
			$query = $this->main_model->deleteTransaki($id);
			if($query){
				$this->session->set_flashdata('success', 'Data Transaksi berhasil dihapus');
			}else{
				$this->session->set_flashdata('danger', 'Data Transaksi gagal dihapus');
			}
			redirect('main_controller/view_all_trx/1');
		}
		public function get_satu_trx($id){
			$sukon = $this->main_model->getSatuTrx($id);
			return $sukon;
		}
		// END OF TRX
	}
?>
