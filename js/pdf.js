function buildPDF(pdfContent) {
    return new Promise((resolve, reject) => {
        $.ajax({
          url: '/webservice/build-pdf.php',
          type: 'POST',
          data: pdfContent,
          success: function(response) {
            resolve(response);
          },
          error: function(xhr, status, error) {
            reject(error);
          }
        });
    });
}
function buildPDFBody() {
  return {
    saldoStatus: (getSaldoFinal > 0) ? 'POSITIVO' : 'NEGATIVO', 
    analiseResultado: document.querySelector('.analise_investimento_description').textContent,
    images: generateImages(),
    saldo: getSaldoFinal(),
  }
}