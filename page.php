<?php get_header(); ?>
<section>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article>            
            <h1>
                <a href="<?php the_permalink() ?>">
                    <?php the_title(); ?>
                </a>
            </h1>

            <?php the_content(); ?>
        </article>

    <?php endwhile; else: ?>
        <article class="nao-encontrado">
    
            <h3>Ops!</h3>
            
            <h4>
                Parece que o que você está procurando não está por aqui.
            </h4>
            
            <div class="pesquisa-na-pagina">
                <?php get_search_form(); ?>
            </div>
            
        </article>
    <?php endif; ?>
             
</section>
         
<?php get_sidebar(); ?>
<?php get_footer(); ?>