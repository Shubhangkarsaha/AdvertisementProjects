<?php
session_start();
include "config.php";
include "connection/connection.php";
include "functions/functions.php";

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Asia/Kolkata');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");                 
      // Add some data
      $objPHPExcel->setActiveSheetIndex(0)
                  ->setCellValue('A1', 'SL. NO.')
				  ->setCellValue('B1', 'CATEGORY')
				  ->setCellValue('C1', 'SIZE TYPE')
				  ->setCellValue('D1', 'PAYMENT TYPE')
				  ->setCellValue('E1', 'RATE');
				  /*->setCellValue('F1', 'AREA')
				  ->setCellValue('G1', 'PIN')
				  ->setCellValue('H1', 'LOCATION')
				  ->setCellValue('I1', 'SITE TYPE')
				  ->setCellValue('J1', 'COMPANY')
				  ->setCellValue('K1', 'CATEGORY')
				  ->setCellValue('L1', 'SIZE TYPE')
				  ->setCellValue('M1', 'SIZE')
				  ->setCellValue('N1', 'TOTAL SIZE')
				  ->setCellValue('O1', 'CONTRACT DATE')
				  ->setCellValue('P1', 'INSTALLATION DATE')
				  ->setCellValue('Q1', 'STATUS');
				 /* ->setCellValue('R1', 'EPF')
				  ->setCellValue('S1', 'OTHERS( INCOME TAX )')
				  ->setCellValue('T1', 'TOTAL DEDUCTION')
				  ->setCellValue('U1', 'NETPAY');*/
                 
        $i=0;
	    if(isset($_GET['active']))
		  {
	        $fsql = "select * from category_master where cat_status = '0' order by cat_name asc" ;
	  	  }
		 else
		 {
		   $fsql = "select * from category_master order by cat_name asc";
		  }  
		$frec = q($fsql);
         
		while($fetch_data = f($frec))
		{
			
			
          	$i++;
		  
			
		  
          $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.($i+1), $i)
			->setCellValue('B'.($i+1), $fetch_data['cat_name'])
  			->setCellValue('C'.($i+1), $fetch_data['cat_size_type'])
			->setCellValue('D'.($i+1), pay_type($fetch_data['cat_id']))
			->setCellValue('E'.($i+1), $fetch_data['cat_rate']);
			/*->setCellValue('F'.($i+1), $fetch_data['site_area'])
			->setCellValue('G'.($i+1), $fetch_data['site_pin'])
			->setCellValue('H'.($i+1), $fetch_data['site_location'])
			->setCellValue('I'.($i+1), " ".$fetch_data['site_type'])
			->setCellValue('J'.($i+1), com_name($fetch_data['com_id']))
			->setCellValue('K'.($i+1), cat_name($fetch_data['cat_id']))
			->setCellValue('L'.($i+1), $fetch_data['item_size_type']) // error occures due to same name in the data base. have to use single single attribute selection method 
			->setCellValue('M'.($i+1), $fetch_data['item_size'])
			->setCellValue('N'.($i+1), $fetch_data['item_total_size'])
			->setCellValue('O'.($i+1), date_reverse($fetch_data['contract_date']))
			->setCellValue('P'.($i+1), date_reverse($fetch_data['installation_date']))
			->setCellValue('Q'.($i+1), $status);
			/*->setCellValue('R'.($i+1), $epf_amt )
			->setCellValue('S'.($i+1), $fetch_emp['other_amt'])
			->setCellValue('T'.($i+1), $fetch_emp['other_amt'] + $epf_amt + $fetch_emp['ptax'])
			->setCellValue('U'.($i+1), $net_salary);*/
			}
		//die();
// Rename worksheet Title
$objPHPExcel->getActiveSheet()->setTitle('Master Roll');
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//Can change file name
header('Content-Disposition: attachment;filename="Category Details.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
