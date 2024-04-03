<?php
require 'vendor/autoload.php'; 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Csv;


$spreadsheet = new Spreadsheet();


$sheet = $spreadsheet->getActiveSheet();


$sheet->setCellValue('A1', 'Nama');
$sheet->setCellValue('B1', 'Usia');
$sheet->setCellValue('C1', 'Alamat');
$sheet->setCellValue('D1', 'Pekerjaan');


$dataPenduduk = array(
    array('John Doe', 30, '123 Main St', 'Engineer'),
    array('Jane Smith', 25, '456 Elm St', 'Teacher'),
    array('Smith William', 28, '458 Esp St', 'Police'),
    array('Alice Johnson', 35, '789 Oak St', 'Doctor'),
    array('Michael Brown', 40, '101 Pine St', 'Lawyer'),
    array('Emily Wilson', 27, '222 Maple St', 'Nurse'),
    array('David Lee', 33, '333 Cedar St', 'Architect'),
    array('Jennifer Garcia', 29, '444 Birch St', 'Accountant'),
    array('James Martinez', 45, '555 Willow St', 'Chef'),
    array('Jessica Taylor', 31, '666 Fir St', 'Artist'),
);

$row = 2;
foreach ($dataPenduduk as $data) {
    $sheet->setCellValue('A' . $row, $data[0]);
    $sheet->setCellValue('B' . $row, $data[1]);
    $sheet->setCellValue('C' . $row, $data[2]);
    $sheet->setCellValue('D' . $row, $data[3]);
    $row++;
}


$csvWriter = new Csv($spreadsheet);
$csvWriter->save('data_penduduk.csv');


function cariDataPenduduk($nama, $dataPenduduk) {
    $result = array();
    foreach ($dataPenduduk as $data) {
        if (strpos($data[0], $nama) !== false) {
            $result[] = $data;
        }
    }
    return $result;
}


$hasilPencarian = cariDataPenduduk('John', $dataPenduduk);
print_r($hasilPencarian);


$writerXlsx = new Xlsx($spreadsheet);
$writerXlsx->save('data_penduduk.xlsx');
?>
