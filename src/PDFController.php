<?php

namespace PlanejadorFinanceiro;

use PlanejadorFinanceiro\PDFBuilder;

class PDFController
{
    public function buildAction($htmlContent)
    {
        $builder = new PDFBuilder();
        $builder->build($htmlContent);
        return $builder->getResponse();
    }
}
