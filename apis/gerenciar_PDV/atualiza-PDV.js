$(document).ready(function() {
    $('#search').keyup(function() {
        $('#buscarProdutoPDV').submit(function() {
            var dados = $(this).serialize();
            $.ajax({
                url: 'BuscadorDeProdutoPDV.php',
                type: 'POST',
                dataType: 'html',
                data: dados,
                success: function(data) {
                    $('#resultadoDaBusca').empty().html(data);
                }
            });
            return false;
        });
        $('#buscarProdutoPDV').trigger('submit');
    });
});