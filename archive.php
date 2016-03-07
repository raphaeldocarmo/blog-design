<?php get_header(); ?>

    <section>
        <h3>
            <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
            <?php /* If this is a category archive */ if (is_category()) { ?>
                Arquivo da Categoria: <strong>"<?php echo single_cat_title(); ?>"</strong>
            <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
                Posts do dia: <strong><?php the_time('j de F de Y'); ?></strong>
            <?php /* If this is a tag */ } elseif (is_tag()) { ?>
                Exibido posts sobre: <strong><?php single_tag_title(); ?></strong>
            <?php /* If this is search */ } elseif (is_search()) { ?>
                Resultados da pesquisa:
            <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
                Arquivo do mês: <strong><?php the_time('F de Y'); ?></strong>
            <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
                Arquivo do ano de: <strong><?php the_time('Y'); ?></strong>
            <?php /* If this is an author archive */ } elseif (is_author()) { ?>
                Arquivo do Autor
            <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                Arquivo do Blog
            <?php } ?>
        </h3>
    </section>
    
    <section class="posts"> 
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
            <article class="post">
                
            	<a href="<?php the_permalink() ?>">
            	    
                    <div class="data">
                        <p><?php the_time('d') ?></p>
                        <p><?php the_time('M/y') ?></p>
                    </div>
                
                    <h2 style="background-image: url(<?php echo $image[0]; ?>);">
                		<?php the_title(); ?>
            	    </h2>
        		    
        		    <?php echo get_excerpt(200); ?>
        		</a>
        		
    		    <?php 
        		    $categories = get_the_category();
 
                    if ( ! empty( $categories ) ) {
                        echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '" class="categoria ' . esc_html( $categories[0]->name ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                    }
    		    ?>
            </article>

        <?php endwhile?>
        
        </section>
    	
    	<p>
            <button name="<?php echo bloginfo('url') ?>" data-pagina="1" class="carregar-posts">Carregar mais posts</button>
    	</p>

        <?php else: ?>
                <article class="nao-encontrado">
            
                    <h3>Ops!</h3>
                    
                    <h4>
                        Parece que o que você está procurando não está por aqui.
                    </h4>
                    
                    <div class="pesquisa-na-pagina">
                        <?php get_search_form(); ?>
                    </div>
                    
                </article>
        	</section>         
        <?php endif; ?>
         
<?php get_sidebar(); ?>
<?php get_footer(); ?>