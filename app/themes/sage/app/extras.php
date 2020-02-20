<?php

namespace App;

/**
 * Force Gravity Form to scroll to form top position upon submission
 */
add_filter('gform_confirmation_anchor', '__return_true');

/**
 * Custom login url
 *
 * @link    https://codex.wordpress.org/Plugin_API/Filter_Reference/login_headerurl
 */
add_filter('login_headerurl', function() {
    return get_home_url();
});

apply_filters('excerpt_length', function($length) {
    return 10;
}, 999);

/**
 * Numbered Pagination
 *
 * @param   object  $query
 * @return  mixed   The HTML output
 */
function pagination( $query ) {
    $limit = 999999999;

    $pagination = paginate_links([
        'base'    => str_replace($limit, '%#%', esc_url(get_pagenum_link($limit))),
        'format'  => '/page/%#%',
        'current' => max(1, get_query_var('paged')),
        'total'   => $query->max_num_pages,
        'type'    => 'array'
    ]);

    if ( is_array($pagination) ) {
        $output = '<nav class="brm-nav brm-nav--pagination">
                        <ol class="brm-nav__list">';

        foreach ($pagination as $page) {
            $output .= '<li class="menu-item">'.$page.'</li>';
        }

        return $output .= ' </ol>
                           </nav>';
    }

    return;
}
