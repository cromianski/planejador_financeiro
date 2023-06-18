<?php

require '../bootstrap.php';

use PlanejadorFinanceiro\Controllers\PDFController;

if (empty($_POST)) {
    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
    die();
}

$userName = $_POST['userName'];
$pdfName = $_POST['pdfName'];
$body = $_POST['body'];

$controller = new PDFController();
$response = $controller->buildAction($userName, $pdfName, $body);
echo $response;
?>