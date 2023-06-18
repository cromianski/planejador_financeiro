/**function fillInputs(){
    $('.pages').each(function(index, page) {
        let pageInputs = $(page).find('.input');
        pageInputs.each(function(index, input) {
            input.value = ((Math.random() * (999.99 - 1)) + 1).toFixed(2);
        });
    });
}**/
function getAllData(){
    let data = {};
    $('.pages').each(function(index, page) {
        let pageName = page.getAttribute('pageName');
        if(pageName) {
            data[pageName] = populateWithValues(page);
            let somaDosValores = Object.values(data[pageName]).reduce((total, data) => total + data.value, 0);
            data[pageName].total = parseFloat(somaDosValores.toFixed(2));
            if(pageName === 'Rendas') {
                data[pageName].type = 'renda';
            } else if (pageName === 'Investimentos') {
                data[pageName].type = 'investimentos'
            } else {
                data[pageName].type = 'gastos'
            }
        }
    })
    return data;
}
function populateWithValues(page) {
    let pageInputs = $(page).find('.input');
    let resultInputs = {};
    pageInputs.each(function(index, input) {
        let value = 0;
        if(input.value){
            value = parseFloat(input.value.replace(/\./g, '').replace(',', '.'));
        }
        let label = document.querySelector(`label[for='${input.id}']`).textContent;
        resultInputs[input.id] = {label, value};
    })
    return resultInputs;
}
function getGastosGerais() {
    let data = getAllData();
    let gastosGerais = {};
    Object.entries(data).forEach(([categoria, dados]) => {
        if(dados.type === 'gastos') {
            gastosGerais[categoria] = dados.total;
        }
    })
    return gastosGerais;
}
function getGastosPorCategoria() {
    let data = getAllData();
    let gastosEspecificos = {}
    let canvasNodes = {
        'Habitação': document.getElementById('chart_gastosEspecificos_moradia'),
        'Alimentação': document.getElementById('chart_gastosEspecificos_alimentacao'),
        'Transporte': document.getElementById('chart_gastosEspecificos_transporte'),
        'Educação': document.getElementById('chart_gastosEspecificos_educacao'),
        'Saúde': document.getElementById('chart_gastosEspecificos_saude'),
        'Despesas Extras': document.getElementById('chart_gastosEspecificos_extras'),
    }
    Object.entries(data).forEach(([categoria, dados]) => {
        if(dados.type === 'gastos') {
            dados.node = canvasNodes[categoria];
            gastosEspecificos[categoria] = dados;
        }
    })
    return gastosEspecificos
}
function getSomaRendas() {
    let data = getAllData();
    const somaRendas = Object.values(data)
        .filter(item => item.type === 'renda')
        .reduce((acc, item) => acc + item.total, 0);
    return somaRendas;
}
function getSomaGastos() {
    let data = getAllData();
    const somaGastos = Object.values(data)
        .filter(item => item.type === 'gastos')
        .reduce((acc, item) => acc + item.total, 0);
    return somaGastos;
}
function getSomaInvestimentos() {
    let data = getAllData();
    const somaInvestimentos = Object.values(data)
        .filter(item => item.type === 'investimentos')
        .reduce((acc, item) => acc + item.total, 0);
    return somaInvestimentos;
}
function getSaldoFinal() {
    const somaRendas = getSomaRendas();
    const somaGastos = getSomaGastos();
    return (somaRendas - somaGastos).toFixed(2);;
}
function getMensagemInvestimento() {
    let saldo = getSaldoFinal();
    if (saldo > 1000) {
        return `
        Com este restante (R$ ${saldo}) você pode investir 50% (R$${saldo * 0.5}) em renda variável (ações, fundos de investimentos...).
        Disponíveis em corretoras de investimentos. O restante (R$${saldo * 0.5}), você pode fazer todo o investimento em renda fixa (LCI, LCA, SELIC, CDBs, RDCs...).
        Estes investimentos estão disponíveis em bancos, cooperativas de crédito e corretoras de investimentos.
        `;
    }
    if (saldo > 500) {
        return `
        Com este restante (R$ ${saldo}) você pode investir 30% (R$${saldo * 0.3}) em renda variável (ações, fundos de investimentos...).
        Disponíveis em corretoras de investimentos. O restante (R$${saldo * 0.7}), você pode fazer todo o investimento em renda fixa (LCI, LCA, SELIC, CDBs, RDCs...).
        Estes investimentos estão disponíveis em bancos, cooperativas de crédito e corretoras de investimentos.
        `;
    }
    if (saldo > 0) {
        return `
        Com este restante (R$ ${saldo}), você pode fazer todo o investimento em renda fixa (LCI, LCA, SELIC, CDBs, RDCs...).
        Estes investimentos estão disponíveis em bancos, cooperativas de crédito e corretoras de investimentos.
        `;
    }
    if (saldo <= 0) {
        let saldoInvestimento = getSomaInvestimentos();
        let newSaldo = saldo + saldoInvestimento;
        if (newSaldo >= 0) {
            return `Você está com saldo negativo neste mês! Uma opção é pegar o valor investido (R$${saldoInvestimento}) e quitar suas dívidas.`;
        }
        return `Você está com saldo negativo neste mês! Não é possível realizar investimentos. Para quitar suas dívidas, recomendamos solicitar um empréstimo bancário.`;
    }
}
function getCanvasNodes() {
    let canvasList = {
        gastosGerais: document.getElementById("chart_gastosGerais"),
        habitacao: document.getElementById("chart_gastosEspecificos_moradia"),
        alimentacao: document.getElementById("chart_gastosEspecificos_alimentacao"),
        transporte: document.getElementById("chart_gastosEspecificos_transporte"),
        educacao: document.getElementById("chart_gastosEspecificos_educacao"),
        saude: document.getElementById("chart_gastosEspecificos_saude"),
        gastosExtras: document.getElementById("chart_gastosEspecificos_extras"),
        rendasGastos: document.getElementById("chart_gastos_saldos"),
        investimentosGastos: document.getElementById("chart_investimentos")
    };
    return canvasList;
}
function generateImages() {
    let canvas = getCanvasNodes();
    let images = {
        gastosGerais: '',
        habitacao: '',
        alimentacao: '',
        transporte: '',
        educacao: '',
        saude: '',
        gastosExtras: '',
        rendasGastos: '',
        investimentosGastos: ''
    };
    Object.entries(canvas).forEach(([chart, node]) => {;
        images[chart] = node.toDataURL('image/jpeg');
    });

    return images;
}