<?php
class Uploads extends CI_Controller {

function __construct() {
parent::__construct();


//  Path to simple_html_dom

}

function index() {

//  Create object of Simple_html_dom class
$reader = new Xls();
$spreadsheet = $reader->load("05featuredemo.xlsx");

//  Use Simple_html_dom class function load_file

}

}
?>

