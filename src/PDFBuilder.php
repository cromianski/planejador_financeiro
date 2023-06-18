<?php

namespace PlanejadorFinanceiro;
use TCPDF;


class PDFBuilder
{

    private $response;

    public function build($htmlContent)
    {
        // Crie uma instância do TCPDF
        $pdf = new TCPDF();

        // Defina o conteúdo do PDF
        $pdf->SetHeaderData('', 0, '', '');
        $pdf->setFooterData('', 0, '', '');

        $pdf->AddPage();
        $pdf->writeHTML($htmlContent, true, false, true, false, '');

        // Gere o PDF em uma string
        $pdfContent = $pdf->Output('', 'S');

        // Converta o PDF para base64
        $pdfBase64 = base64_encode($pdfContent);

        $this->setResponse($pdfBase64);
    }

    public function getResponse()
    {
        return $this->response;
    }

    private function setResponse($response)
    {
        $this->response = $response;
    }
}
