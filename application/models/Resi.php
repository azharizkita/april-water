<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resi extends CI_Model
{
    public $pelanggan;
    public $distributor;
    public $produk;
    public $total;
    public $harga;
    public $status;

    /**
     * Resi constructor.
     * @param $pelanggan
     */
    public function __construct($pelanggan = NULL)
    {
        $this->pelanggan = $pelanggan;
    }

    /**
     * @param mixed $distributor
     */
    public function setDistributor($distributor)
    {
        $this->distributor = $distributor;
    }

    /**
     * @param mixed $produk
     */
    public function setProduk($produk)
    {
        $this->produk = $produk;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @param mixed $harga
     */
    public function setHarga($harga)
    {
        $this->harga = $harga;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getResi()
    {
        return $this->db->get('resi')->result();
    }

    public function createResi($data)
    {
        return $this->db->insert('resi', $data);
    }

    public function acceptPembayaran($distributor, $status, $id)
    {
        $data = array(
            'distributor' => $distributor,
            'status' => $status
        );
        $this->db->where('id', $id);
        $this->db->update('resi', $data);
    }

    public function updateStatusPembayaran($status, $id)
    {
        $data = array(
            'status' => $status
        );
        $this->db->where('id', $id);
        $this->db->update('resi', $data);
    }
}
