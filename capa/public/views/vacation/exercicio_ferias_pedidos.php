<?php require '../../../init.php'; ?>

<?php if (verificaUsuarioLogado('exercicio_ferias_pedidos.php')) : ?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Portal Avanção - Exercício de Férias Lançados</title>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

        <link rel="stylesheet" href="<?php echo BASE_URL; ?>libs/normalize/css/normalize_7.0.0.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>libs/bootstrap/css/bootstrap_3.3.7.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />

        <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/fontes.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/home.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/sidebar.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/navbar.css">

        <!-- dispositivos com largura máxima de 769px (por exemplo tablets) -->
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/navbartablet.css" type="text/css" media="screen and (max-width: 769px)" />
        <!-- dispositivos com largura máxima de 450px (por exemplo smartphones) -->
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/navbarsmart.css" type="text/css" media="screen and (max-width:450px)" />

        <style>
            .erro {
                border: 2px solid red;
            }

            .table {
                margin-bottom: 0;
            }

            table thead tr th {
                font-size: 0.90em;
                text-align: left;
            }

            .table tbody tr td {
                line-height: 3em;
            }

            .table tbody tr td {
                font-size: 12px;
                vertical-align: middle;
            }

            .table {
                font-family: 'Lato Regular', sans-serif;
            }

            .swal-text {
                padding: 17px;
                display: block;
                margin: 22px;
                text-align: center;
                color: #61534e;
            }
        </style>
    </head>

    <body>

        <?php include ABS_PATH . 'inc/templates/navbar.php' ?>
        <?php include ABS_PATH . 'inc/templates/sidebar.php' ?>

        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <h2>Registro de Pedidos</h2>
                    <hr>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

                <div class="panel panel-info">
                    <!-- panel -->
                    <div class="panel-heading">
                        <div class="text-left">
                            <strong>Exercícios</strong>
                        </div>
                    </div>

                    <div class="panel-body">
                        <!-- panel-body -->
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th class="text-center">Supervisor</th>
                                    <th class="text-center">Situação</th>
                                    <th class="text-center">Colaborador</th>
                                    <th class="text-center">Exercício Inicial</th>
                                    <th class="text-center">Exercício Final</th>
                                    <th class="text-center">Data Limite</th>
                                    <th class="text-center">Registrado</th>
                                    <th class="text-center" width="192"></th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                            </tbody>
                        </table>
                    </div><!-- panel-body -->
                </div><!-- panel -->

                <input type="hidden" id="id" name="id" value="<?php echo $_SESSION['usuario']['id']; ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <!-- primeira coluna -->
                <div class="panel panel-info">
                    <!-- panel -->
                    <div class="panel-heading">
                        <div class="text-center">
                            <strong>Registro</strong>
                        </div>
                    </div>

                    <div class="panel-body">
                        <!-- panel-body -->
                        <div class="text-center">
                            <h1>
                                <strong id="ticket">
                                    <?php if (isset($_SESSION['ticket'])) : ?>
                                        <?php echo $_SESSION['ticket']; ?>
                                    <?php else : ?>
                                        0
                                    <?php endif; ?>
                                </strong>
                            </h1>
                        </div>
                    </div><!-- panel-body -->
                </div><!-- panel -->
            </div><!-- primeira coluna -->

            <div class="col-sm-6">
                <!-- segunda coluna -->
                <div class="panel panel-info">
                    <!-- panel -->
                    <div class="panel-heading">
                        <div class="text-left">
                            <strong>Pedido</strong>
                        </div>
                    </div>
                    <form>
                        <div class="panel-body">
                            <!-- panel-body -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="periodos">Períodos</label>
                                        <select class="form-control" id="periodos" disabled>
                                            <option value="0" selected>Lista de Períodos</option>
                                            <option id="periodo-1" value="1">
                                                1 Período de 30 Dias
                                            </option>
                                            <option id="periodo-2" value="2">
                                                2 Períodos de 15 Dias
                                            </option>
                                            <option id="periodo-3" value="3">
                                                1 Período de 16 Dias e 1 Período de 14 Dias
                                            </option>
                                            <option id="periodo-10" value="10">
                                                1 Período de 14 Dias e 1 Período de 16 Dias
                                            </option>
                                            <option id="periodo-4" value="4">
                                                1 Período de 21 Dias e 1 Período de 9 Dias
                                            </option>
                                            <option id="periodo-11" value="11">
                                                1 Período de 9 Dias e 1 Período de 21 Dias
                                            </option>
                                            <option id="periodo-5" value="5">
                                                1 Período de 22 Dias e 1 Período de 8 Dias
                                            </option>
                                            <option id="periodo-12" value="12">
                                                1 Período de 8 Dias e 1 Período de 22 Dias
                                            </option>
                                            <option id="periodo-7" value="7">
                                                1 Período de 23 Dias e 1 Período de 7 Dias
                                            </option>
                                            <option id="periodo-13" value="13">
                                                1 Período de 7 Dias e 1 Período de 23 Dias
                                            </option>
                                            <option id="periodo-8" value="8">
                                                1 Período de 16 Dias e 2 Períodos de 7 Dias
                                            </option>
                                            <option id="periodo-14" value="14">
                                                2 Períodos de 7 Dias e 1 Período de 16 Dias
                                            </option>
                                            <option id="periodo-9" value="9">
                                                1 Período de 14 Dias e 2 Períodos de 8 Dias
                                            </option>
                                            <option id="periodo-15" value="15">
                                                2 Períodos de 8 Dias e 1 Período de 14 Dias
                                            </option>
                                            <option id="periodo-16" value="16">
                                                1 Período de 7 Dias, 1 Período de 16 Dias e 1 Período de 7 Dias
                                            </option>
                                            <option id="periodo-17" value="17">
                                                1 Período de 8 Dias, 1 Período de 14 Dias e 1 Período de 8 Dias
                                            </option>
                                            <option class="hidden" id="periodo-6" value="6">
                                                1 Período de 15 Dias
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div id="bloco-periodos">
                                <!-- bloco períodos -->
                                <div class="row hidden" id="linha-1">
                                    <!-- bloco 01 -->
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="data-inicial-1">Período 1 - Data Inicial</label>
                                            <input class="form-control required" id="data-inicial-1" type="date" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="data-final-1">Período 1 - Data Final</label>
                                            <input class="form-control required" id="data-final-1" type="date" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="total-dias-1">Dias</label>
                                            <input class="form-control required" id="total-dias-1" type="text" value="0" readonly>
                                        </div>
                                    </div>
                                </div><!-- bloco 01 -->

                                <div class="row hidden" id="linha-2">
                                    <!-- bloco 02 -->
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="data-inicial-2">Período 2 - Data Inicial</label>
                                            <input class="form-control required" id="data-inicial-2" type="date" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="data-final-2">Período 2 - Data Final</label>
                                            <input class="form-control required" id="data-final-2" type="date" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="total-dias-2">Dias</label>
                                            <input class="form-control required" id="total-dias-2" type="text" value="0" readonly>
                                        </div>
                                    </div>
                                </div><!-- bloco 02 -->

                                <div class="row hidden" id="linha-3">
                                    <!-- bloco 03 -->
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="data-inicial-3">Período 3 - Data Inicial</label>
                                            <input class="form-control required" id="data-inicial-3" type="date" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="data-final-3">Período 3 - Data Final</label>
                                            <input class="form-control required" id="data-final-3" type="date" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="total-dias-3">Dias</label>
                                            <input class="form-control required" id="total-dias-3" type="text" value="0" readonly>
                                        </div>
                                    </div>
                                </div><!-- bloco 03 -->
                            </div><!-- bloco períodos -->

                            <div id="bloco-periodos-estagiarios">
                                <div class="row hidden" id="linha-4">
                                    <!-- bloco 04 -->
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="data-inicial-4">Período 1 - Data Inicial</label>
                                            <input class="form-control required" id="data-inicial-4" type="date" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label for="data-final-4">Período 1 - Data Final</label>
                                            <input class="form-control required" id="data-final-4" type="date" readonly>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="total-dias-4">Dias</label>
                                            <input class="form-control required" id="total-dias-4" type="text" value="0" readonly>
                                        </div>
                                    </div>
                                </div><!-- bloco 04 -->
                            </div>

                            <input class="form-control" id="id-exercicio" type="hidden"><!-- id do exercício -->
                            <input class="form-control" id="regime" type="hidden"><!-- tipo do regime -->
                            <input class="form-control" id="contrato" type="hidden"><!-- tipo do contrato -->

                            <input class="form-control" id="exercicio-inicial" type="hidden">
                            <input class="form-control" id="exercicio-final" type="hidden">
                            <input class="form-control" id="exercicio-vencimento" type="hidden">
                        </div><!-- panel-body -->
                </div><!-- panel -->

                <div class="row">
                    <div class="col-sm-3 col-sm-offset-6">
                        <div class="form-group">
                            <button class="btn btn-block btn-default btn-sm" type="reset">
                                <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                                Resetar
                            </button>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <button class="btn btn-block btn-success btn-sm" id="btn-gravar" type="button">
                                <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
                                Gravar
                            </button>
                        </div>
                    </div>
                </div>
            </div><!-- segunda coluna -->
        </div>

        </form>
        </div><!-- container -->
        </div><!-- conteúdo da página -->
        </div><!-- wrapper -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="<?php echo BASE_URL; ?>libs/bootstrap/js/bootstrap_3.3.7.min.js"></script>
        <script src="<?php echo BASE_URL; ?>libs/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

        <script src="<?php echo BASE_URL; ?>public/js/sidebar.js"></script>
        <script src="<?php echo BASE_URL; ?>public/js/outros.js"></script>
        <script src="<?php echo BASE_URL; ?>public/js/avancoins/colaboradores.js"></script>
        <script src="<?php echo BASE_URL; ?>public/js/vacation/dados_cadastrais.js"></script>
        <script src="<?php echo BASE_URL; ?>public/js/vacation/agendamento.js"></script>
        <script src="<?php echo BASE_URL; ?>public/js/vacation/datas.js"></script>
        <script src="<?php echo BASE_URL; ?>public/js/vacation/periodos.js"></script>
        <script src="<?php echo BASE_URL; ?>public/js/vacation/funcoes.js"></script>
        <script src="<?php echo BASE_URL; ?>public/js/vacation/pedidos.js"></script>
        <script src="<?php echo BASE_URL; ?>public/js/vacation/grava_pedido.js"></script>
    </body>

    </html>

<?php else : ?>

    <?php header('Location: ' . BASE_URL . '../capa/public/views/login/form_login.php'); ?>

<?php endif; ?>