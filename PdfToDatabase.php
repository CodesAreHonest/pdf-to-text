<?php

error_reporting(true);
require_once "vendor/autoload.php";
require_once "PdfParser.php";
require_once "Helper.php";

use Spatie\PdfToText\Pdf;

// 1. obtain pdf from storage.
$pdfFileName = 'PO-0100146424.pdf';
$pdfFileDirectory = getcwd() . "/" . $pdfFileName;
$pdfFileBaseName = basename($pdfFileDirectory);

// 2. convert pdf to text for `date`, `rtv`, `store ref no` and `shipped from`.
$text = Pdf::getText($pdfFileBaseName, null, ['layout']);

/** 3. date  */
$date = get_string_between($text, 'Date:', 'Page:');
// var_dump (trim($date));

/** 4. rtv */
$rtv = get_string_between($text, 'RTV Number.:', 'Store ref no:');
// var_dump ($rtv);

/** 5. store ref no:  */
$normal = Pdf::getText($pdfFileBaseName);
$storeRefNo = get_string_between($normal, 'Store ref no: ', 'Last invoice');
//var_dump(trim($storeRefNo));

/** 6. shipped from: */
$shippedFrom = get_string_between($normal, 'Shipped from:', 'Return To:');
//var_dump(trim($shippedFrom));

/** 7. Return to */
$returnTo = get_string_between($normal, 'Return To:', 'Attention:');
//var_dump(trim($returnTo));


// get table data
$html = Pdf::getText($pdfFileBaseName, null, ['htmlmeta']);
$parsed = get_string_between($html, 'No', 'Total');
$tableData = explode("\n\n", trim($parsed));


