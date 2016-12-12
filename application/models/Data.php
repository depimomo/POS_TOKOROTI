<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Data extends CI_Model{
  function __construct() {
        parent::__construct();
    }
 
    function index() {
        $this->load->view('Admin/admin_account',$output)
    }
 public function employees() {
        // instance object
        $crud = new grocery_CRUD();
        // pilih tabel yang akan digunakan
        $crud->set_table('login');
        // simpan hasilnya kedalam variabel output
        $output = $crud->render();
        // tampilkan di view 
        /*$this->load->view('admin_account.php', $output);*/
    }
}