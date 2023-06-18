function colors(type, from, to = 0) {
    let colors = {
        background: [
            'rgba(255, 99, 132, 0.5)',
            'rgba(54, 162, 235, 0.5)',
            'rgba(255, 206, 86, 0.5)',
            'rgba(75, 192, 192, 0.5)',
            'rgba(153, 102, 255, 0.5)',
            'rgba(255, 159, 64, 0.5)',
            'rgba(151, 245, 237, 0.5)',
        ],
        border: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(151, 245, 237, 1)',
        ]
    };
    return colors[type].slice(from, to);
}
function isObject(value) {
    return typeof value === 'object' && value !== null && !(value instanceof Node);
}

function fillSaldoFinal(){
    let status = document.getElementById('resultado_status');
    let saldo = document.getElementById('resultado_saldo');

    let valorSaldo = getSaldoFinal();

    saldo.textContent = `R$${valorSaldo}`;
    saldo.style.color =  (valorSaldo > 0) ? 'var(--success)' : 'var(--danger)';
    status.textContent = (valorSaldo > 0) ? 'POSITIVO' : 'NEGATIVO';
    status.style.color =  (valorSaldo > 0) ? 'var(--success)' : 'var(--danger)';
}
function fillMensagemInvestimento() {
    let mensagemField = document.querySelector('.analise_investimento_description');
    mensagemField.textContent = getMensagemInvestimento();
}

function getCharts() {
    return {
        gastosGerais: buildGastosGeraisChart(),
        gastosEspecificos: buildGastosEspecificos(),
        gastosRendas: buildRendasvsGastos(),
        gastosInvestimentos: buildGastosInvestimentos(),
    };
}

function destroyCharts() {
    document.querySelectorAll('canvas').forEach(chart => {
        let existingChart = Chart.getChart(chart);
        if (existingChart) {
            existingChart.destroy();
        }
    })
}
function buildCharts(charts = null)
{
    charts = charts ?? getCharts();
    Object.values(charts).forEach(chart => {
        if (!isObject(chart)) return;
        if(chart.type === 'charts') {
            buildCharts(chart)
        } else {
            new Chart(chart.canvas, {
                type: chart.type,
                data: chart.config,
                options: chart.options
            });
        }
    })
    
}

function buildGastosGeraisChart() {
    let gastosGerais = getGastosGerais();
    let labels = Object.keys(gastosGerais);
    return {
        canvas: document.getElementById('chart_gastosGerais'),
        type: 'doughnut',
        config: {
            labels: labels,
            datasets: [{
                data: Object.values(gastosGerais),
                backgroundColor: colors('background', 0, labels.length),
                borderColor: colors('border', 0, labels.length),
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'left'
                },
            }
        }
    }
}
function buildGastosEspecificos() {
    let gastosEspecificos = getGastosPorCategoria();

    let options = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: true,
                position: 'bottom'
            },
        },
        scales: {
            x: {
              stacked: true,
            },
            y: {
              stacked: true,
              beginAtZero: true,
            }
        }
    }

    let charts = {
        type: 'charts'
    };

    Object.entries(gastosEspecificos).forEach(([categoriaNome, categoria]) => {
        const subcategorias = Object.entries(categoria).filter(([key, value]) => {
            return isObject(value); // Filtrar todas as chaves exceto 'node'
        });

        const subcategoriaLabels = subcategorias.map(([key, subcategoria]) => subcategoria.label);

        const index = subcategoriaLabels.indexOf('Aluguel / financiamento habitacional');
        if (index !== -1) {
            subcategoriaLabels[index] = 'Aluguel';
        }
        const subcategoriaValores = subcategorias.map(([key, subcategoria]) => subcategoria.value);

        let chart = {
            canvas: categoria.node,
            type: 'bar',
            config: {
                labels: subcategoriaLabels,
                datasets: [{
                    label: 'R$',
                    data: subcategoriaValores,
                    backgroundColor: colors('background', 0, subcategoriaLabels.length),
                    borderColor: colors('border', 0, subcategoriaLabels.length),
                    borderWidth: 1,
                }]
            },
            options,
        }

        charts[categoriaNome] = chart;
    });

    return charts;
}
function buildRendasvsGastos() {
    let renda = getSomaRendas();
    let gastos = getSomaGastos();
    return {
        canvas: document.getElementById('chart_gastos_saldos'),
        type: 'bar',
        config: {
            labels: ['Gastos x Rendas'],
            datasets: [
                {
                    label: 'Rendas',
                    data: [renda],
                    backgroundColor: colors('background', 3, 4),
                    borderColor: colors('border', 3, 4),
                    borderWidth: 1
                },
                {
                    label: 'Gastos',
                    data: [gastos],
                    backgroundColor: colors('background', 0, 1),
                    borderColor: colors('border', 0, 1),
                    borderWidth: 1
                },
            ]
        },
        options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Rendas x Gastos'
              }
            }
        }
    }
}
function buildGastosInvestimentos() {
    let investimentos = getSomaInvestimentos();
    let gastos = getSomaGastos();
    return {
        canvas: document.getElementById('chart_investimentos'),
        type: 'bar',
        config: {
            labels: ['Investimentos x Gastos'],
            datasets: [
                {
                    label: 'Investimentos',
                    data: [investimentos],
                    backgroundColor: colors('background', 3, 4),
                    borderColor: colors('border', 3, 4),
                    borderWidth: 1
                },
                {
                    label: 'Gastos',
                    data: [gastos],
                    backgroundColor: colors('background', 0, 1),
                    borderColor: colors('border', 0, 1),
                    borderWidth: 1
                },
            ]
        },
        options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Rendas x Gastos'
              }
            }
        }
    }
}