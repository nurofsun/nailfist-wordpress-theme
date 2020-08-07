<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <div class="field">
        <p class="control has-icons-right">
            <input type="search" class="search-field input"
                placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
                value="<?php echo get_search_query() ?>" name="s"
                title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>">
            <span class="icon is-right is-small">
                <i class="fas fa-search"></i>
            </span>
        </p>
    </div>
</form>
