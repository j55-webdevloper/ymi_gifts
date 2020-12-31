<?php

    require 'db.inc.php';
    require "../excel/autoload.php";

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    if(isset($_POST['submit-export'])){

        $spreadsheet = new Spreadsheet();
        $Excel_writer = new Xlsx($spreadsheet);
        
        $spreadsheet->setActiveSheetIndex(0);
        $activeSheet = $spreadsheet->getActiveSheet();
        
        $activeSheet->setCellValue('A1', 'Name');
        $activeSheet->setCellValue('B1', 'Surname');
        $activeSheet->setCellValue('C1', 'Cell No');
        $activeSheet->setCellValue('D1', 'Address');
        $activeSheet->setCellValue('E1', 'Gift');
        $activeSheet->setCellValue('F1', 'Date');

        $sqlQuery = $conn->query("SELECT * FROM ymi_gifts");
            
        if($sqlQuery->num_rows > 0) {
            $i = 2;
            while($row = $sqlQuery->fetch_assoc()) {
                $activeSheet->setCellValue('A'.$i , $row['name']);
                $activeSheet->setCellValue('B'.$i , $row['surname']);
                $activeSheet->setCellValue('C'.$i , $row['cell']);
                $activeSheet->setCellValue('D'.$i , $row['address']);
                $activeSheet->setCellValue('E'.$i , $row['gift']);
                $activeSheet->setCellValue('F'.$i , $row['ordered_at']);
                $i++;
            }
        }
        
        $filename = 'Gift Selections ' . date("d-m-y") . '.xlsx';
        

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename);
        header('Cache-Control: max-age=0');
        $Excel_writer->save('php://output');
    }

    else{
        header("Location: ../login/access/");
        exit();
    }
