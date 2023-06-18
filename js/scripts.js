function getStarted() {
    let bodyContent = `
    <div class="input-group">
        <label for="user_name">Nos diga o seu nome</label>
        <div class="input-name">
            <input id="user_name" type="text" class='input' placeholder="João da Silva">
        </div>
    </div>
    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id risus sit amet ante aliquam convallis. Sed sed quam gravida, volutpat nunc sit amet, ultricies nisl. Donec ullamcorper vitae dolor at rhoncus. Aliquam erat volutpat. Pellentesque ac neque scelerisque, convallis magna ut, sodales tortor. Suspendisse sollicitudin condimentum velit vel sagittis. Quisque auctor, magna ac vestibulum congue, massa risus egestas nulla, sed molestie purus nisl eget erat. Quisque posuere et quam sit amet tincidunt. Integer pharetra non risus ac tempor. Mauris eget tellus est. Ut sit amet metus in lorem elementum congue.</span>
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
                        alert('Preencha o seu nome!');
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
    <div class="input-group">
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
    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer id risus sit amet ante aliquam convallis. Sed sed quam gravida, volutpat nunc sit amet, ultricies nisl. Donec ullamcorper vitae dolor at rhoncus. Aliquam erat volutpat. Pellentesque ac neque scelerisque, convallis magna ut, sodales tortor. Suspendisse sollicitudin condimentum velit vel sagittis. Quisque auctor, magna ac vestibulum congue, massa risus egestas nulla, sed molestie purus nisl eget erat. Quisque posuere et quam sit amet tincidunt. Integer pharetra non risus ac tempor. Mauris eget tellus est. Ut sit amet metus in lorem elementum congue.</span>
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
                    loading('start');
                    const htmlContent = $('#page_10').html();
                    const userEmail = $('#userEmail').val();
                    const userName = localStorage.getItem("userName");
                    const normalizedName = userName.normalize("NFD").toLowerCase();
                    const formattedName = normalizedName.replace(/[\u0300-\u036f]/g, "").replace(/ /g, "_"); 
                    const pdfName = `planejamento_financeiro_${formattedName}.pdf`;

                    let images = getCanvasImages();

                    let pdfContant = {
                        images,
                        saldo,
                        
                    }
                
                    if ($('#wantMail').is(':checked')) {
                        if (! userEmail) {
                            alert('Preencha o seu email!');
                            loading('end');
                            return;
                        }
                        sendMail({userEmail, userName, pdfContant, attachmentName: pdfName})
                            .then(function(response) {
                                alert(response);
                                loading('end');
                            })
                            .catch(function(error) {
                                console.error(error);
                        });
                    } else {
                        buildPDF({htmlContent})
                            .then(function(pdf) {
                                var link = document.createElement('a');
                                link.href = 'data:application/pdf;base64,' + pdf;
                                link.download = pdfName;
                                link.click();
                                loading('end');
                            })
                            .catch(function(error) {
                                console.error(error);
                            });
                    }
                    closeModal();
                    end();
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
    console.log('end')
}

function loading(action) {
    console.log(action)
    if (action === 'start') {
        $('#loading').css({display: 'flex'});
        console.log($('#loading'));
    } else {
        $('#loading').hide();
    }
    
}