<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
include('simple_html_dom.php');

class Samingan extends CI_Controller {

	function __construct(){
		parent::__construct();
    	// if ($this->session->userdata('uname')==""){
		// 	redirect('Auth');
		// }else if ($this->session->userdata('userlevel')<>"ADMIN"){
		// 	redirect('Auth');
		// }
    }

	public function error(){
    	$this->load->view('index.html');
    }

    public function index()
	{
		$data['select'] = $this->db->get("tb_samingan");
		$this->load->view('samingan',$data);
    }
    
    // public function check() {
    //     if(!isset($_POST["user"]))
    //     exit -1;
    //     # create and load the HTML
    //     $html = new simple_html_dom();
    //     $html->load_file("http://scholar.google.se/citations?user=" . $_POST["user"]);

    //     $s = " \"citations_per_year\": { ";
    //     $years = $html->find('.gsc_g_t');
    //     $scores = $html->find('.gsc_g_al');
    //     foreach($scores as $key => $score) {
    //         $s .= "\n  \"" . trim($years[$key]->plaintext) ."\": ". trim($score->plaintext) . ",";
    //     }
    //     print substr($s, 0, -1) . "\n },\n";


    //     $str = " \"publications\": [";
    //     foreach($html->find("#gsc_a_t .gsc_a_tr") as $pub) {
    //         $links = $pub->find('a');
    //         foreach ($links as $link) {
    //             $datalink = str_replace("amp;","",$link->href);
    //         }
    //         $str .= "\n  {\n    \"title\": \"" . trim($pub->find(".gsc_a_at", 0)->plaintext);
    //         $str .= "\",\n    \"authors\": \"" . trim($pub->find(".gs_gray", 0)->plaintext);
    //         $str .= "\",\n    \"venue\": \"" .trim($pub->find(".gs_gray", 1)->plaintext);

    //         //keterangan apa kek
    //         if(!is_numeric($pub->find(".gsc_a_ac", 0)->plaintext))
    //             $str .= "\",\n    \"citations\": 0";
    //         else
    //             $str .= "\",\n    \"citations\": " . $pub->find(".gsc_a_ac", 0)->plaintext
    //             . " " . $datalink;
    //         if($pub->find(".gsc_a_h", 0)->plaintext == " ")
    //             $str .= ",\n    \"year\": 0";
    //         else
    //             $str .= ",\n    \"year\": " . $pub->find(".gsc_a_h", 0)->plaintext;
    //         $str .= "\n  },";
    //     }
    //     print substr($str, 0, -1) . "\n ]\n}";
    // }

    public function check() {
        if(!isset($_POST["user"]))
        exit -1;
        # create and load the HTML
        $html = new simple_html_dom();
        $html->load_file("http://scholar.google.se/citations?user=" . $_POST["user"]);

        $data['s'] = " \"citations_per_year\": { ";
        $data['years'] = $html->find('.gsc_g_t');
        $data['scores'] = $html->find('.gsc_g_al');
        $data['total_sitasi'] = $html->find("#gsc_rsb_st td.gsc_rsb_std", 0)->plaintext ;
        $data['data_foreach'] = $html->find("#gsc_a_t .gsc_a_tr");
        $data['data_id'] = $_POST["user"];
        $data['select'] = $this->db->get("tb_samingan");
        $this->load->view('samingan',$data);
    }
}