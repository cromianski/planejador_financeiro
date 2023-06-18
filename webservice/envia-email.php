<?php

require '../bootstrap.php';

use PlanejadorFinanceiro\MailController;
use PlanejadorFinanceiro\PDFController;

if (empty($_POST)) {
    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
    die();
}

$userEmail = $_POST['userEmail'];
$userName = $_POST['userName'];
$attachmentName = $_POST['attachmentName'];
$htmlContent = $_POST['htmlContent'];;

$pdf = new PDFController();
$attachment = $pdf->buildAction($htmlContent);

$controller = new MailController();
$response = $controller->sendAction($userEmail, $userName, $attachment, $attachmentName);
echo $response;
?>
