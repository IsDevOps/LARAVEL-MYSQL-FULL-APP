$("document").ready(function(){
    // Apaga o status de conteudo gerado com sucesso!
    setTimeout(function(){
        $(".alert-dismissible").parent().fadeOut(function(){
            $(this).remove();
        })
    }, 5000 );

    $('.money_mask').mask('000.000.000.000.000,00', {reverse: true});

})
