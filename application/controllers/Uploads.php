<?php
require 'vendor/autoload.php';
    defined('BASEPATH') OR exit('No direct script access allowed');
    use PhpOffice\PhpSpreadsheet\IOFactory;
    class Uploads extends CI_Controller {
       function __construct() {
           parent::__construct();
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
}



