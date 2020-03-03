<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skema extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->cek_login();
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
    }

    private function cek_login(){
        if (!$this->session->userdata('ses_id')){
            $this->session->set_flashdata('error', 'Silahkan login terlebih dahulu');
            redirect('login');
        }
    }

    public function cek_user(){
        if ($this->session->userdata('ses_level') == 'Pengunyung' or $this->session->userdata('ses_level') == 'Pimpinan'){
            $this->session->set_flashdata('error','Maaf anda tidak bisa masuk kehalaman tersebut');
            redirect('dtlp');
        }
    }

    public function cek_pengunjung(){
        if ($this->session->userdata('ses_level') == 'Pengunyung'){
            $this->session->set_flashdata('error','Maaf anda tidak bisa masuk kehalaman tersebut');
            redirect('dtlp');
        }
    }

    public function index(){
        $data = array(
            'ses_level' => $this->session->userdata('ses_level'),
            'data_pendanaan' => $this->model->GetPendanaan('order by pendanaan_name asc')->result_array(),
            'data_years' => $this->model->GetYears('order by years_name asc')->result_array(),
            'data_npj' => $this->model->GetDtlp('order by npj')->result_array(),
            'data_skema' => $this->model->GetTotSkema('order by skema asc')->result_array(),
            'content' => 'skema/skema-data',
        );
        $this->load->view('template/site', $data);
    }

    public function simpan_data(){
        $this->cek_user();
        if (!$_POST['simpan']){
            $this->session->set_flashdata('warning', 'Tambah data belum dilakukan');
            redirect('skema');
        }
        // $id_skema = $this->input->post('kode_penelitian');
            $skema = $this->input->post('skema');
            $luaran = $this->input->post('luaran');
            $data = array(
                'skema' => $skema,
                'luaran' => $luaran,
            );
            $this->model->Simpan('skema_penelitian', $data);
            $this->session->set_flashdata('sukses', 'Simpan data berhasil dilakukan');
            redirect('skema');
    }

    public function edit_data($kode = 0){
        $this->cek_user();
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Anda belum memilih data untuk di edit');
            redirect('skema');
        }

        $data_skema = $this->model->GetSkema("where id_skema = '$kode'")->row_array();

        $data = array(
            'id_skema' => $data_skema['id_skema'],
            'skema' => $data_skema['skema'],
            'luaran' => $data_skema['luaran'],
            'content' => 'skema/skema-edit',
        );
        $this->load->view('template/site',$data);
    }

    public function update_data(){
        $this->cek_user();
        if (!$_POST['update']){
            $this->session->set_flashdata('warning','Update data belum dilakukan');
            redirect('skema');
        }
        $id_skema = $this->input->post('id_skema');
        $skema = $this->input->post('skema');
        $luaran = $this->input->post('luaran');

        $data = array(
            'id_skema' => $id_skema,
            'skema' => $this->input->post('skema'),
            'luaran' => $this->input->post('luaran'),
        );
        $result = $this->model->Update('skema_penelitian',$data,array('id_skema' => $id_skema));
        if ($result == 1){
            $this->session->set_flashdata('sukses', 'Simpan data berhasil dilakukan');
            redirect('skema');
        }else{
            $this->session->set_flashdata('error', 'Simpan data gagal dilakukan');
            redirect('skema');
        }
    }

    public function hapus_data($kode = 1){
        $this->cek_user();
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Hapus data belum dilakukan');
            redirect('skema');
        }
        $data_skema = $this->model->GetTotSkema("where id_skema = '$kode'")->row_array();
        $result = $this->model->Hapus('skema_penelitian',array('id_skema' => $kode));
        if ($result == 1){
            $this->session->set_flashdata('sukses','Hapus data berhasil dilakukan');
            redirect('skema');
        }else{
            $this->session->set_flashdata('error','Hapus data gagal dilakukan');
            redirect('skema');
        }

    }

    public function detail_data($kode = 0){
        $this->cek_user();
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Anda belum memilih data untuk melihat detail data');
            redirect('skema');
        }
        $data_skema = $this->model->GetTotSkema("where id_skema = '$kode'")->row_array();
        $data = array(
            'id_skema' => $data_skema['id_skema'],
            'skema' => $data_skema['skema'],
            'luaran' => $data_skema['luaran'],
            'content' => 'skema/skema-detail',
        );
        $this->load->view('template/site',$data);
    }

    public function export_excel(){
        $this->cek_pengunjung();
        $kode_penelitian = $this->input->post('id_skema');
        $skema = $this->input->post('skema');
        $luaran = $this->input->post('luaran');

        $result = $this->model->LikeDtlp($kode_penelitian,$npj,$tahun_penelitian,$pendanaan)->result_array();
        $data = array(
            'title' => 'Data Laporan Penelitian',
            'data_laporan' => $result,
        );
        $this->load->view('dtlp/dtlp-report-excel',$data);
    }

    public function export_pdf(){
        $this->cek_pengunjung();
        $id_skema = $this->input->post('id_skema');
        $skema = $this->input->post('skema');
        $luaran = $this->input->post('luaran');

        $result = $this->model->LikeDtlp($kode_penelitian,$npj,$tahun_penelitian,$pendanaan)->result_array();
        ob_start();
        $data = array(
            'title' => 'Data Laporan Penelitian',
            'data_laporan' => $result,
        );
        $this->load->view('dtlp/dtlp-report-pdf', $data);
        $html = ob_get_clean();

        require_once ('./assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('P','A4','en');
        $pdf->WriteHTML($html);
        $pdf->Output('Data Laporan Penelitian.pdf','D');
    }

    public function export_print(){
        $this->cek_pengunjung();
        $kode_penelitian = $this->input->post('kode_penelitian');
        $npj = $this->input->post('npj');
        $pendanaan = $this->input->post('pendanaan');
        $tahun_penelitian = $this->input->post('tahun_penelitian');
        $result = $this->model->LikeDtlp($kode_penelitian,$npj,$tahun_penelitian,$pendanaan)->result_array();
        $data = array(
            'title' => 'Data Laporan Penelitian',
            'data_laporan' => $result,
        );
        $this->load->view('dtlp/dtlp-report-pdf', $data);
    }

}
?>
