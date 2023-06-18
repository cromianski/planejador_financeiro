<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <title>Planejador Finaceiro</title>
    <link rel="icon" href="assets/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QBB2NKFKE7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-QBB2NKFKE7');
    </script>
  </head>   
  <body>

    <!-- Menu page -->
    <div id='page_1' pageName="Menu">   
        <div class="title_container">
            <span class="text-light">Planejador Financeiro</span>
        </div>
        <div class="button_container">
            <a class="button" onclick="getStarted()">Saiba mais sobre suas finanças</a>
        </div>
    </div>

    <!-- Hidden pages -->
    <div id="pages_background" class="pages"></div>

    <div id="side-menu">
        <div id="side-menu-container">
            <div class="menu-item active" page="2">
                <a class='icon' onclick="changePage(this)" title="Rendas"><i class="fa-solid fa-sack-dollar"></i></a>
            </div>
            <div class="menu-item" page="3">
                <a class='icon' onclick="changePage(this)" title="Investimentos"><i class="fa-solid fa-chart-line"></i></a>
            </div>
            <div class="menu-item" page="4">
                <a class='icon' onclick="changePage(this)" title="Moradia"><i class="fa-solid fa-house"></i></a>
            </div>
            <div class="menu-item" page="5">
                <a class='icon' onclick="changePage(this)" title="Alimentação"><i class="fa-solid fa-drumstick-bite"></i></a>
            </div>
            <div class="menu-item" page="6">
                <a class='icon' onclick="changePage(this)" title="Transporte"><i class="fa-solid fa-car-side"></i></a>
            </div>
            <div class="menu-item" page="7">
                <a class='icon' onclick="changePage(this)" title="Educação"><i class="fa-solid fa-graduation-cap"></i></a>
            </div>
            <div class="menu-item" page="8">
                <a class='icon' onclick="changePage(this)" title="Saúde e Beleza"><i class="fa-solid fa-stethoscope"></i></a>
            </div>
            <div class="menu-item" page="9">
                <a class='icon' onclick="changePage(this)" title="Despesas Extras"><i class="fa-solid fa-piggy-bank"></i></a>
            </div>
            <div class="menu-item" page="10">
                <a class='icon disabled' onclick="changePage(this)" title="Resultado Financeiro"><i class="fa-solid fa-file-invoice-dollar"></i></a>
            </div>
        </div>
    </div>

    <div id='page_2' class="pages" pageName="Rendas">
        <div class="title_container">
            <span>Rendas</span>
        </div>
        <div class="input_container">
            <div class="input-group">
                <label for="rendas_fixa">Renda fixa mensal</label>
                <div class="tip" helpTo="rendas_fixa">
                    <span>Salário, pró-labore, aluguel, etc.</span>
                </div>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="rendas_fixa" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
            <div class="input-group">
                <label for="rendas_variavel">Renda variável mensal</label>
                <div class="tip" helpTo="rendas_variavel">
                    <span>Freelance, lucros e dividendos, etc.</span>
                </div>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="rendas_variavel" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
        </div>
        <div class="button_container">
            <a class="button" onclick="previous()">
                <i class="fa-solid fa-arrow-left">&nbsp;</i>&nbsp;&nbsp;Menu
            </a>
            <a class="button" onclick="next()">
                Avançar&nbsp;&nbsp;<i class="fa-solid fa-arrow-right">&nbsp;</i>
            </a>
        </div>
    </div>

    <div id='page_3' class="pages" pageName="Investimentos">
        <div class="title_container">
            <span>Investimentos</span>
        </div>
        <div class="input_container">
            <div class="input-group">
                <label for="investimentos_rendaFixa">Valor aplicado em renda fixa</label>
                <div class="tip" helpTo="investimentos_rendaFixa">
                    <span>selic, CDB, RDC, etc.</span>
                </div>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="investimentos_rendaFixa" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
            <div class="input-group">
                <label for="investimentos_rendaVariavel">Valor aplicado em renda variável</label>
                <div class="tip" helpTo="investimentos_rendaVariavel">
                    <span>Ações, fundos, FIIs, etc.</span>
                </div>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="investimentos_rendaVariavel" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
        </div>
        <div class="button_container">
            <a class="button" onclick="previous()">
                <i class="fa-solid fa-arrow-left">&nbsp;</i>&nbsp;&nbsp;Voltar
            </a>
            <a class="button" onclick="next()">
                Avançar&nbsp;&nbsp;<i class="fa-solid fa-arrow-right">&nbsp;</i>
            </a>
        </div>
    </div>

    <div id='page_4' class="pages" pageName="Habitação">
        <div class="title_container">
            <span>Moradia</span>
        </div>
        <div class="input_container">
            <div class="input-group">
                <label for="moradia_aluguel">Aluguel / financiamento habitacional</label>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="moradia_aluguel" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
            <div class="input-group">
                <label for="moradia_iptu">IPTU / Condominio</label>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="moradia_iptu" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
            <div class="input-group">
                <label for="moradia_agua">Água</label>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="moradia_agua" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
            <div class="input-group">
                <label for="moradia_luz">Luz</label>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="moradia_luz" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
            <div class="input-group">
                <label for="moradia_internet">Internet</label>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="moradia_internet" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
            <div class="input-group">
                <label for="moradia_telefone">Telefone</label>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="moradia_telefone" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
            <div class="input-group">
                <label for="moradia_outros">Outros gastos habitacionais</label>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="moradia_outros" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
        </div>
        <div class="button_container">
            <a class="button" onclick="previous()">
                <i class="fa-solid fa-arrow-left">&nbsp;</i>&nbsp;&nbsp;Voltar
            </a>
            <a class="button" onclick="next()">
                Avançar&nbsp;&nbsp;<i class="fa-solid fa-arrow-right">&nbsp;</i>
            </a>
        </div>
    </div>

    <div id='page_5' class="pages" pageName="Alimentação">
        <div class="title_container">
            <span>Alimentação</span>
        </div>
        <div class="input_container">
            <div class="input-group">
                <label for="alimentacao_mercado">Mercado / padaria</label>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="alimentacao_mercado" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
            <div class="input-group">
                <label for="alimentacao_restaurantes">Restaurantes</label>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="alimentacao_restaurantes" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
            <div class="input-group">
                <label for="alimentacao_delivery">Delivery</label>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="alimentacao_delivery" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
            <div class="input-group">
                <label for="alimentacao_outros">Outros gastos com alimentação</label>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="alimentacao_outros" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
        </div>
        <div class="button_container">
            <a class="button" onclick="previous()">
                <i class="fa-solid fa-arrow-left">&nbsp;</i>&nbsp;&nbsp;Voltar
            </a>
            <a class="button" onclick="next()">
                Avançar&nbsp;&nbsp;<i class="fa-solid fa-arrow-right">&nbsp;</i>
            </a>
        </div>
    </div>

    <div id='page_6' class="pages" pageName="Transporte">
        <div class="title_container">
            <span>Transporte</span>
        </div>
        <div class="input_container">
            <div class="input-group">
                <label for="transporte_manutencao">Manutenção do veículo</label>
                <div class="tip" helpTo="transporte_manutencao">
                    <span>Carro, moto, etc.</span>
                </div>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="transporte_manutencao" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
            <div class="input-group">
                <label for="transporte_ipva">IPVA</label>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="transporte_ipva" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
            <div class="input-group">
                <label for="transporte_seguro">Seguro veicular</label>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="transporte_seguro" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
            <div class="input-group">
                <label for="transporte_gasolina">Gasolina</label>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="transporte_gasolina" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
            <div class="input-group">
                <label for="transporte_publico">Transporte público</label>
                <div class="tip" helpTo="transporte_publico">
                    <span>Ônibus, metrô, etc.</span>
                </div>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="transporte_publico" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
            <div class="input-group">
                <label for="transporte_aplicativos">Aplicativos de transporte</label>
                <div class="tip" helpTo="transporte_aplicativos">
                    <span>Uber, 99, táxi, etc.</span>
                </div>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="transporte_aplicativos" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
        </div>
        <div class="button_container">
            <a class="button" onclick="previous()">
                <i class="fa-solid fa-arrow-left">&nbsp;</i>&nbsp;&nbsp;Voltar
            </a>
            <a class="button" onclick="next()">
                Avançar&nbsp;&nbsp;<i class="fa-solid fa-arrow-right">&nbsp;</i>
            </a>
        </div>
    </div>

    <div id='page_7' class="pages" pageName="Educação">
        <div class="title_container">
            <span>Educação</span>
        </div>
        <div class="input_container">
            <div class="input-group">
                <label for="educacao_mensalidade">Mensalidade</label>
                <div class="tip" helpTo="educacao_mensalidade">
                    <span>Faculdade, escola, etc.</span>
                </div>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="educacao_mensalidade" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
            <div class="input-group">
                <label for="educacao_material">Material escolar</label>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="educacao_material" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
            <div class="input-group">
                <label for="educacao_cursos">Cursos</label>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="educacao_cursos" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
            <div class="input-group">
                <label for="educacao_outros">Outros gastos com educação</label>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="educacao_outros" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
        </div>
        <div class="button_container">
            <a class="button" onclick="previous()">
                <i class="fa-solid fa-arrow-left">&nbsp;</i>&nbsp;&nbsp;Voltar
            </a>
            <a class="button" onclick="next()">
                Avançar&nbsp;&nbsp;<i class="fa-solid fa-arrow-right">&nbsp;</i>
            </a>
        </div>
    </div>

    <div id='page_8' class="pages" pageName="Saúde">
        <div class="title_container">
            <span>Saúde e Beleza</span>
        </div>
        <div class="input_container">
            <div class="input-group">
                <label for="saude_plano">Plano de saúde</label>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="saude_plano" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
            <div class="input-group">
                <label for="saude_medicamentos">Medicamentos</label>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="saude_medicamentos" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
            <div class="input-group">
                <label for="saude_consultas">Consultas médicas</label>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="saude_consultas" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
            <div class="input-group">
                <label for="saude_academia">Academia</label>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="saude_academia" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
            <div class="input-group">
                <label for="saude_salao">Salão de beleza / barbearia</label>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="saude_salao" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
            <div class="input-group">
                <label for="saude_outros">Outros gastos de saúde e beleza</label>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="saude_outros" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
        </div>
        <div class="button_container">
            <a class="button" onclick="previous()">
                <i class="fa-solid fa-arrow-left">&nbsp;</i>&nbsp;&nbsp;Voltar
            </a>
            <a class="button" onclick="next()">
                Avançar&nbsp;&nbsp;<i class="fa-solid fa-arrow-right">&nbsp;</i>
            </a>
        </div>
    </div>

    <div id='page_9' class="pages" pageName="Despesas Extras">
        <div class="title_container">
            <span>Despesas Extras</span>
        </div>
        <div class="input_container">
            <div class="input-group">
                <label for="extras_emprestimos">Empréstimos</label>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="extras_emprestimos" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
            <div class="input-group">
                <label for="extras_festas">Festas / bares</label>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="extras_festas" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
            <div class="input-group">
                <label for="extras_cinema">Cinema / shows</label>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="extras_cinema" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
            <div class="input-group">
                <label for="extras_viagens">Viagens</label>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="extras_viagens" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
            <div class="input-group">
                <label for="extras_vestuario">Vestuário</label>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="extras_vestuario" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
            <div class="input-group">
                <label for="extras_pets">Cuidados com animais de estimação</label>
                <div class="tip" helpTo="extras_pets">
                    <span>Veterinário, medicamentos, petshop, etc.</span>
                </div>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="extras_pets" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
            <div class="input-group">
                <label for="extras_outros">Outras despesas</label>
                <div class="input-currency">
                    <span class="currency">R$</span>
                    <input id="extras_outros" type="text" class='input money-input' placeholder="1.000,00">
                </div>
            </div>
        </div>
        <div class="button_container">
            <a class="button" onclick="previous()">
                <i class="fa-solid fa-arrow-left">&nbsp;</i>&nbsp;&nbsp;Voltar
            </a>
            <a class="button" onclick="next()">
                Avançar&nbsp;&nbsp;<i class="fa-solid fa-arrow-right">&nbsp;</i>
            </a>
        </div>
    </div>

    <div id='page_10' class="pages">

        <div class="title_container">
            <span>Resultado Financeiro</span>
        </div>
        <div class='charts_container'>
            <div class='resultado'>
                <div class='resultado_title'>
                    <span>Seu saldo está</span>
                    <span id='resultado_status'></span>
                </div>
                <span id='resultado_saldo'></span>
            </div>
            <div class="chart">
                <span class='chart_title'>Gastos Gerais</span>
                <span class='chart_description'>Visão geral do total de gastos de cada categoria</span>
                <canvas id="chart_gastosGerais"></canvas>
            </div>
            <div class="chart">
                <span class='chart_title'>Gastos Específicos</span>
                <span class='chart_description'>Visão geral dos gastos específicos de cada categoria</span>
                <div class='charts_slider'>
                    <a class='slider_previous disabled' onclick="changeSlides('previous')">
                        <i class='fa fa-angle-left'></i>
                    </a>
                    <a class='slider_next' onclick="changeSlides('next')"><i class='fa fa-angle-right'></i></a>
                    <div class='slider active_slider' pos='1'>
                        <span class='slider_title'>Habitação</span>
                        <canvas id="chart_gastosEspecificos_moradia"></canvas>
                    </div>
                    <div class='slider' pos='2'>
                        <span class='slider_title'>Alimentação</span>
                        <canvas id="chart_gastosEspecificos_alimentacao"></canvas>
                    </div>
                    <div class='slider' pos='3'>
                        <span class='slider_title'>Transporte</span>
                        <canvas id="chart_gastosEspecificos_transporte"></canvas>
                    </div>
                    <div class='slider' pos='4'>
                        <span class='slider_title'>Educação</span>
                        <canvas id="chart_gastosEspecificos_educacao"></canvas>
                    </div>
                    <div class='slider' pos='5'>
                        <span class='slider_title'>Saúde</span>
                        <canvas id="chart_gastosEspecificos_saude"></canvas>
                    </div>
                    <div class='slider' pos='6'>
                        <span class='slider_title'>Gastos Extras</span>
                        <canvas id="chart_gastosEspecificos_extras"></canvas>
                    </div>
                </div>
                
            </div>
            <div class="chart">
                <span class='chart_title'>Rendas x Gastos</span>
                <span class='chart_description'>Relação do total de rendas com o total de gastos informados</span>
                <canvas id="chart_gastos_saldos"></canvas>
            </div>
            <div class="chart">
                <span class='chart_title'>Investimentos x Gastos</span>
                <span class='chart_description'>Relação do total de investimentos aplicados com os gastos informados neste mês</span>
                <canvas id="chart_investimentos"></canvas>
            </div>   
            <div class='analise_investimento'>
                <span class='analise_investimento_title'>Análise de investimentos</span>
                <span class='analise_investimento_description'></span>
            </div>
        </div>
        <div class="button_container">
            <a class="button" onclick="previous()">
                <i class="fa-solid fa-arrow-left">&nbsp;</i>&nbsp;&nbsp;Voltar
            </a>
            <a class="button" onclick="beforeEnd()">
                Finalizar&nbsp;&nbsp;<i class="fa-solid fa-check">&nbsp;</i>
            </a>
        </div>
    </div>

    <div id='loading'>
        <i class='fa-solid fa-spinner'></i>
    </div>
    
    <script src="https://kit.fontawesome.com/f286ff8020.js" crossorigin="anonymous"></script>

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="node_modules/chart.js/dist/chart.min.js"></script>

    <script src="js/scripts.js"></script>
    <script src="js/pages.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/modal.js"></script>
    <script src="js/buttons.js"></script>
    <script src="js/data.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/slider.js"></script>
    <script src="js/pdf.js"></script>
    <script src="js/mail.js"></script>

    <script>
        fillInputs();
    </script>
</body>
</html>