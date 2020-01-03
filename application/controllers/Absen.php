<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('absen_model');
    }
    
    public function absen(){
        date_default_timezone_set('Asia/Jakarta');
        if(!$this->session->has_userdata('user_id'))
            redirect('login');
        
        if($this->session->userdata('user_status') === 'admin')
            redirect('data_absen');
        
        if($this->absen_model->check_absen($this->session->userdata('user_id'), mdate('%Y-%m-%d')))
            redirect('data_absenku');
        
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'max_length[75]');
        
        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header_absen');
            $this->load->view('absen/index');
            $this->load->view('templates/footer');
        }else{
            $id_karyawan = $this->session->userdata('user_id');
            $tanggal = mdate('%Y/%m/%d');
            $masuk = mdate('%H:%i:%s');
            $keterangan = $this->security->xss_clean(html_escape($this->input->post('keterangan')));
            $ip_address = $this->input->post('ip_address'); 
            $latlng = $this->input->post('latlng');
            
            $this->session->set_userdata('absen_masuk', TRUE);
            $this->absen_model->input_absen($id_karyawan, $tanggal, $masuk, $keterangan, $ip_address, $latlng);
            redirect('data_absenku');
        }
    }
    
    public function absen_pulang(){
        date_default_timezone_set('Asia/Jakarta');
        if(!$this->session->has_userdata('user_id'))
            redirect('login');
        
        if($this->absen_model->check_pulang($this->session->userdata('user_id'), mdate('%Y-%m-%d')))
            $absen = $this->absen_model->check_pulang($this->session->userdata('user_id'), mdate('%Y-%m-%d'));
        else
            redirect('data_absen');
        
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'max_length[75]');
        
        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header_absen');
            $this->load->view('absen/pulang');
            $this->load->view('templates/footer');
        }else{
            $pulang = mdate('%H:%i:%s');
            $keterangan = $this->security->xss_clean(html_escape($this->input->post('keterangan')));
            $latlng = $this->input->post('latlng');
            
            $this->session->unset_userdata('absen_masuk');
            $this->session->set_userdata('absen_pulang', TRUE);
            $this->absen_model->input_pulang($absen['id'], $pulang, $keterangan, $latlng);
            redirect('data_absen');
        }
    }
    
    public function data(){
        if(!$this->session->has_userdata('user_id')){
            redirect('login');
        }elseif($this->session->userdata('user_status') === 'karyawan'){
            redirect('data_absenku');
        }
        
        $num_rows = $this->absen_model->num_rows();
        $config['base_url'] = 'http://localhost/akar/data_absen/page/';
        $config['total_rows'] = $num_rows;
        $config['per_page'] = 20;
        $config['num_links'] = 4;
        $config['uri_segment'] = 3;
        $config['first_url'] = 1;
        $config['use_page_numbers'] = TRUE;
        $config['cur_tag_open'] = '<li><a href="' .$this->uri->segment(3). '">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_link'] = 'First';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        $config['last_link'] = 'Last';
        
        $page = ($this->uri->segment(3) > 1) ? ($this->uri->segment(3) * $config['per_page']) - $config['per_page'] : 0;
        $pages = ceil($num_rows/$config['per_page']);
        
        if($this->uri->segment(3) > $pages){ redirect('data_absen'); }
        if($this->uri->segment(3) > $pages){ redirect('data_absen'); }
        
        $this->pagination->initialize($config);
        $data['data'] = $this->absen_model->get_absen($config['per_page'], $page);
        $data['links'] = $this->pagination->create_links();
        
        $this->load->view('templates/header');
        $this->load->view('absen/data', $data);
        $this->load->view('templates/footer');
    }
    
    public function dataku(){
        if(!$this->session->has_userdata('user_id')){
            redirect('login');
        }elseif($this->session->userdata('user_status') === 'admin'){
            redirect('data_absen');
        }
        
        $num_rows = $this->absen_model->num_rows($this->session->userdata('user_id'));
        $config['base_url'] = 'http://localhost/akar/data_absenku/page/';
        $config['total_rows'] = $num_rows;
        $config['per_page'] = 20;
        $config['num_links'] = 4;
        $config['uri_segment'] = 3;
        $config['first_url'] = 1;
        $config['use_page_numbers'] = TRUE;
        $config['cur_tag_open'] = '<li><a href="' .$this->uri->segment(3). '">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_link'] = 'First';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        $config['last_link'] = 'Last';
        
        $page = ($this->uri->segment(3) > 1) ? ($this->uri->segment(3) * $config['per_page']) - $config['per_page'] : 0;
        $pages = ceil($num_rows/$config['per_page']);
        
        if($this->uri->segment(3) > $pages){ redirect('data_absenku'); }
        if($this->uri->segment(3) > $pages){ redirect('data_absenku'); }
        
        $this->pagination->initialize($config);
        $data['data'] = $this->absen_model->get_absen($config['per_page'], $page, $this->session->userdata('user_id'));
        $data['links'] = $this->pagination->create_links();
        
        $this->load->view('templates/header');
        $this->load->view('absen/data', $data);
        $this->load->view('templates/footer');
    }
    
    public function search(){
        $num_rows = $this->absen_model->num_rows_search($this->input->get('key'));
        $config['base_url'] = 'http://localhost/akar/search/absen?key=' .$this->input->get('key');
        $config['total_rows'] = $num_rows;
        $config['per_page'] = 20;
        $config['num_links'] = 4;
        $config['uri_segment'] = $this->input->get('page');
        $config['first_url'] = 'http://localhost/akar/search/absen?key=' .$this->input->get('key'). '&page=1';
        $config['page_query_string'] = TRUE;
        $config['use_page_numbers'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['cur_tag_open'] = '<li class="active"><a href="' .$this->uri->segment(3). '">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_link'] = 'First';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        $config['last_link'] = 'Last';
        
        $page = ($this->input->get('page') > 1) ? ($this->input->get('page') * $config['per_page']) - $config['per_page'] : 0; 
        $pages = ceil($num_rows/$config['per_page']); 
        
        if($this->input->get('page') > $pages){ redirect('data'); }
        
        $this->pagination->initialize($config);
        $data['data'] = $this->absen_model->get_search($this->input->get('key'), $config['per_page'], $page);
        $data["links"] = $this->pagination->create_links();
        
        $this->load->view('templates/header');
		$this->load->view('absen/data', $data);
        $this->load->view('templates/footer'); 
    }
    
    public function searchku(){
        $num_rows = $this->absen_model->num_rows_search($this->input->get('key'), $this->session->userdata('user_id'));
        $config['base_url'] = 'http://localhost/akar/search/absen?key=' .$this->input->get('key');
        $config['total_rows'] = $num_rows;
        $config['per_page'] = 20;
        $config['num_links'] = 4;
        $config['uri_segment'] = $this->input->get('page');
        $config['first_url'] = 'http://localhost/akar/search/absen?key=' .$this->input->get('key'). '&page=1';
        $config['page_query_string'] = TRUE;
        $config['use_page_numbers'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['cur_tag_open'] = '<li class="active"><a href="' .$this->uri->segment(3). '">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_link'] = 'First';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        $config['last_link'] = 'Last';
        
        $page = ($this->input->get('page') > 1) ? ($this->input->get('page') * $config['per_page']) - $config['per_page'] : 0; 
        $pages = ceil($num_rows/$config['per_page']); 
        
        if($this->input->get('page') > $pages){ redirect('data'); }
        
        $this->pagination->initialize($config);
        $data['data'] = $this->absen_model->get_search($this->input->get('key'), $config['per_page'], $page, $this->session->userdata('user_id'));
        $data["links"] = $this->pagination->create_links();
        
        $this->load->view('templates/header');
		$this->load->view('absen/data', $data);
        $this->load->view('templates/footer'); 
    }
    
    public function between(){
        if(!$this->session->has_userdata('user_id')){
            redirect('login');
        }
        
        $num_rows = $this->absen_model->num_rows();
        $config['base_url'] = 'http://localhost/akar/data_absen/page/';
        $config['total_rows'] = $num_rows;
        $config['per_page'] = 20;
        $config['num_links'] = 4;
        $config['uri_segment'] = 3;
        $config['first_url'] = 1;
        $config['use_page_numbers'] = TRUE;
        $config['cur_tag_open'] = '<li><a href="' .$this->uri->segment(3). '">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_link'] = 'First';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        $config['last_link'] = 'Last';
        
        $page = ($this->uri->segment(3) > 1) ? ($this->uri->segment(3) * $config['per_page']) - $config['per_page'] : 0;
        $pages = ceil($num_rows/$config['per_page']);
        
        if($this->uri->segment(3) > $pages){ redirect('data_absen'); }
        if($this->uri->segment(3) > $pages){ redirect('data_absen'); }
        
        $this->pagination->initialize($config);
        $data['data'] = $this->absen_model->get_absen($config['per_page'], $page);
        $data['links'] = $this->pagination->create_links();
        
        $this->load->view('templates/header');
		$this->load->view('absen/cari_absen', $data);
        $this->load->view('templates/footer'); 
    }
    
    public function search_between(){
        $num_rows = $this->absen_model->num_rows_search_between($this->input->get('date'), $this->input->get('date2'));
        $config['base_url'] = 'http://localhost/akar/search/between?date=' .$this->input->get('date'). '&date2=' .$this->input->get('date2');
        $config['total_rows'] = $num_rows;
        $config['per_page'] = 20;
        $config['num_links'] = 4;
        $config['uri_segment'] = $this->input->get('page');
        $config['first_url'] = 'http://localhost/akar/search/between?date=' .$this->input->get('date'). '&date2=' .$this->input->get('date2'). '&page=1';
        $config['page_query_string'] = TRUE;
        $config['use_page_numbers'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['cur_tag_open'] = '<li class="active"><a href="' .$this->uri->segment(3). '">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_link'] = 'First';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        $config['last_link'] = 'Last';
        
        $page = ($this->input->get('page') > 1) ? ($this->input->get('page') * $config['per_page']) - $config['per_page'] : 0; 
        $pages = ceil($num_rows/$config['per_page']); 
        
        if($this->input->get('page') > $pages){ redirect('data'); }
        
        $this->pagination->initialize($config);
        $data['data'] = $this->absen_model->get_search_between($this->input->get('date'), $this->input->get('date2'), $config['per_page'], $page);
        $data["links"] = $this->pagination->create_links();
        
        $this->load->view('templates/header');
		$this->load->view('absen/data', $data);
        $this->load->view('templates/footer'); 
    }
    
    public function export_excel(){
        if(!$this->session->has_userdata('logged_in'))
            redirect('login');
        
        if($this->session->userdata('user_status') != 'admin')
            redirect('data_absen');
       
        $data = $this->absen_model->get_all();
        $sheet = $this->excel->getActiveSheet();
        
        $this->excel->getProperties()->setCreator("Luqmanul hakim || Thoriq aziz")
            ->setTitle('Absensi PT. RIGEL DIGITAL')
            ->setSubject('Laporan absensi')
            ->setDescription('Laporan absensi');
        
        $sheet->mergeCells('A1:F1');
        $sheet->getCell('A1')->setValue('Daftar absensi Karyawan PT. Rigel Digital Solusi Indonesia');
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_alignment::HORIZONTAL_CENTER);
     
        $this->excel->setActiveSheetIndex(0)
            ->setCellValue('A2', 'No : ')
            ->setCellValue('B2', 'Nama : ')
            ->setCellValue('C2', 'Tanggal : ')
            ->setCellValue('D2', 'Jam masuk : ')
            ->setCellValue('E2', 'Jam pulang : ')
            ->setCellValue('F2', 'Jumlah jam kerja : ')
            ->setCellValue('G2', 'Keterangan : ');
        
        $col = 3;
        $i = 1;
        foreach($data as $absen){
            $jam1 = new DateTime($absen['masuk']);
            $jam2 = new DateTime($absen['pulang']);
            $difference = $jam1->diff($jam2);

            $jam = $difference->h;
            $menit = $difference->i;
            $detik = $difference->s;
            $this->excel->setActiveSheetIndex(0)
                ->setCellValueByColumnAndRow(0, $col, $i)
                ->setCellValueByColumnAndRow(1, $col, $absen['awalan'].' '.$absen['nama_depan'].' '.$absen['nama_tengah'].' '.$absen['nama_belakang'].' '.$absen['akhiran'])
                ->setCellValueByColumnAndRow(2, $col, $absen['tanggal'])
                ->setCellValueByColumnAndRow(3, $col, $absen['masuk'])
                ->setCellValueByColumnAndRow(4, $col, $absen['pulang'])
                ->setCellValueByColumnAndRow(5, $col, $jam .':'. $menit .':'. $detik)
                ->setCellValueByColumnAndRow(6, $col, $absen['keterangan']);
            
            $sheet->getStyleByColumnAndRow(0, $col)->getAlignment()->setHorizontal(PHPExcel_Style_alignment::HORIZONTAL_LEFT);
            
            $col++;
            $i++;
        }
        
        $sheet->getColumnDimension('B')->setWidth(25);
        $sheet->getColumnDimension('C')->setWidth(12);
        $sheet->getColumnDimension('D')->setWidth(13);
        $sheet->getColumnDimension('E')->setWidth(13);
        $sheet->getColumnDimension('F')->setWidth(18);
        $sheet->getColumnDimension('G')->setWidth(50);
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Absensi.xlsx"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        
        $writer = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007'); 
        $writer->save('php://output');
        exit;
    }
    
    public function detail_absen($id){
        $data['data'] = $this->absen_model->get_absen_id($id);
        
        $this->load->view('templates/header');
		$this->load->view('absen/detail', $data);
        $this->load->view('templates/footer');
    }
    
}