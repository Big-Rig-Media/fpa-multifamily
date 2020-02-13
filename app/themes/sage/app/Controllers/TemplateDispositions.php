<?php

namespace App\Controllers;

use Sober\Controller\Controller;

/**
 * TemplateDispositions
 *
 * Methods available only on the dispositions template
 */
class TemplateDispositions extends Controller
{
    /**
     * Get taxonomy terms
     */
    public function terms()
    {
        $terms = get_terms([
            'taxonomy'      => 'dispositions_status',
            'hide_empty'    => true,
            'orderby'       => 'name',
            'order'         => 'ASC'
        ]);

        if ( $terms ) {
            return $terms;
        }

        return;
    }

    /**
     * Get disposition's city
     *
     * @param   object  $disposition
     */
    public static function city( $disposition )
    {
        if ( $disposition ) {
            $terms = get_the_terms($disposition, 'dispositions_city');

            if ( $terms ) {
                return $terms[0]->name;
            }

            return;
        }

        return;
    }

    /**
     * Get disposition's state
     *
     * @param   object  $disposition
     */
    public static function state( $disposition )
    {
        if ( $disposition ) {
            $terms = get_the_terms($disposition, 'dispositions_state');

            if ( $terms ) {
                return $terms[0]->name;
            }

            return;
        }

        return;
    }

    /**
     * Get disposition's broker
     *
     * @param   object  $disposition
     */
    public static function broker( $disposition )
    {
        if ( $disposition ) {
            $terms = get_the_terms($disposition, 'dispositions_broker');

            if ( $terms ) {
                $query = new \WP_Query([
                    'post_type' => 'employees',
                    's'         =>  $terms[0]->name
                ]);

                if ( $query->have_posts() ) {
                    return $query->post;
                }

                return;
            }

            return;
        }

        return;
    }

    /**
     * Get dispositions based on taxonomy
     *
     * @param   object  $term
     */
    public static function dispositions( $term )
    {
        if ( $term ) {
            $query = new \WP_Query([
                'post_type'         => 'dispositions',
                'posts_per_page'    => -1,
                'tax_query'         => [
                    [
                        'taxonomy' => $term->taxonomy,
                        'field'    => 'slug',
                        'terms'    => $term->slug
                    ]
                ]
            ]);

            if ( $query->have_posts() ) {
                return $query->posts;
            }

            return;
        }

        return;
    }
}
