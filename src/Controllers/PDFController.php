<?php

namespace PlanejadorFinanceiro\Controllers;

use PlanejadorFinanceiro\Services\PDFBuilder;

class PDFController
{
    public function buildAction(string $userName, string $pdfName, array $body)
    {
        $builder = new PDFBuilder();
        $builder->build($userName, $pdfName, $body);
        return $builder->getResponse();
    }
}
