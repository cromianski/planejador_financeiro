<?php

require '../bootstrap.php';

use PlanejadorFinanceiro\PDFController;

if (empty($_POST)) {
    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
    die();
}

$htmlContent = $_POST['htmlContent'];

$controller = new PDFController();
$response = $controller->buildAction($htmlContent);
echo $response;
?>