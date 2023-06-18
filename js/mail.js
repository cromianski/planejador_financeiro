function sendMail(data) {
    return new Promise((resolve, reject) => {
        $.ajax({
          url: '/webservice/envia-email.php',
          type: 'POST',
          data,
          success: function(response) {
            resolve(response); // Resolve the promise with the PDF data
          },
          error: function(xhr, status, error) {
            reject(error); // Reject the promise with the error message
          }
        });
    });
}
