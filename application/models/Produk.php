<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Model
{
    public $nama;
    public $spesifikasi;
    public $gambar;
    public $kuantitas;
    public $harga;
    public $modal;
    public $author;

    /**
     * Pakaian constructor.
     * @param $nama
     */
    public function __construct($nama = NULL)
    {
        $this->nama = $nama;
    }

    /**
     * @param mixed $spesifikasi
     */
    public function setSpesifikasi($spesifikasi)
    {
        $this->spesifikasi = $spesifikasi;
    }

    /**
     * @param mixed $gambar
     */
    public function setGambar($gambar)
    {
        $this->gambar = $gambar;
    }

    /**
     * @param mixed $kuantitas
     */
    public function setKuantitas($kuantitas)
    {
        $this->kuantitas = $kuantitas;
    }

    /**
     * @param mixed $harga
     */
    public function setHarga($harga)
    {
        $this->harga = $harga;
    }

    /**
     * @param mixed $modal
     */
    public function setModal($modal)
    {
        $this->modal = $modal;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getProduk()
    {
        return $this->db->get('produk')->result();
    }

    public function createProduk($data)
    {
        return $this->db->insert('produk', $data);
    }

    public function updateJumlahProduk($jumlah, $id)
    {
        $data = array(
            'kuantitas' => $jumlah
        );
        $this->db->where('id', $id);
        $this->db->update('produk', $data);
    }

}
