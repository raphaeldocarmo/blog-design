function carregaPosts(){
    var botaoCarregar = $(".carregar-posts");
    var paginaAtual = parseInt(botaoCarregar.data("pagina"));
    var proximaPagina = paginaAtual  + 1;
    var pegaUrl = botaoCarregar.attr("name") + "/?paged=" + proximaPagina;
    var verificaNovaUrl = proximaPagina + 1;
    var proximaUrl = botaoCarregar.attr("name") + "/?paged=" + verificaNovaUrl;
    
    botaoCarregar.data("pagina", proximaPagina);
    
    
    $.ajax({
        url: pegaUrl, 
        
        success: function(result){
            var posts = $(result).find(".post").css("opacity", 0);
            
            var delayAnimacao = 0;
            for(var i=0; i < posts.length; i++){
                console.log(posts[i]);
                $(".posts").append(posts[i]).find(".post:last").delay(delayAnimacao).animate({ opacity: 1 }, 1000);
                
                delayAnimacao = delayAnimacao + 500;
            }
        },
        
        
        error: function(erro){
            $(".posts").next().append("<div class='mensagem-de-aviso'>Não há mais posts a serem exibidos.</div>");
            $(".carregar-posts").remove();
        }
    });
}

function rolarInfinito(){
    function posicao(valor) {
        var verSeElementoEhVisivel = $('aside').visible();;
        
        if(verSeElementoEhVisivel == true){
            $(".carregar-posts").click();
        }
        
        
    }
    
    $(function() {
      var referenciaDoTopo = $('aside').offset().top; 
      posicao(referenciaDoTopo - $(window).scrollTop()); 
    
      $(window).scroll(function() { 
        posicao(referenciaDoTopo - $(window).scrollTop());
      });
    });
}

 $(".carregar-posts").on("click", function(){
     carregaPosts();
});