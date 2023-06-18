function getStarted() {
    let bodyContent = `
    <div class="input-group">
        <label for="user_name">Nos diga o seu nome</label>
        <div class="input-name">
            <input id="user_name" type="text" class='input' placeholder="João da Silva">
        </div>
    </div>
    <span>
    Antes de iniciarmos, precisamos que você tenha em mãos suas contas e as faturas dos seus cartões de crédito junto, pois para uma boa análise
    é necessário verificar todos os gastos da sua fatura.<br/>
    <strong>Todas as informações inseridas não serão armazenadas em nossa base de dados e/ou visiveis para os administradores do site. 
    De acordo com a Lei Geral de Proteção de Dados (Lei nº 13.709/2018).</strong>
    </span>
    `;
    let data = {
        title: 'Antes de iniciarmos',
        header: '',
        body: bodyContent,
        footer: '',
        buttons: {
            fechar: {
                content: 'Fechar',
                action: () => closeModal(),
                classes: ['close'],
            },
            continuar: {
                content: 'Continuar',
                id: 'continue',
                action: () => {
                    let userName = $('#user_name').val();
                    if (! userName) {
                        alerta('Preencha o seu nome!');
                        return;
                    }
                    localStorage.setItem("userName", userName);
                    closeModal();
                    begin();
                },
                classes: ['disabled'],
            }
        },
        postScript: () => begginingModal()
    }
    openModal(data);
}
function begginingModal() {
    $('#user_name, #userEmail').on("change", function() {
        if($(this).val()) {
            $('#continue').removeClass('disabled');
        } else {
            $('#continue').addClass('disabled');
        }
    });
    let userName = localStorage.getItem("userName");
    if(userName) {
        $('#user_name').val(userName).trigger("change");
    }
}
function begin() {
    $('#side-menu').css({
        right: 0,
    });
    $('#pages_background').css({
        display: 'block',
        right: 0,
        zIndex: 2,
    });
    openPage(2);
    $('.money-input').mask('000.000.000,00', {reverse: true});
}
function beforeEnd() {
    let bodyContent = `
    <div class="input-group" style="height: 100%; justify-content: space-evenly;">
        <div class='checkbox_group'>
            <label for="wantMail">Deseja receber o resultado por e-mail? <i class='fa-regular fa-square' id='wantMail_trigger'></i></label>
            <input id="wantMail" type="checkbox" class='input hidden'>
        </div>
        <div class='mail_group hidden'>
            <label for="user_name">Nos diga o seu email</label>
            <div class="input-name">
                <input id="userEmail" type="email" class='input' placeholder="joaodasilva@gmail.com">
            </div>
        </div>
    </div>
    `;
    let data = {
        title: 'Antes de finalizarmos',
        header: '',
        body: bodyContent,
        footer: '',
        buttons: {
            fechar: {
                content: 'Fechar',
                action: () => closeModal(),
                classes: ['close'],
            },
            enviar: {
                content: 'Baixar PDF',
                id: 'send',
                action: () => {
                    sendButtonAction()
                },
            }
        },
        postScript: () => begginingModal()
    }
    openModal(data);
    $('#wantMail').change(function() {
        if ($(this).is(':checked')) {
            $('#wantMail_trigger').removeClass('fa-square').addClass('fa-square-check').addClass('checked');
            $('.mail_group').removeClass('hidden');
            $('#send').text('Enviar e-mail');
        } else {
            $('#wantMail_trigger').removeClass('fa-square-check').addClass('fa-square').removeClass('checked');
            $('.mail_group').addClass('hidden');
            $('#userEmail').val('');
            $('#send').text('Baixar PDF');
        }
        
      });
}
function end() {
    //console.log('end')
}
function isBase64(str) {
    // Base64 pattern matching
    var pattern = /^[A-Za-z0-9+/=]*$/;
  
    // Check if the input matches the base64 pattern
    return pattern.test(str);
  }
function loading(action) {
    if (action === 'start') {
        $('#loading').css({display: 'flex'});
    } else {
        $('#loading').hide();
    }
    
}
function sendButtonAction() {
    loading('start');
    const userEmail = $('#userEmail').val();
    const userName = localStorage.getItem("userName");
    const normalizedName = userName.normalize("NFD").toLowerCase();
    const formattedName = normalizedName.replace(/[\u0300-\u036f]/g, "").replace(/ /g, "_"); 
    const pdfName = `planejamento_financeiro_${formattedName}.pdf`;

    const pdfContent = {
        pdfName,
        userName,
        body: buildPDFBody(),
    }

    if ($('#wantMail').is(':checked')) {
        if (! userEmail) {
            alerta('Preencha o seu email!');
            loading('end');
            return;
        }
        sendMail({userEmail, userName, pdfContent})
            .then(function(response) {
                alert(response);
                loading('end');
            })
            .catch(function(error) {
                console.error(error);
        });
    } else {
        buildPDF(pdfContent)
            .then(function(pdf) {
                if(isBase64(pdf)) {
                    var link = document.createElement('a');
                    link.href = 'data:application/pdf;base64,' + pdf;
                    link.download = pdfName;
                    link.click();
                } else {
                    throw new Error('O retorno é inválido');
                }
            })
            .catch(function(error) {
                console.error(error);
            });
            loading('end');
    }
    closeModal();
    end();
}
function alerta($message) {
    $('#popover #popover_message').text($message);
    $('#popover').show();
    $('#popover').css({bottom: '10px'});

    setTimeout(function () {
        $('#popover').css({bottom: '-5rem'});
        $('#popover').hide();
    }, 4000);
}
document.addEventListener('keydown', function(event) {
    if (event.key === 'Tab') {
        // Prevent the default tab behavior
        event.preventDefault();
    }
});