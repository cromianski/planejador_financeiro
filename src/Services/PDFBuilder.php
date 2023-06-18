<?php

namespace PlanejadorFinanceiro\Services;
use TCPDF;


class PDFBuilder
{

    private $response;

    public function build(string $userName, string $pdfName, array $body)
    {
         // Crie uma instância do TCPDF
         $pdf = new TCPDF();

         // Defina o conteúdo do PDF
         $pdf->SetHeaderData('', 0, '', '');
         $pdf->setFooterData('', 0, '', '');
 
         $pdf->AddPage();
        
         $html = $this->buildBodyHTML($userName, $body);
        $pdf->writeHtml($html);
         // Gere o PDF em uma string
         $pdfContent = $pdf->Output($pdfName, 'S');
 
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

    private function buildBodyHTML($userName, $body) {
        $color = ($body['saldoStatus'] === 'POSITIVO') ? '#42ba96' : '#df4759';
        $bodyHTML = '
            <p style="text-align:center;">
                <span style="color:#c4455a;"><strong>Planejamento Financeiro</strong></span>
            </p>
            <p style="text-align:center;">
                <span style="color:#222222;"><strong>' . $userName . '</strong></span>
            </p>
            <figure class="table" style="float:left;width:100%;">
                <table class="ck-table-resized">
                    <colgroup><col style="width:51.04%;"><col style="width:48.96%;"></colgroup>
                    <tbody>
                        <tr>
                            <td style="padding:5pt;vertical-align:top;">
                                <p style="text-align:center;">
                                    <span style="color:#222222;">SEU SALDO ATUAL ESTÁ&nbsp;</span>
                                </p>
                                <p style="text-align:center;">
                                    <span style="color'.$color.';"><strong>' . $body["saldoStatus"] . '</strong></span>
                                </p>
                            </td>
                            <td style="background-color:#efefef;padding:5pt;vertical-align:top;">
                                <h2 style="text-align:center;">
                                    <span style="color:'.$color.';"><strong>R$' . $body["saldo"] . '</strong></span>
                                </h2>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </figure>
            <p>
                &nbsp;
            </p>
            <figure class="table" style="float:left;width:100%;">
                <table class="ck-table-resized">
                    <colgroup><col style="width:50.63%;"><col style="width:49.37%;"></colgroup>
                    <tbody>
                        <tr>
                            <td style="padding:5pt;">
                                <p style="text-align:center;">
                                    <span style="color:#933242;"><strong>GASTOS GERAIS</strong></span>
                                </p>
                            </td>
                            <td style="padding:5pt;">
                                <p style="text-align:center;">
                                    <span style="color:#933242;"><strong>GASTOS ESPECÍFICOS</strong></span>
                                </p>
                                <p style="text-align:center;">
                                    <span style="color:#e6576e;"><strong>HABITAÇÃO</strong></span>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:5pt;">
                                <img src="' . $body["images"]["gastosGerais"] . '"/>
                            </td>
                            <td style="padding:5pt;">
                                <img src="' . $body["images"]["habitacao"] . '" />
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:5pt;">
                                <p style="text-align:center;">
                                    <span style="color:#933242;"><strong>GASTOS ESPECÍFICOS</strong></span>
                                </p>
                                <p style="text-align:center;">
                                    <span style="color:#e6576e;"><strong>ALIMENTAÇÃO</strong></span>
                                </p>
                            </td>
                            <td style="padding:5pt;">
                                <p style="text-align:center;">
                                    <span style="color:#933242;"><strong>GASTOS ESPECÍFICOS</strong></span>
                                </p>
                                <p style="text-align:center;">
                                    <span style="color:#e6576e;"><strong>TRANSPORTE</strong></span>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:5pt;">
                                <img src="' . $body["images"]["alimentacao"] . '"/>
                            </td>
                            <td style="padding:5pt;">
                                <img src="' . $body["images"]["transporte"] . '"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:5pt;">
                                <p style="text-align:center;">
                                    <span style="color:#933242;"><strong>GASTOS ESPECÍFICOS</strong></span>
                                </p>
                                <p style="text-align:center;">
                                    <span style="color:#e6576e;"><strong>EDUCAÇÃO</strong></span>
                                </p>
                            </td>
                            <td style="padding:5pt;">
                                <p style="text-align:center;">
                                    <span style="color:#933242;"><strong>GASTOS ESPECÍFICOS</strong></span>
                                </p>
                                <p style="text-align:center;">
                                    <span style="color:#e6576e;"><strong>SAÚDE</strong></span>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:5pt;">
                                <img src="' . $body["images"]["educacao"] . '"/>
                            </td>
                            <td style="padding:5pt;">
                                <img src="' . $body["images"]["saude"] . '"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:5pt;">
                                <p style="text-align:center;">
                                    <span style="color:#933242;"><strong>GASTOS ESPECÍFICOS</strong></span>
                                </p>
                                <p style="text-align:center;">
                                    <span style="color:#e6576e;"><strong>GASTOS EXTRAS</strong></span>
                                </p>
                            </td>
                            <td style="padding:5pt;">
                                <p style="text-align:center;">
                                    <span style="color:#933242;"><strong>RENDAS E GASTOS</strong></span>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:5pt;">
                                <img src=" ' . $body["images"]["gastosExtras"] . '"/>
                            </td>
                            <td style="padding:5pt;">
                                <img src="' . $body["images"]["rendasGastos"] . '"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:5pt;" colspan="2">
                                <p style="text-align:center;">
                                    <span style="color:#933242;"><strong>INVESTIMENTOS E GASTOS</strong></span>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:5pt;" colspan="2">
                                <img src="' . $body["images"]["investimentosGastos"] . '"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:5pt;" colspan="2">
                                <p style="text-align:center;">
                                    <span style="color:#933242;"><strong>ANÁLISE DE INVESTIMENTOS</strong></span>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:5pt;" colspan="2">
                                <p style="text-align:center;">
                                    <span style="color:#222222;">' . $body["analiseResultado"] . '.</span>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </figure>
            <p>
                &nbsp;
            </p>
        ';
        return $bodyHTML;
    }
}
