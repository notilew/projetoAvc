// retorna o dia do mês sem o 0
function retornaDiaSemZero(tmp) {
    switch (tmp[2]) {
        case '01':
            tmp[2] = '1';
            break;

        case '02':
            tmp[2] = '2';
            break;

        case '03':
            tmp[2] = '3';
            break;

        case '04':
            tmp[2] = '4';
            break;

        case '05':
            tmp[2] = '5';
            break;

        case '06':
            tmp[2] = '6';
            break;

        case '07':
            tmp[2] = '7';
            break;

        case '08':
            tmp[2] = '8';
            break;

        case '09':
            tmp[2] = '9';
            break;
    }

    return tmp;
}

function formataData(data) {
    data = data[0] + '-' + data[1] + '-' + data[2];

    return data.toString();
}

function formataDia(dia) {
    return (dia <= 9) ? `0${dia}` : dia;
}

function formataMes(mes) {
    return (mes <= 9) ? `0${mes}` : mes;
}

function verificaFimDeSemana(dataInicial) {
    var data = new Date(dataInicial.toString() + 'T00:00:00');

    return data.getDay();
}

function verificaFeriados(dataInicial) {
    var eFeriado = false;
    var data = new Date(dataInicial.toString() + 'T00:00:00');

    data = `${formataDia(data.getDate())}-${formataMes(data.getMonth() + 1)}`;

    if (['01-01', '10-04', '21-04', '01-05', '15-08', '07-09', '12-10', '02-11', '15-11', '08-12', '25-12'].includes(data)) {
        eFeriado = true;
    }

    return eFeriado;
}

function verificaDataInvalida(exercicio) {
    var eDataInvalida = false;

    // verificando se a data inicial selecionada é sábado, domingo ou feriado
    if (['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17'].includes(exercicio.periodo)) {
        if ([0, 6].includes(verificaFimDeSemana(exercicio.inicial))) {
            swal({
                title: 'Aviso',
                text: 'A data inicial do período não pode começar no sábado ou domingo!',
                icon: 'warning'
            });

            eDataInvalida = true;
        } else if (verificaFeriados(exercicio.inicial)) {
            swal({
                title: 'Aviso',
                text: 'A data inicial do período não pode começar em feriados!',
                icon: 'warning'
            });

            eDataInvalida = true;
        }
    }

    return eDataInvalida;
}