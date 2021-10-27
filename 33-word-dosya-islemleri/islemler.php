<?php



ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

function tr_strtoupper($text)
{
    $search = array("ç","i","ı","ğ","ö","ş","ü");
    $replace = array("Ç","İ","I","Ğ","Ö","Ş","Ü");
    $text = str_replace($search,$replace,$text);
    $text = mb_strtoupper($text);
    return $text;
}



if ($_POST){
    print_r($_POST);

    $tabloBasligi = tr_strtoupper($_POST['baslik']);
    $dokumanNo = tr_strtoupper($_POST['dokumanNo']);
    $ilkYayinTarihi = $_POST['ilkYayınTarihi'];
    $revizyonTarihi = $_POST['revizyonTarihi'];
    $revizyonNo = $_POST['revizyonNo'];
//    $sayfa = "1/1";
    $hazirlayan = tr_strtoupper($_POST['hazirlayan']);
    $sistemOnayi = tr_strtoupper($_POST['sistemOnayi']);
    $yururlukOnayi = tr_strtoupper($_POST['yururlukOnayi']);
}
else{
    echo "veri  yok";
    die();
}



//require_once 'vendor\autoload.php';
require_once 'bootstrap.php';

use PhpOffice\PhpWord\Style\Language;


// Creating the new document...
$phpWord = new \PhpOffice\PhpWord\PhpWord();
$phpWord->getSettings()->setThemeFontLang(new Language(Language::TR_TR));



$section = $phpWord->addSection([
    'pageSizeH' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(11.7),
    'pageSizeW' => \PhpOffice\PhpWord\Shared\Converter::inchToTwip(8.3)
]);







$header = $section->addHeader();


$styleTable = array('borderSize' => 6, 'borderColor' => '999999');
$phpWord->addTableStyle('ColspanRowspan', $styleTable);
$table = $header->addTable('ColspanRowspan');

$titleStyle = array (
    'name' => 'Arial',
    'bold' => true,
    'size' => 14
);

$normalStyle = array(
    'name' => 'Arial',
    'size' => 8
);




$row = $table->addRow();
$row->addCell(1700, array('vMerge' => 'restart'))->addImage('./klulogo.jpg', array('width' => 60, 'height' => 60, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
$row->addCell(9000, array('vMerge' => 'restart'))->addText($tabloBasligi, $titleStyle,  array('align' => 'center', 'spaceAfter' => 0 , 'spaceBefore' => 300));
$row->addCell(1800)->addText(' Doküman No', $normalStyle, array( 'spaceAfter' => 0 , 'spaceBefore' => 0));
$row->addCell(1800)->addText($dokumanNo, $normalStyle,  array( 'spaceAfter' => 0 , 'spaceBefore' => 0));

$row = $table->addRow();
$row->addCell(1000, array('vMerge' => 'continue'));
$row->addCell(1000, array('vMerge' => 'continue'));
$row->addCell(1000)->addText(' İlk Yayın Tarihi', $normalStyle, array( 'spaceAfter' => 0 , 'spaceBefore' => 0));
$row->addCell(1000)->addText($ilkYayinTarihi, $normalStyle, array( 'spaceAfter' => 0 , 'spaceBefore' => 0));

$row = $table->addRow();
$row->addCell(1000, array('vMerge' => 'continue'));
$row->addCell(1000, array('vMerge' => 'continue'));
$row->addCell(1000)->addText(' Revizyon Tarihi', $normalStyle, array( 'spaceAfter' => 0 , 'spaceBefore' => 0));
$row->addCell(1000)->addText($revizyonTarihi, $normalStyle,  array( 'spaceAfter' => 0 , 'spaceBefore' => 0));

$row = $table->addRow();
$row->addCell(1000, array('vMerge' => 'continue'));
$row->addCell(1000, array('vMerge' => 'continue'));
$row->addCell(1000)->addText(' Revizyon No', $normalStyle,  array( 'spaceAfter' => 0 , 'spaceBefore' => 0));
$row->addCell(1000)->addText($revizyonNo, $normalStyle,  array( 'spaceAfter' => 0 , 'spaceBefore' => 0));

$row = $table->addRow();
$row->addCell(1000, array('vMerge' => 'continue'));
$row->addCell(1000, array('vMerge' => 'continue'));
$row->addCell(1000)->addText(' Sayfa', $normalStyle,  array( 'spaceAfter' => 0 , 'spaceBefore' => 0));
$row->addCell(1000)->addPreserveText(' {PAGE}/{NUMPAGES}' ,$normalStyle, array( 'spaceAfter' => 0 , 'spaceBefore' => 0));


$contentStyle = array(
    'name' => 'Arial',
    'size' => 11
);
$section->addText(' ', $contentStyle, array('spaceBefore' => 500));


$footerTitleStyle = array(
    'bold' => true,
    'name' => 'Arial',
    'size' => 9
);

$footer = $section->addFooter();
$styleTable = array('borderSize' => 0, 'borderColor' => '999999');
$phpWord->addTableStyle('footerStyle', $styleTable);
$table = $footer->addTable('footerStyle');

$row = $table->addRow();
$row->addCell(3000)->addText('Hazırlayan', $footerTitleStyle,  array('align' => 'center', 'spaceAfter' => 0 , 'spaceBefore' => 0));
$row->addCell(3000)->addText('Sistem Onayı', $footerTitleStyle,  array('align' => 'center', 'spaceAfter' => 0 , 'spaceBefore' => 0));
$row->addCell(3000)->addText('Yürürlük Onayı', $footerTitleStyle,  array('align' => 'center', 'spaceAfter' => 0 , 'spaceBefore' => 0));

$row = $table->addRow();
$row->addCell(1000)->addText($hazirlayan, $normalStyle,  array('align' => 'center', 'spaceAfter' => 500, 'spaceBefore' => 0));
$row->addCell(1000)->addText($sistemOnayi, $normalStyle,  array('align' => 'center', 'spaceAfter' => 500, 'spaceBefore' => 0));
$row->addCell(1000)->addText($yururlukOnayi, $normalStyle,  array('align' => 'center', 'spaceAfter' => 500, 'spaceBefore' => 0));





//// Save File
//$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
//$objWriter->save('worddosyalari/asd.docx');



//echo sys_get_temp_dir();die();


$kayitYeri = __DIR__."/worddosyalari";
$fileName = "{$kayitYeri}/document.docx";

// recursively creates all required nested directories
if (!file_exists($kayitYeri)) {
    mkdir($kayitYeri, 0774, true);
}
else{
    echo "dosya var";
}



$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save($fileName);


header('Content-Description: File Transfer');
header('Content-Type: application/force-download');
header("Content-Disposition: attachment; filename=document.docx;");
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($fileName));
ob_clean();
flush();
readfile($fileName);
exit;




?>



