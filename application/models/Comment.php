<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Model
{
    public $email;
    public $pesan;
    public $tanggal;

    public function __construct($nama = NULL)
    {
        $this->nama = $nama;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPesan($pesan)
    {
        $this->pesan = $pesan;
    }
    
    public function getComment()
    {
        return $this->db->get('comment')->result();
    }

    public function createPesan($data)
    {
        return $this->db->insert('comment', $data);
    }

}
