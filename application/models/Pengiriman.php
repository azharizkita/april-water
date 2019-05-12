<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends CI_Model
{
    public $penerima;
    public $alamat;
    public $telepon;
    public $kurir;
    public $status;

    public function __construct($pemesan = NULL)
    {
        $this->pemesan = $pemesan;
    }

    public function setAlamat($alamat)
    {
        $this->alamat = $alamat;
    }

    public function setPemesanan($pemesanan)
    {
        $this->pemesanan = $pemesanan;
    }

    public function setTelepon($telepon)
    {
        $this->telepon = $telepon;
    }

    public function setPenerima($penerima)
    {
        $this->penerima = $penerima;
    }

    public function setKurir($kurir)
    {
        $this->kurir = $kurir;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getProduk()
    {
        return $this->db->get('produk')->result();
    }

    public function createPengiriman($data)
    {
        return $this->db->insert('pengiriman', $data);
    }

    public function updateStatusPengiriman($status, $penerima, $alamat, $telepon, $kurir, $id)
    {
        $data = array(
            'status' => $status,
            'penerima' => $penerima,
            'alamat' => $alamat,
            'telepon' => $telepon,
            'kurir' => $kurir
        );
        $this->db->where('id', $id);
        $this->db->update('pengiriman', $data);
    }
}
