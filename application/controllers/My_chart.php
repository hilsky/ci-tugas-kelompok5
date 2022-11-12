<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chart extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //memanggil model
        $this->load->model(array('kota_model'));
    }

    public function index()
    {
        $this->pie();
    }

    public function pie()
    {

        $data_kota = $this->kota_model->getKota();

        //mengirim data ke view
        $output = array(
            'judul' => 'Pie Chart',
            'data_kota' => $data_kota
        );

        //memanggil file view
        $this->load->view('grafik/highchart', $output);
    }

    public function column()
    {
        //memanggil function read pada kota model
        //function read berfungsi mengambil/read data dari table kota di database
        $data_kota = $this->kota_model->getKota();

        //mengirim data ke view
        $output = array(
            'theme_page' => 'chart_column',
            'judul' => 'Column Chart',
            'data_kota' => $data_kota
        );

        //memanggil file view
        $this->load->view('grafik/highchart', $output);
    }
}
