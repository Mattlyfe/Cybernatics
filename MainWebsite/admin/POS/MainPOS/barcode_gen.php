<?php
require '../vendor1/autoload.php';
$code = $_GET['genCode'];
// This will output the barcode as HTML output to display in the browser
$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($code, $generator::TYPE_CODE_128)) . '">';?>
<p><?php echo $code?></p>