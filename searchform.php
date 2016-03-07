<div class="pesquisar">
    <form action="/" method="get" accept-charset="utf-8" id="searchform" role="search">
        <div class="pesquisar__input">
            <input type="text" name="s" id="s" value="<?php the_search_query(); ?>" required />
            <label for="s">Pesquisar por</label>
        </div>
        
        <button type="submit" id="searchsubmit" value="Pesquisar" class="botao-pesquisar">
            <span class="icon-lupa"></span>
        </button>
    </form>
</div>