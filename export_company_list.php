<?php
session_start();
include "config.php";
include "connection/connection.php";
include "functions/functions.php";

if(isset($_GET['active']))
  {
    $sql = "select * from company_master where com_status = '0' order by com_name asc";
  }
 else
 {
    $sql = "select * from company_master order by com_name asc";  
  }	
	$rec = q($sql);
	
	
//$SI = $_GET['scheme_id'];
//$salary_master_id = mysql_real_escape_string($_GET['scheme_id']);
// Have to catch cat_id to apply logic for hers category
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
				  ->setCellValue('B1', 'COMPANY')
				  ->setCellValue('C1', 'CEO')
				  ->setCellValue('F1', 'LOCAL ADDRESS')
				 /* ->setCellValue('E1', '')
				  ->setCellValue('F1', '')
				  ->setCellValue('G1', '')
				  ->setCellValue('H1', '')*/
				  ->setCellValue('K1', 'PERMANENT ADDRESS')
				 /* ->setCellValue('J1', '')
				  ->setCellValue('K1', '')
				  ->setCellValue('L1', '')
				  ->setCellValue('M1', '')*/
				  ->setCellValue('P1', 'CONTACT DETAILS')
				  /*->setCellValue('O1', '')
				  ->setCellValue('P1', '')
				  ->setCellValue('Q1', '')
				  ->setCellValue('R1', '')*/
				  ->setCellValue('S1', 'STATUS');
				 /* ->setCellValue('R1', 'EPF')
				  ->setCellValue('S1', 'OTHERS( INCOME TAX )')
				  ->setCellValue('T1', 'TOTAL DEDUCTION')
				  ->setCellValue('U1', 'NETPAY');*/
			$objPHPExcel->setActiveSheetIndex(0)
				  ->setCellValue('A2', '')
				  ->setCellValue('B2', '')
				  ->setCellValue('C2', '')
				  ->setCellValue('D2', 'AREA')
				  ->setCellValue('E2', 'WARD NO.')
				  ->setCellValue('F2', 'DISTRICT')
				  ->setCellValue('G2', 'STATE')
				  ->setCellValue('H2', 'PIN')
				  ->setCellValue('I2', 'AREA')
				  ->setCellValue('J2', 'WARD NO.')
				  ->setCellValue('K2', 'DISTRICT')
				  ->setCellValue('L2', 'STATE')
				  ->setCellValue('M2', 'PIN')
				  ->setCellValue('N2', 'MOBILE 1')
				  ->setCellValue('O2', 'MOBILE 2')
				  ->setCellValue('P2', 'TELEPHONE')
				  ->setCellValue('Q2', 'EMAIL 1')
				  ->setCellValue('R2', 'EMAIL 2')
				  ->setCellValue('S2', '');
                 
       $i=1;
	   
	   
         
		while($fetch_emp = f($rec))
		{
			
			 
          	$i++;
		  
			if($fetch_emp['com_status'] == '0')
			{
				$status = "Active";
			}
			else
			{
				$status = "Inactive";
			}
		
		  
          $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.($i+1), $i)
			->setCellValue('B'.($i+1), $fetch_emp['com_name'])
  			->setCellValue('C'.($i+1), $fetch_emp['com_ceo'])
			->setCellValue('D'.($i+1), $fetch_emp['com_local_address'])
		  	->setCellValue('E'.($i+1), $fetch_emp['com_local_ward'])
		  	->setCellValue('F'.($i+1), district_name($fetch_emp['com_local_district']))
		  	->setCellValue('G'.($i+1), state_name($fetch_emp['com_local_state']))
		  	->setCellValue('H'.($i+1), $fetch_emp['com_local_pin'])
		  	->setCellValue('I'.($i+1), $fetch_emp['com_per_address'])
		  	->setCellValue('J'.($i+1), $fetch_emp['com_per_ward'])
		  	->setCellValue('K'.($i+1), district_name($fetch_emp['com_per_district']))
		  	->setCellValue('L'.($i+1), state_name($fetch_emp['com_per_state']))
		  	->setCellValue('M'.($i+1), $fetch_emp['com_per_pin'])
		  	->setCellValue('N'.($i+1), $fetch_emp['com_mobile1'])
		  	->setCellValue('O'.($i+1), $fetch_emp['com_mobile2'])
		  	->setCellValue('P'.($i+1), $fetch_emp['com_telephone'])
		  	->setCellValue('Q'.($i+1), $fetch_emp['com_email1'])
		  	->setCellValue('R'.($i+1), $fetch_emp['com_email2'])
		  	->setCellValue('S'.($i+1), $status);
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
header('Content-Disposition: attachment;filename="Company Details.xlsx"');
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
