<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_akhir extends CI_Controller{

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
         //   'data_pendanaan' => $this->model->GetPendanaan('order by pendanaan_name asc')->result_array(),
            'data_years' => $this->model->GetYears('order by years_name asc')->result_array(),
            'data_ketua' => $this->model->GetUsulan('order by ketua')->result_array(),
            'data_laporan' => $this->model->GetTotLaporan('order by tgl_laporan asc')->result_array(),
          //  'data_usulan' => $this->model->GetUsulan('order by  asc')->result_array(),
            'data_anggota' => $this->model->GetDosen('order by dosen asc')->result_array(),
            'content' => 'Laporan_akhir/laporan-data',
        );
        $this->load->view('template/site', $data);
    }

    public function simpan_data(){
        $this->cek_user();
        if (!$_POST['simpan']){
            $this->session->set_flashdata('warning', 'Tambah data belum dilakukan');
            redirect('Laporan_akhir');
        }
        $tahun_penelitian = $this->input->post('tahun_penelitian');
        $data_years = $this->model->GetYears("where code_years = '$tahun_penelitian'")->row_array();
            $config = array(
                'upload_path' => './assets/pdf/'.$data_years['years_name'],
                'allowed_types' => 'pdf',
                'max_size' => '1000000',
            );
            $this->load->library('upload', $config);
            $this->upload->do_upload('file_program');
            $upload_data1 = $this->upload->data();
            $this->upload->do_upload('file_sptb');
            $upload_data2 = $this->upload->data();
            $this->upload->do_upload('file_pernyataan');
            $upload_data3 = $this->upload->data();
            $data = array(
                'tgl_laporan' => $this->input->post('tgl_laporan'),
                'usulan_id' => $this->input->post('usulan_id'),
                'ringkasan_penelitian' => $this->input->post('ringkasan_penelitian'),
                'file_program' => $upload_data1['file_name'],
                'file_sptb' => $upload_data2['file_name'],
                'link_luaranjurnal' => $this->input->post('link_luaranjurnal'),
                'file_pernyataan' => $upload_data3['file_name'],
                'tahun_penelitian' => $this->input->post('tahun_penelitian'),
                'verifikasi' => $this->input->post('verifikasi'),
            );
            $this->model->Simpan('Laporan_akhir', $data);
            $this->session->set_flashdata('sukses', 'Simpan data berhasil dilakukan');
            redirect('Laporan_akhir');
    }

    public function edit_data($kode = 0){
        $this->cek_user();
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Anda belum memilih data untuk di edit');
            redirect('Laporan_akhir');
        }
        $data_laporan = $this->model->GetLaporan("where id_laporan = '$kode'")->row_array();

      //  $pendanaan_post_array = array();
      //  foreach ($this->model->GetUsulan("where id_usulan = '$kode'")->result_array() as $pendanaan){
      //      $pendanaan_post_array[] = $pendanaan['pendanaan'];
      //  }

        $years_post_array = array();
        foreach ($this->model->GetLaporan("where id_laporan = '$kode'")->result_array() as $years){
            $years_post_array[] = $years['tahun_penelitian'];
        }

      //  $skema_post_array = array();
      //  foreach ($this->model->GetUsulan("where id_usulan = '$kode'")->result_array() as $skema){
      //      $skema_post_array[] = $skema['skema'];
      //  }  

      //  $dosen_post_array = array();
      //  foreach ($this->model->GetLaporan("where id_laporan = '$kode'")->result_array() as $anggota){
      //     $dosen_post_array[] = $anggota['ketua'];
      //  }        


        $tahun = $this->model->GetTotLaporan("where id_laporan = '$kode'")->row_array();
      //  $data_anggota = $this->model->GetDosen('order by dosen asc')->result_array();

        $data = array(
            'id_laporan' => $data_laporan['id_laporan'],
            'tgl_laporan' => $data_laporan['tgl_laporan'],
            'usulan_id' => $data_laporan['usulan_id'],
         //   'usulan' => $this->model->GetUsulan()->result_array(),
            'ringkasan_penelitian' => $data_laporan['ringkasan_penelitian'],
            'years_post' => $years_post_array,
         //   'bidang_kajian' => $data_usulan['bidang_kajian'],  
         //   'pendanaan_post' => $pendanaan_post_array,
         //   'ketua' => $data_usulan['ketua'],
            'data_ketua' => $this->model->GetUsulan('order by ketua')->result_array(),
            'data_anggota' => $this->model->GetDosen('order by dosen asc')->result_array(),
         //   'anggota2' => $data_usulan['anggota2'],
         //   'anggota3' => $data_usulan['anggota3'],
          //  'tenaga_ahli' => $data_usulan['tenaga_ahli'],
          //  'nomor_induk' => $data_usulan['nomor_induk'],
            'file_program' => $data_laporan['file_program'],
            'file_sptb' => $data_laporan['file_sptb'],
            'link_luaranjurnal' => $data_laporan['link_luaranjurnal'],
            'file_pernyataan' => $data_laporan['file_pernyataan'],
            'tahun_penelitian' => $tahun['years_name'],
            'verifikasi' => $data_laporan['verifikasi'],
         //   'pendanaan' => $this->model->GetPendanaan()->result_array(),
            'years' => $this->model->GetYears()->result_array(),
            'content' => 'laporan_akhir/laporan-edit',
        );
        $this->load->view('template/site',$data);
    }

    public function update_data(){
        $this->cek_user();
        if (!$_POST['update']){
            $this->session->set_flashdata('warning','Update data belum dilakukan');
            redirect('Laporan_akhir');
        }
    //    $kode_penelitian = $this->input->post('kode_penelitian');
    //    $kode_penelitian1 = $this->input->post('kode_penelitian1');
        $id_laporan = $this->input->post('id_laporan');
        $tahun_penelitian_lama = $this->input->post('tahun_penelitian');
        $tahun_penelitian_baru = $this->input->post('tahun_penelitian1');
        $data_years = $this->model->GetYears("where code_years = '$tahun_penelitian_baru'")->row_array();
        $program_lama = $this->input->post('program_lama');
        $sptb_lama = $this->input->post('sptb_lama');
        $pernyataan_lama = $this->input->post('pernyataan_lama');
        if ($_FILES['file_program']['name'] == null or $_FILES['file_sptb']['name'] == null or $_FILES['file_pernyataan']['name'] == null){
            $pdf1 = $progam_lama;
            $pdf2 = $sptb_lama;
            $pdf3 = $pernyataan_lama;
        }else{
            $config = array(
                'upload_path' => './assets/pdf/'.$data_years['years_name'],
                'allowed_types' => 'pdf',
                'max_size' => '1000000',
            );
            $this->load->library('upload', $config);
            $this->upload->do_upload('file_program');
            $upload_data1 = $this->upload->data();
            $this->upload->do_upload('file_sptb');
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
            'id_laporan' => $this->input->post('id_laporan'),
            'tgl_laporan' => $this->input->post('tgl_laporan'),
            'usulan_id' => $this->input->post('usulan_id'),
            'ringkasan_penelitian' => $this->input->post('ringkasan_penelitian'),
            'file_program' => $pdf1,
            'file_sptb' => $pdf2,
            'link_luaranjurnal' => $this->input->post('link_luaranjurnal'),
            'file_pernyataan' => $pdf3,
            'tahun_penelitian' => $this->input->post('tahun_penelitian1'),
            'verifikasi' => $this->input->post('verifikasi'),
         //   'pdf' => $pdf,
        );
    $result = $this->model->Update('laporan_akhir',$data,array('id_laporan' => $id_laporan));
        if ($result == 1){
            if ($_FILES['file_program']['name'] == null and $_POST['program_lama'] != null and $data_years['years_name'] == $tahun_penelitian_lama){
            }else{
                unlink('./assets/pdf/'.$tahun_penelitian_lama.'/'.$program_lama);
            }
            $this->session->set_flashdata('sukses', 'Simpan data berhasil dilakukan');
            redirect('Laporan_akhir');
        }else{
            $this->session->set_flashdata('error', 'Simpan data gagal dilakukan');
            redirect('Laporan_akhir');
        }
    }

    public function hapus_data($kode = 1){
        $this->cek_user();
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Hapus data belum dilakukan');
            redirect('laporan_akhir');
        }
        $data_laporan = $this->model->GetTotLaporan("where id_laporan = '$kode'")->row_array();
        $result = $this->model->Hapus('Laporan_akhir',array('id_laporan' => $kode));
        $years = $data_usulan['years_name'];
        $file_program = $data_usulan['file_program'];
        $file_sptb = $data_usulan['file_sptb'];
        $file_pernyataan = $data_usulan['file_pernyataan'];
        if ($result == 1){
            if ($years != null){
                unlink('./assets/pdf/'.$years.'/'.$file_program);
                unlink('./assets/pdf/'.$years.'/'.$file_sptb);
                unlink('./assets/pdf/'.$years.'/'.$file_pernyataan);
            }
            $this->session->set_flashdata('sukses','Hapus data berhasil dilakukan');
            redirect('laporan_akhir');
        }else{
            $this->session->set_flashdata('error','Hapus data gagal dilakukan');
            redirect('laporan_akhir');
        }

    }

    public function detail_data($kode = 0){
        $this->cek_user();
        if ($this->uri->segment(3) == null){
            $this->session->set_flashdata('warning','Anda belum memilih data untuk melihat detail data');
            redirect('Laporan_akhir');
        }
        $data_laporan = $this->model->GetTotLaporan("where id_laporan = '$kode'")->row_array();
        $data = array(
            'tgl_laporan' => $data_laporan['tgl_laporan'],
            'usulan_id' => $data_laporan['usulan_id'],
            'judul' => $data_laporan['judul'],
            'ketua' => $data_laporan['ketua'],
            'ringkasan_penelitian' => $data_laporan['ringkasan_penelitian'],
            'file_program' => $data_laporan['file_program'],
            'file_sptb' => $data_laporan['file_sptb'],
            'link_luaranjurnal' => $data_laporan['link_luaranjurnal'],
            'file_pernyataan' => $data_laporan['file_pernyataan'],  
            'tahun_penelitian' => $data_laporan['years_name'],
            'verifikasi' => $data_laporan['verifikasi'],
            //'pdf' => $data_usulan['pdf'],
            'content' => 'Laporan_akhir/laporan-detail',
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