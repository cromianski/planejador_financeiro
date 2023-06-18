function buildPDF(dados) {
    return new Promise((resolve, reject) => {
        $.ajax({
          url: '/webservice/build-pdf.php',
          type: 'POST',
          data: dados,
          success: function(response) {
            resolve(response); // Resolve the promise with the PDF data
          },
          error: function(xhr, status, error) {
            reject(error); // Reject the promise with the error message
          }
        });
    });
}