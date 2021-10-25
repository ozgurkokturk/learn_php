<?php

require_once 'vendor\autoload.php';

require_once 'bootstrap.php';

// Creating the new document...
$phpWord = new \PhpOffice\PhpWord\PhpWord();
$section = $phpWord->addSection();


$cellRowSpan = array('vMerge' => 'restart');
$cellRowContinue = array('vMerge' => 'continue');
$cellColSpan = array('gridSpan' => 2);


$tableStyle = array(
    'borderColor' => '006699',
    'borderSize'  => 6,
    'cellMargin'  => 50
);
$firstRowStyle = array('bgColor' => '66BBFF');
$phpWord->addTableStyle('myTable', $tableStyle, $firstRowStyle);
$table = $section->addTable('myTable');

$table->addRow();
$table->addCell(2000, $cellRowSpan)->addText("1");
$table->addCell(2000, $cellRowSpan)->addText("2");
$table->addCell(4000, $cellColSpan)->addText("3");
$table->addCell(2000, $cellRowSpan)->addText("6");

$table->addRow();
$table->addCell(null, $cellRowContinue);
$table->addCell(null, $cellRowContinue);
$table->addCell(2000)->addText("4");
$table->addCell(2000)->addText("5");
$table->addCell(null, $cellRowContinue);

$table->addRow();
$table->addCell(2000);
$table->addCell(2000);
$table->addCell(2000);
$table->addCell(2000);
$table->addCell(2000);










// Save File
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('helloWorld2.docx');

exit;