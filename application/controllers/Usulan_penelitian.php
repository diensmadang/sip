<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usulan_penelitian extends CI_Controller{

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
            redirect('usulan_penelitian');
        }
    }

    public function cek_pengunjung(){
        if ($this->session->userdata('ses_level') == 'Pengunyung'){
            $this->session->set_flashdata('error','Maaf anda tidak bisa masuk kehalaman tersebut');
            redirect('usulan_penelitian');
        }
    }

    public function index(){
        $data = array(
            'ses_level' => $this->session->userdata('ses_level'),
            'data_pendanaan' => $this->model->GetPendanaan('order by pendanaan_name asc')->result_array(),
            'data_years' => $this->model->GetYears('order by years_name asc')->result_array(),
            'data_ketua' => $this->model->GetUsulan('order by ketua')->result_array(),
            'data_usulan' => $this->model->GetTotUsulan('order by tgl_usulan asc')->result_array(),
            'data_skema' => $this->model->GetSkema('order by skema asc')->result_array(),
            'data_anggota' => $this->model->GetDosen('order by dosen asc')->result_array(),
            'content' => 'usulan_penelitian/usulan-data',
        );
        $this->load->view('template/site', $data);
    }

    public function simpan_data(){
        $this->cek_user();
        if (!$_POST['simpan']){
            $this->session->set_flashdata('warning', 'Tambah data belum dilakukan');
            redirect('usulan_penelitian');
        }
        $tahun_penelitian = $this->input->post('tahun_penelitian');
        $data_years = $this->model->GetYears("where code_years = '$tahun_penelitian'")->row_array();
            $config = array(
                'upload_path' => './assets/pdf/'.$data_years['years_name'],
                'allowed_types' => 'pdf',
                'max_size' => '1000000',
            );
            $this->load->library('upload', $config);
            $this->upload->do_upload('file_proposal');
            $upload_data1 = $this->upload->data();
            $this->upload->do_upload('file_suratrencanabelanja');
            $upload_data2 = $this->upload->data();
            $this->upload->do_upload('file_pernyataan');
            $upload_data3 = $this->upload->data();
            $data = array(
                'tgl_usulan' => $this->input->post('tgl_usulan'),
                'skema_id' => $this->input->post('skema_id'),
                'judul' => $this->input->post('judul'),
                'bidang_kajian' => $this->input->post('bidang_kajian'),
                'dana_penelitian' => $this->input->post('dana_penelitian'),
                'ketua' => $this->input->post('ketua'),
                'anggota2' => $this->input->post('anggota2'),
                'anggota3' => $this->input->post('anggota3'),
                'tenaga_ahli' => $this->input->post('tenaga_ahli'),
                'file_proposal' => $upload_data1['file_name'],
                'file_suratrencanabelanja' => $upload_data2['file_name'],
                'file_pernyataan' => $upload_data3['file_name'],
                'tahun_penelitian' => $this->input->post('tahun_penelitian'),
                'verifikasi' => $this->input->post('verifikasi'),
            );
            $this->model->Simpan('usulan_penelitian', $data);
            $this->session->set_flashdata('sukses', 'Simpan data berhasil dilakukan');
            redirect('usulan_penelitian');
    }

    public function edit_data($kode = 0){
        $this->cek_user();
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Anda belum memilih data untuk di edit');
            redirect('usulan_penelitian');
        }
        $data_usulan = $this->model->GetUsulan("where id_usulan = '$kode'")->row_array();

        $years_post_array = array();
        foreach ($this->model->GetUsulan("where id_usulan = '$kode'")->result_array() as $years){
            $years_post_array[] = $years['tahun_penelitian'];
        }

        $skema_post_array = array();
        foreach ($this->model->GetUsulan("where id_usulan = '$kode'")->result_array() as $skema){
            $skema_post_array[] = $skema['skema_id'];
        }  

        $pendanaan_post_array = array();
        foreach ($this->model->GetUsulan("where id_usulan = '$kode'")->result_array() as $pendanaan){
            $pendanaan_post_array[] = $pendanaan['dana_penelitian'];
        } 

        $dosen_post_array = array();
        foreach ($this->model->GetUsulan("where id_usulan = '$kode'")->result_array() as $anggota){
            $dosen_post_array[] = $anggota['ketua'];
        }        

      //  $data_anggota = $this->model->GetDosen('order by dosen asc')->result_array();

        $tahun = $this->model->GetTotDtlp("where kode_penelitian = '$kode'")->row_array();

        $data = array(
            'id_usulan' => $data_usulan['id_usulan'],
            'tgl_usulan' => $data_usulan['tgl_usulan'],
            'skema_id' => $data_usulan['skema_id'],
            'data_skema' => $this->model->GetSkema()->result_array(),
         //   'skema' => $data_usulan['skema'],
            'skema_post' => $skema_post_array,
            'judul' => $data_usulan['judul'],
            'years_post' => $years_post_array,
            'bidang_kajian' => $data_usulan['bidang_kajian'],
             
         //   'pendanaan_post' => $pendanaan_post_array,
            'ketua' => $data_usulan['ketua'],
            'data_anggota' => $this->model->GetDosen('order by dosen asc')->result_array(),
            'anggota2' => $data_usulan['anggota2'],
            'anggota3' => $data_usulan['anggota3'],
            'tenaga_ahli' => $data_usulan['tenaga_ahli'],
          //  'nomor_induk' => $data_usulan['nomor_induk'],
            'file_proposal' => $data_usulan['file_proposal'],
            'file_suratrencanabelanja' => $data_usulan['file_suratrencanabelanja'],
            'file_pernyataan' => $data_usulan['file_pernyataan'],
            'tahun_penelitian' => $tahun['years_name'],
            'verifikasi' => $data_usulan['verifikasi'],
            'pendanaan' => $this->model->GetPendanaan()->result_array(),
            'pendanaan_post' =>$pendanaan_post_array,
            'years' => $this->model->GetYears()->result_array(),
            'content' => 'usulan_penelitian/usulan-edit',
        );
        $this->load->view('template/site',$data);
    }

    public function update_data(){
        $this->cek_user();
        if (!$_POST['update']){
            $this->session->set_flashdata('warning','Update data belum dilakukan');
            redirect('usulan_penelitian');
        }
    //    $kode_penelitian = $this->input->post('kode_penelitian');
    //    $kode_penelitian1 = $this->input->post('kode_penelitian1');
        $id_usulan = $this->input->post('id_usulan');
        $tahun_penelitian_lama = $this->input->post('tahun_penelitian');
        $tahun_penelitian_baru = $this->input->post('tahun_penelitian1');
        $data_years = $this->model->GetYears("where code_years = '$tahun_penelitian_baru'")->row_array();
        $proposal_lama = $this->input->post('proposal_lama');
        $suratrencanabelanja_lama = $this->input->post('suratrencanabelanja_lama');
        $pernyataan_lama = $this->input->post('pernyataan_lama');
        if ($_FILES['file_proposal']['name'] == null or $_FILES['file_suratrencanabelanja']['name'] == null or $_FILES['file_pernyataan']['name'] == null){
            $pdf1 = $proposal_lama;
            $pdf2 = $suratrencanabelanja_lama;
            $pdf3 = $pernyataan_lama;
        }else{
            $config = array(
                'upload_path' => './assets/pdf/'.$data_years['years_name'],
                'allowed_types' => 'pdf',
                'max_size' => '1000000',
            );
            $this->load->library('upload', $config);
            $this->upload->do_upload('file_proposal');
            $upload_data1 = $this->upload->data();
            $this->upload->do_upload('file_suratrencanabelanja');
            $upload_data2 = $this->upload->data();
            $this->upload->do_upload('file_pernyataan');
            $upload_data3 = $this->upload->data();

            //$this->upload->do_upload('pdf');
            //$upload_data = $this->upload->data();
            $pdf1 = $upload_data1['file_name'];
            $pdf2 = $upload_data2['file_name'];
            $pdf3 = $upload_data3['file_name'];
        }
        $data = array(
            'id_usulan' => $this->input->post('id_usulan'),
            'tgl_usulan' => $this->input->post('tgl_usulan'),
            'skema_id' => $this->input->post('skema_id'),
            'judul' => $this->input->post('judul'),
            'bidang_kajian' => $this->input->post('bidang_kajian'),
            'dana_penelitian' => $this->input->post('dana_penelitian'),
            'ketua' => $this->input->post('ketua'),
            'anggota2' => $this->input->post('anggota2'),
            'anggota3' => $this->input->post('anggota3'),
            'tenaga_ahli' => $this->input->post('tenaga_ahli'),
            'file_proposal' => $pdf1,
            'file_suratrencanabelanja' => $pdf2,
            'file_pernyataan' => $pdf3,
            'tahun_penelitian' => $this->input->post('tahun_penelitian1'),
            'verifikasi' => $this->input->post('verifikasi'),
         //   'pdf' => $pdf,
        );
    $result = $this->model->Update('usulan_penelitian',$data,array('id_usulan' => $id_usulan));
        if ($result == 1){
            if ($_FILES['file_proposal']['name'] == null and $_POST['proposal_lama'] != null and $data_years['years_name'] == $tahun_penelitian_lama){
            }else{
                unlink('./assets/pdf/'.$tahun_penelitian_lama.'/'.$proposal_lama);
            }
            $this->session->set_flashdata('sukses', 'Simpan data berhasil dilakukan');
            redirect('usulan_penelitian');
        }else{
            $this->session->set_flashdata('error', 'Simpan data gagal dilakukan');
            redirect('usulan_penelitian');
        }
    }

    public function hapus_data($kode = 1){
        $this->cek_user();
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Hapus data belum dilakukan');
            redirect('usulan_penelitian');
        }
        $data_usulan = $this->model->GetTotUsulan("where id_usulan = '$kode'")->row_array();
        $result = $this->model->Hapus('usulan_penelitian',array('id_usulan' => $kode));
        $years = $data_usulan['years_name'];
        $pdf1 = $data_usulan['file_proposal'];
        $pdf2 = $data_usulan['file_suratrencanabelanja'];
        $pdf3 = $data_usulan['file_pernyataan'];
        if ($result == 1){
            if ($years != null){
                unlink('./assets/pdf/'.$years.'/'.$pdf1);
                unlink('./assets/pdf/'.$years.'/'.$pdf2);
                unlink('./assets/pdf/'.$years.'/'.$pdf3);
            }
            $this->session->set_flashdata('sukses','Hapus data berhasil dilakukan');
            redirect('usulan_penelitian');
        }else{
            $this->session->set_flashdata('error','Hapus data gagal dilakukan');
            redirect('usulan_penelitian');
        }

    }

    public function detail_data($kode = 0){
        $this->cek_user();
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Anda belum memilih data untuk melihat detail data');
            redirect('dtlp');
        }
        $data_usulan = $this->model->GetTotUsulan("where id_usulan = '$kode'")->row_array();
        $data = array(
            'tgl_usulan' => $data_usulan['tgl_usulan'],
            'skema_id' => $data_usulan['skema_id'],
            'luaran' => $data_usulan['luaran'],
            'skema' => $data_usulan['skema'],
            'judul' => $data_usulan['judul'],
            'bidang_kajian' => $data_usulan['bidang_kajian'],
            'dana_penelitian' => $data_usulan['pendanaan_name'],
            'ketua' => $data_usulan['ketua'],
            'anggota2' => $data_usulan['anggota2'],
            'anggota3' => $data_usulan['anggota3'],
            'tenaga_ahli' => $data_usulan['tenaga_ahli'],
            'file_proposal' => $data_usulan['file_proposal'],
            'file_suratrencanabelanja' => $data_usulan['file_suratrencanabelanja'],
            'file_pernyataan' => $data_usulan['file_pernyataan'],  
            'tahun_penelitian' => $data_usulan['years_name'],
            'verifikasi' => $data_usulan['verifikasi'],
            //'pdf' => $data_usulan['pdf'],
            'content' => 'usulan_penelitian/usulan-detail',
        );
        $this->load->view('template/site',$data);
    }

    public function export_excel(){
        $this->cek_pengunjung();
        $kode_penelitian = $this->input->post('kode_penelitian');
        $npj = $this->input->post('npj');
        $pendanaan = $this->input->post('pendanaan');
        $tahun_penelitian = $this->input->post('tahun_penelitian');
        $result = $this->model->LikeDtlp($kode_penelitian,$npj,$tahun_penelitian,$pendanaan)->result_array();
        $data = array(
            'title' => 'Data Laporan Penelitian',
            'data_usulan' => $result,
        );
        $this->load->view('dtlp/dtlp-report-excel',$data);
    }

    public function export_pdf(){
        $this->cek_pengunjung();
        $kode_penelitian = $this->input->post('kode_penelitian');
        $npj = $this->input->post('npj');
        $pendanaan = $this->input->post('pendanaan');
        $tahun_penelitian = $this->input->post('tahun_penelitian');
        $result = $this->model->LikeDtlp($kode_penelitian,$npj,$tahun_penelitian,$pendanaan)->result_array();
        ob_start();
        $data = array(
            'title' => 'Data Laporan Penelitian',
            'data_usulan' => $result,
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
        $bidang_kajian = $this->input->post('bidang_kajian');
        $ketua = $this->input->post('ketua');
        $pendanaan = $this->input->post('pendanaan');
        $tahun_penelitian = $this->input->post('tahun_penelitian');
        $result = $this->model->LikeUsulan($bidang_kajian,$ketua,$tahun_penelitian,$pendanaan)->result_array();
        $data = array(
            'title' => 'Data Laporan Penelitian',
            'data_usulan' => $result,
        );
        $this->load->view('usulan_penelitian/usulan-report-pdf', $data);
    }

}
?>