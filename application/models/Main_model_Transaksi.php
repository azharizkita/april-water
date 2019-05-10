<?php
	class Main_model extends CI_Model{
		public $kode_user;
		public $display_name;
		public $level;
		public $id_kelas;
		public $id_gedung;
		public $id_prodi;
		public $tahun_akademik;

		function __construct(){
			parent::__construct();
		}
		// START OF BARANG
		function createBarang($data){
			$array = array(
				'nama_barang' => $data['nama_barang'],
				'harga' => $data['harga']
			);
			$query = $this->db->insert('tb_barang',$array);
			return $query;
		}
    function readBarang(){
      $result = $this->db->get('tb_barang');
      return $result;
    }
		function updateBarang($data){
      $array = array(
				'nama_barang' => $data['nama_barang'],
				'harga' => $data['harga']
			);
			$this->db->where('id_barang', $data['id_barang']);
			$query = $this->db->update('tb_barang', $array);
			return $query;
		}
		function deleteBarang($id){
			$query = $this->db
				->where('id_barang', $id)
				->delete('tb_barang');
			return $query;
		}
		function getSatuBarang($id){
			$result = $this->db->get_where('tb_barang',array('id_barang' => $id));
      return $result;
		}
		// END OF BARANG

		//star of Pembeli
		function createPembeli($data){
			$array = array(
				'nama_user' => $data['nama_user'],
				'username' => $data['username'],
				'password' => md5($data['password']),
				'email' => $data['email']
			);
			$query = $this->db->insert('tb_user',$array);
			return $query;
		}
		function getDataPembeli(){
      $result = $this->db->get('tb_user');
      return $result;
    }
		function updatePembeli($data){
      $array = array(
				'nama_user' => $data['nama_user'],
				'username' => $data['username'],
				'password' => md5($data['password']),
				'email' => $data['email']
			);
			$this->db->where('id_user', $data['id_user']);
			$query = $this->db->update('tb_user', $array);
			return $query;
		}
		function deletePembeli($id){
			$query = $this->db
				->where('id_user', $id)
				->delete('tb_user');
			return $query;
		}
		function getSatuPembeli($id){
			$result = $this->db->get_where('tb_user',array('id_user' => $id));
			return $result;
		}
		//end of Pembeli
		// START OF Transaksi
		function createTransaksi($data){
			$array = array(
				'tanggal_transaksi' => $data['tanggal_transaksi'],
				'id_user' => $data['id_user'],
				'id_barang' => $data['id_barang'],
				'total_barang' => $data['total_barang'],
				'total_harga' => $data['total_harga'],
				'status' => $data['status']
			);
			$query = $this->db->insert('tb_transaksi',$array);
			return $query;
		}
		function getDataTrx($id){
      if ($id == 1) {
        $result = $this->db
          ->select('tb_transaksi.*,tb_user.*, tb_barang.*')
          ->join('tb_user','tb_transaksi.id_user = tb_user.id_user')
          ->join('tb_barang','tb_transaksi.id_barang = tb_barang.id_barang')
          ->get('tb_transaksi');
      }else{
        $result = $this->db
          ->select('tb_transaksi.*,tb_user.*, tb_barang.*')
          ->join('tb_user','tb_transaksi.id_user = tb_user.id_user')
          ->join('tb_barang','tb_transaksi.id_barang = tb_barang.id_barang')
          ->where('tb_transaksi.status',$id)
          ->get('tb_transaksi');
      }
      return $result;
    }
		function updateTrx($data){
			$array = array(
				'status' => $data['status']
			);
			$this->db->where('id_trx', $data['id_trx']);
			$query = $this->db->update('tb_transaksi', $array);
			return $query;
		}
		function deleteTransaki($id){
			$query = $this->db
				->where('id_trx', $id)
				->delete('tb_transaksi');
			return $query;
		}
		function getSatuTrx($id){
			$result = $this->db->get_where('tb_transaksi',array('id_trx' => $id));
			return $result;
		}

  }


?>
