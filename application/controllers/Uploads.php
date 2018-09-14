<?php
require 'vendor/autoload.php';
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\IOFactory;

class Uploads extends CI_Controller {

       public function __construct() {
	   parent::__construct();
	   $this->load->library(array('form_validation'));
	   $this->load->model(array('usermodel','adminmodel'));
           
       }

       public function index()
       {
           $inputFileType = 'Xlsx';
		   $bulk_upload_config = $this->config->item('bulk_upload');
		   $bulk_upload_path =  $bulk_upload_config['bulk_upload_path'];
           $inputFileName = $bulk_upload_path.'/test.xlsx';
           $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
    /**  Load $inputFileName to a Spreadsheet Object  **/
          $spreadsheet = $reader->load($inputFileName);
		 $worksheet = $spreadsheet->getActiveSheet();

	echo '<table>' . PHP_EOL;
	foreach ($worksheet->getRowIterator() as $row) {
		echo '<tr>' . PHP_EOL;
		$cellIterator = $row->getCellIterator();
		$cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
                                                     //    even if a cell value is not set.
                                                       // By default, only cells that have a value
                                                       //    set will be iterated.
		foreach ($cellIterator as $cell) {
			echo '<td>' .
             $cell->getValue() .
             '</td>' . PHP_EOL;
		}
		echo '</tr>' . PHP_EOL;
	}
		echo '</table>' . PHP_EOL;
    }
	
	public function upload_topics()
       {
			$data['title'] = 'New Institution';
			//$this->form_validation->set_rules('institution_name', 'Institutution name ', 'required');
			//$this->form_validation->set_rules('institution_code', 'Institutution code ', 'required');
		
		if ($this->form_validation->run() === TRUE)
		{
			//$institution_data['institution_code'] = $this->input->post('institution_code');
			//$institution_data['institution_name'] = $this->input->post('institution_name');
			//$institution_data['institution_status'] = 1;
			
						
			//$this->adminmodel->create_institution($institution_data);
			//$this->institutions();
			


		}
		else{
			$classes = $this->adminmodel->get_all_classes();
			$data['classes'] = $classes;
			$this->load->view('uploads/upload_topics', $data);
			
		}
    }
	
}



