<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_penelitian extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->cek_login();
    }

    private function cek_login(){
        if (!$this->session->userdata('ses_id')){
            $this->session->set_flashdata('error','Silahkan login terlebih dahulu');
            redirect('login');
        }
    }

    public function index(){
        $data = array(
            'total_years' => $this->model->GetYears()->num_rows(),
            'total_penelitian' => $this->model->GetPenelitian()->num_rows(),
            'hitung_penelitian' => $this->model->hitung_Penelitian(),
            'total_aktif' => $this->model->GetPenelitian("where verifikasi='DITERIMA'")->num_rows(),
            // $data_years = $this->model->GetYears("where code_years = '$tahun_penelitian'")->row_array();
            'total_pendanaan' => $this->model->GetPendanaan()->num_rows(),
            'content' => 'template/dashboard_penelitian',
        );
        $this->load->view('template/site', $data);
    }

}
?>
