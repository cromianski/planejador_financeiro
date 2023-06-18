function openModal(data) {
    let modalBackground = document.createElement('div');
    let modal = document.createElement('div');
    let modalHeader = document.createElement('div');
    let modalBody = document.createElement('div');
    let modalFooter = document.createElement('div');
    let modalClose = document.createElement('div');
    let modalTitle = document.createElement('div');

    modalBackground.classList.add('modal_background');

    modal.classList.add('modal');

    modalHeader.classList.add('modal_header');

    modalBody.classList.add('modal_body');
    $(modalBody).append(data.body);

    modalFooter.classList.add('modal_footer');

    modalTitle.classList.add('modal_title');
    modalTitle.textContent = data.title;

    let buttons = Object.values(data.buttons);
    buttons.forEach(button => {
        let modalButton = document.createElement('a');
        modalButton.classList.add('modal_button');
        if(button.id) {
            modalButton.id = button.id;
        }
        if (button.classes) {
            button.classes.forEach(classe => {
                modalButton.classList.add(classe);
            })
        }
        modalButton.textContent = button.content;
        modalButton.addEventListener('click', button.action);
        modalFooter.appendChild(modalButton);
    })
    
    modalClose.classList.add('modal_close');
    let closeButton = document.createElement('a');
    closeButton.addEventListener('click', () => closeModal())
    let closeIcon = document.createElement('i');
    closeIcon.classList.add('fa', 'fa-times');
    closeButton.appendChild(closeIcon);
    modalClose.appendChild(closeButton);

    modalHeader.appendChild(modalTitle);
    modalHeader.appendChild(modalClose);
    modal.appendChild(modalHeader);
    modal.appendChild(modalBody);
    modal.appendChild(modalFooter);
    modalBackground.appendChild(modal);

    document.body.appendChild(modalBackground);

    data.postScript();

    setTimeout(()=>{
        modalBackground.style.opacity = '1';
        modal.style.height = '75%';
        modal.style.width = '75%';
    }, 200);
}
function closeModal() {
    let modalBackground = document.querySelector('.modal_background');
    let modal = document.querySelector('.modal');
    $(modal).children().css({display: 'none'});

    modalBackground.style.opacity = 0;
    modal.style.height = 0;
    modal.style.width = 0;

    setTimeout(()=>{
        modalBackground.remove();
    }, 200);
}
