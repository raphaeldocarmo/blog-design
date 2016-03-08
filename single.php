<?php get_header(); ?>
             
            <div id="fb-root"></div>
            <script>
                (function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
<section>
    
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            
            <article>
                <h2>
                    <a href="<?php the_permalink() ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>
                <div class="plugins-sociais">
                    <div class="twitter-share">
                        <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
                        <script>
                            !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
                        </script>
                    </div>
                    
                    <div class="fb-like" data-href="<?php echo get_page_link(); ?>" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
                </div>

                <?php the_content(); ?>

                <p class="assinatura">
                    <small>
                        Por 
                        <strong><?php the_author() ?> </strong>
                        <!-- 
                            <?php comments_popup_link('Sem Comentários', '1 Comentário', '% Comentários', 'comments-link', ''); ?> 
                            <strong><?php edit_post_link('(Editar)'); ?></strong> 
                        -->
                    </small>
                </p>
                
                <h4 class="titulo-comentario">Deixe o seu comentário</h4>
                <div class="fb-comments" data-href="<?php echo get_page_link(); ?>" data-numposts="6"></div>
            </article>
                 
        <?php endwhile; else: ?>

            <article>
                <h2>Nada Encontrado</h2>
                
                <p>Erro 404</p>
                
                <p>Lamentamos mas não foram encontrados artigos.</p>
            </article>

        <?php endif; ?>
         
     
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>