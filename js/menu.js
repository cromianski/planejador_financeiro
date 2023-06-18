function validateMenu(menuItem) {
    let pages = $(".menu-item").length;
    let completed  = $(".done").length;
    let menuPage10 = document.querySelector('.menu-item[page="10"] .icon');

    if(completed >= 7) {
        menuPage10.classList.remove('disabled');
    }
    if (menuItem === menuPage10) {
        if (completed >= pages - 1) {
            fillSaldoFinal();
            destroyCharts();
            buildCharts();
            fillMensagemInvestimento();
        } else {
            //notComplete()
            fillSaldoFinal();
            destroyCharts();
            buildCharts();
            fillMensagemInvestimento();
        }
    }
}
function getActiveTab(){
    return $('.active');
}
function notComplete() {
    //todo: implements modal
    throw new Error('Você não pode gerar o relatório sem concluir as etapas anteriores');
}