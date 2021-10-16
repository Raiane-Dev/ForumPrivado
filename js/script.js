function buscarNome(nome){
    $.ajax({
        method: 'post',
        url: './js/search.php',
        data: {nome:nome},
        success:function(data){
            $('#resultado').append(data);
        }
    });
}

    buscarNome();
    function keyClick(){
    $('#buscar').val(function(){
        var nome = $(this).val();
        if (nome != ''){
            buscarNome(nome);
        }else{
            buscarNome();
        }
    });
    return false;
}