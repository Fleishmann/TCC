$(document).ready(function() {
    $('#busca').keyup(function() {
        $('#buscarProdutoEstoque').submit(function() {
            var dados = $(this).serialize();
            $.ajax({
                url: 'editar-estoque.php',
                type: 'POST',
                dataType: 'html',
                data: dados,
                success: function(data) {
                    $('#resultadoBusca').empty().html(data);
                }
            });
            return false;
        });
        $('#buscarProdutoEstoque').trigger('submit');
    });
});