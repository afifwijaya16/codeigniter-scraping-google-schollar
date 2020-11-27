<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
include('simple_html_dom.php');
class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['select'] = $this->db->get("tb_samingan");
		$data['data_id'] = '';
		$this->load->view('samingan',$data);
	}

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
