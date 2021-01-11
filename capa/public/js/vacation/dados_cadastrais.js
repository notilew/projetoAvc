$(function () {
    $(document).ready(function (e) {
        e.preventDefault;

        var id = $('#id').val();

        $.ajax({
            type: 'post',
            url: '../../../app/requests/post/vacation/recebe_exercicio.php',
            dataType: 'json',
            data: {
                id: id
            },
            success: function (dados) {
                // setando regime no html da página de pedidos
                $('#regime').val(dados.regime);

                // setando contrato no html da página de pedidos
                $('#contrato').val(dados.contrato);

                $('#periodo-1').addClass('hidden');
                $('#periodo-2').addClass('hidden');
                $('#periodo-3').addClass('hidden');
                $('#periodo-4').addClass('hidden');
                $('#periodo-5').addClass('hidden');
                $('#periodo-6').addClass('hidden');
                $('#periodo-7').addClass('hidden');
                $('#periodo-8').addClass('hidden');
                $('#periodo-9').addClass('hidden');
                $('#periodo-10').addClass('hidden');
                $('#periodo-11').addClass('hidden');
                $('#periodo-12').addClass('hidden');
                $('#periodo-13').addClass('hidden');
                $('#periodo-14').addClass('hidden');
                $('#periodo-15').addClass('hidden');
                $('#periodo-16').addClass('hidden');
                $('#periodo-17').addClass('hidden');

                // verificando se o regime do colaborador é estágio e se o contrato é semestral
                if (dados.regime == '2' && dados.contrato == '1') {
                    $('#periodo-6').removeClass('hidden');
                } else if (dados.regime == '2' && dados.contrato == '2') {
                    $('#periodo-1').removeClass('hidden');
                    $('#periodo-2').removeClass('hidden');
                } else {
                    $('#periodo-1').removeClass('hidden');
                    $('#periodo-2').removeClass('hidden');
                    $('#periodo-3').removeClass('hidden');
                    $('#periodo-4').removeClass('hidden');
                    $('#periodo-5').removeClass('hidden');
                    $('#periodo-7').removeClass('hidden');
                    $('#periodo-8').removeClass('hidden');
                    $('#periodo-9').removeClass('hidden');
                    $('#periodo-10').removeClass('hidden');
                    $('#periodo-11').removeClass('hidden');
                    $('#periodo-12').removeClass('hidden');
                    $('#periodo-13').removeClass('hidden');
                    $('#periodo-14').removeClass('hidden');
                    $('#periodo-15').removeClass('hidden');
                    $('#periodo-16').removeClass('hidden');
                    $('#periodo-17').removeClass('hidden');
                }
            },
            error: function (erro) {
                console.log(erro);
            }
        });
    });
});