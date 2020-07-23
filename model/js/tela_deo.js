 $(document).ready(function () {
                var cont = 1;
                //https://api.jquery.com/click/
                $('#add-campo').click(function () {
                    cont++;
                    //https://api.jquery.com/append/
                    $('#formulario').append('<div class="form-group" id="campo' + cont + '"> <label>Aula: </label><input type="text" name="titulo[]" placeholder="Nome da Aula"> <button type="button" id="' + cont + '" class="btn-apagar"> - </button></div>');
                });

                $('form').on('click', '.btn-apagar', function () {
                    var button_id = $(this).attr("id");
                    $('#campo' + button_id + '').remove();
                });

                $("#CadAulas").click(function () {
                    //Receber os dados do formulário
                    var dados = $("#add-aula").serialize();
                    $.post("insert.php", dados, function (retorna) {
                        $("#msg").slideDown('slow').html(retorna);

                        //Limpar os campos
                        //$('#add-aula')[0].reset();

                        //Apresentar a mensagem leve
                        retirarMsg();
                    });
                });

                //Retirar a mensagem após 1700 milissegundos
                function retirarMsg() {
                    setTimeout(function () {
                        $("#msg").slideUp('slow', function () {});
                    }, 2700);
                }
            });