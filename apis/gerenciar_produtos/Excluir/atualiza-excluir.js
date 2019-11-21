$(document).ready(function() {
    $('#campo').keyup(function() {
        $('#buscarProduto').submit(function() {
            var dados = $(this).serialize();
            $.ajax({
                url: 'excluir-produtos.php',
                type: 'POST',
                dataType: 'html',
                data: dados,
                success: function(data) {
                    $('#resultado').empty().html(data);
                }
            });
            return false;
        });
        $('#buscarProduto').trigger('submit');
    });
});