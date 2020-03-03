<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model{

    public function GetDtlp($where = ''){
        return $this->db->query('select * from laporan '.$where);
    }
    public function GetTotDtlp($where = ''){
        return $this->db->query('select laporan.*, laporan.npj, pendanaan.pendanaan_name, years.years_name from laporan LEFT JOIN pendanaan
                  ON laporan.pendanaan = pendanaan.code_pendanaan LEFT JOIN years ON laporan.tahun_penelitian = years.code_years '.$where);
    }
    public function GetTotDtlpU($where=''){
        return $this->db->query('select laporan.*, laporan.npj, pendanaan.pendanaan_name, years.years_name from laporan LEFT JOIN pendanaan
                  ON laporan.pendanaan = pendanaan.code_pendanaan LEFT JOIN years ON laporan.tahun_penelitian = years.code_years '.$where);
    }
    public function GetYears($where ='')
    {
        $data = $this->db->query('select * from years '.$where);
        return $data;
    }
    public function GetPendanaan($where = ''){
        $data = $this->db->query('select * from pendanaan '.$where);
        return $data;
    }

    public function GetUser($where = ''){
        return $this->db->query('select * from user '.$where);
    }

    public function LikeDtlp($like1,$like2,$like3,$like4){
        return $this->db->query("select *, pendanaan.pendanaan_name, years.years_name from laporan LEFT JOIN pendanaan
                  ON laporan.pendanaan = pendanaan.code_pendanaan LEFT JOIN years ON laporan.tahun_penelitian = years.code_years WHERE
                  kode_penelitian LIKE '%$like1%' and npj LIKE '%$like2%' and tahun_penelitian LIKE '%$like3%' and pendanaan LIKE '%$like4%'");
    }

    public function Simpan($table, $data){
        return $this->db->insert($table, $data);
    }

    public function Update($table,$data,$where){
        return $this->db->update($table,$data,$where);
    }

    public function Hapus($table,$where){
        return $this->db->delete($table,$where);
    }

     public function GetTotSkema($where = ''){
        return $this->db->query('select * from skema_penelitian '.$where);
    }

    public function GetSkema($where = ''){
        return $this->db->query('select * from skema_penelitian '.$where);
    }

    public function GetTotUsulan($where = ''){
        return $this->db->query('select usulan_penelitian.*, skema_penelitian.skema,skema_penelitian.luaran, pendanaan.pendanaan_name,years.years_name from usulan_penelitian LEFT JOIN skema_penelitian ON usulan_penelitian.skema_id =skema_penelitian.id_skema LEFT JOIN pendanaan ON usulan_penelitian.dana_penelitian = pendanaan.code_pendanaan LEFT JOIN years ON usulan_penelitian.tahun_penelitian = years.code_years  '.$where);
    }
     public function GetUsulan($where = ''){
        return $this->db->query('select * from usulan_penelitian '.$where);
    }

    public function LikeUsulan($like1,$like2,$like3,$like4){
        return $this->db->query("select usulan_penelitian.*, skema_penelitian.skema,skema_penelitian.luaran, pendanaan.pendanaan_name,years.years_name from usulan_penelitian LEFT JOIN skema_penelitian ON usulan_penelitian.skema_id =skema_penelitian.id_skema LEFT JOIN pendanaan ON usulan_penelitian.dana_penelitian = pendanaan.code_pendanaan LEFT JOIN years ON usulan_penelitian.tahun_penelitian = years.code_years WHERE
                  bidang_kajian LIKE '%$like1%' and ketua LIKE '%$like2%' and tahun_penelitian LIKE '%$like3%' and pendanaan_name LIKE '%$like4%'");
    }

    public function GetDosen($where = ''){
        return $this->db->query('select * from dosen '.$where);
    }

    public function GetTotLaporan($where = ''){
        return $this->db->query('select laporan_akhir.*, usulan_penelitian.judul,usulan_penelitian.ketua,years.years_name from laporan_akhir LEFT JOIN usulan_penelitian ON usulan_penelitian.id_usulan =laporan_akhir.usulan_id LEFT JOIN years ON laporan_akhir.tahun_penelitian = years.code_years '.$where);
    }

     public function GetLaporan($where = ''){
        return $this->db->query('select * from laporan_akhir '.$where);
    }

    public function GetPenelitian($where ='')
    {
        $data = $this->db->query('select * from usulan_penelitian '.$where);
        return $data;
    }

    public function hitung_penelitian()
    {
        $this->db->select('years_name, COUNT(*) AS total');
        $this->db->from('usulan_penelitian');
        $this->db->join('years', 'usulan_penelitian.tahun_penelitian = years.code_years');
        $this->db->group_by('years_name');
        $this->db->order_by('years_name', 'desc');
      //  $this->db->limit(14);
        $query = $this->db->get();
        return $query->result();
    }
     

}
?>
