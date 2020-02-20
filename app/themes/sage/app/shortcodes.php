<?php

namespace App;

add_shortcode('employee', function( $atts, $content = null ) {
    extract(shortcode_atts([
        'id' => 157,
    ], $atts));

    $query = new \WP_Query([
        'post_type' => 'employees',
        'post__in'  => [(int) $id]
    ]);

    if ( $query->have_posts() ) {
        return \App\template('partials.shortcodes.shortcode-employee', ['employee' => $query->post]);
    }

    return;
});

/**
 * Row
 *
 * @param   array   $atts
 */
add_shortcode('row', function( $atts, $content = null ) {
    return '<div class="row">'.do_shortcode($content).'</div>';
});

/**
 * Column
 *
 * @param   array   $atts
 */
add_shortcode('column', function( $atts, $content = null ) {
    extract(shortcode_atts([
        'columns' => 6,
    ], $atts));

    return '<div class="col md:col-'.$columns.'">'.do_shortcode($content).'</div>';
});
