<?php

require '../bootstrap.php';

use PlanejadorFinanceiro\Controllers\MailController;
use PlanejadorFinanceiro\Controllers\PDFController;

if (empty($_POST)) {
    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
    die();
}

$userEmail = $_POST['userEmail'];
$userName = $_POST['userName'];
$pdfContent = $_POST['pdfContent'];
$attachmentName = $pdfContent['pdfName'];

$pdf = new PDFController();
$attachment = $pdf->buildAction($userName, $attachmentName, $pdfContent['body']);

$controller = new MailController();

$response = $controller->sendAction($userEmail, $userName, $attachment, $attachmentName);
echo $response;
?>
