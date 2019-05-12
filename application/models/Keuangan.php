<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Model
{
    public $pendapatan;
    public $pengeluaran;
    public $profit;

    public function __construct($timestamp = NULL)
    {
        $this->timestamp = $timestamp;
    }

    public function setPendapatan($pendapatan)
    {
        $this->pendapatan = $pendapatan;
    }

    public function setpengeluaran($pengeluaran)
    {
        $this->pengeluaran = $pengeluaran;
    }

    public function setProfit($profit)
    {
        $this->profit = $profit;
    }

    public function createProfit($data)
    {
        return $this->db->insert('keuangan', $data);
    }

    public function updateKeuntungan($keuntungan)
    {
        if ($this->db->get_where('keuangan', array('timestamp' => date('Y-m-d')))->num_rows() == 0) {
            $data = array(
                'timestamp' => date('Y-m-d'),
                'pendapatan' => $keuntungan,
                'pengeluaran' => 0,
                'profit' => $keuntungan
            );
            return $this->db->insert('keuangan', $data);
        } else {
            foreach ( $this->db->get_where('keuangan', array('timestamp' => date('Y-m-d')))->result() as $key) {
                $data = array(
                    'timestamp' => date('Y-m-d'),
                );
                $this->db->set('pendapatan', $key->pendapatan+$keuntungan, FALSE);
                $this->db->set('pengeluaran', $key->pengeluaran+0, FALSE);
                $this->db->set('profit', 'pendapatan-pengeluaran', FALSE);
                $this->db->replace('keuangan', $data);
            }
            return TRUE;
        }

    }

    public function updatePengeluaran($pengeluaran)
    {
        if ($this->db->get_where('keuangan', array('timestamp' => date('Y-m-d')))->num_rows() == 0) {
            $data = array(
                'timestamp' => date('Y-m-d'),
                'pendapatan' => $pengeluaran,
                'pengeluaran' => 0,
                'profit' => -$pengeluaran
            );
            return $this->db->insert('keuangan', $data);
        } else {
            foreach ( $this->db->get_where('keuangan', array('timestamp' => date('Y-m-d')))->result() as $key) {
                $data = array(
                    'timestamp' => date('Y-m-d'),
                );
                $this->db->set('pendapatan', $key->pendapatan+0, FALSE);
                $this->db->set('pengeluaran', $key->pengeluaran+$pengeluaran, FALSE);
                $this->db->set('profit', 'pendapatan-pengeluaran', FALSE);
                $this->db->replace('keuangan', $data);
            }
            return TRUE;
        }

    }
}
