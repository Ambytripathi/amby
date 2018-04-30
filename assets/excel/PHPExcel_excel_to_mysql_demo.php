<?php
/**
 * PHPExcel - Excel data import to MySQL database script example
 * ==============================================================================
 * 
 * @version v1.0: PHPExcel_excel_to_mysql_demo.php 2016/03/03
 * @copyright Copyright (c) 2016, http://www.ilovephp.net
 * @author Sagar Deshmukh <sagarsdeshmukh91@gmail.com>
 * @SourceOfPHPExcel https://github.com/PHPOffice/PHPExcel, https://sourceforge.net/projects/phpexcelreader/
 * ==============================================================================
 *
 */
 
	require 'Classes/PHPExcel/IOFactory.php';
	
	$inputFileName = 'users.xls';
	//  Read your Excel workbook
	try {
		$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objPHPExcel = $objReader->load($inputFileName);
	} catch (Exception $e) {
		die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) 
		. '": ' . $e->getMessage());
	}

	//  Get worksheet dimensions
	$sheet = $objPHPExcel->getSheet(0);
	$highestRow = $sheet->getHighestRow();
	$highestColumn = $sheet->getHighestColumn();

	//  Loop through each row of the worksheet in turn
	for ($row = 1; $row <= $highestRow; $row++){ 
			//  Read a row of data into an array
			$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
			//  Insert row data array into your database of choice here
			if($row != 1){
				if(!empty($rowData[0][0])){
					
					
					$exceldata[] = $rowData[0];
						
				}
			}
		}


	if(isset($exceldata)){
		// Print excel data Show
		echo "<table>";
		foreach ($exceldata as $index => $excelraw)
		{
			echo "<tr>";
			foreach ($excelraw as $excelcolumn)
			{
				echo "<td>".$excelcolumn."</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
		
		// Print excel data End
	}

	
?>




