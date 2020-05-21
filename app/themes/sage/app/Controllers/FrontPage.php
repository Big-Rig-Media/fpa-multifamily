<?php

namespace App\Controllers;

use Sober\Controller\Controller;

/**
 * FrontPage
 *
 * Methods available only on the static front page
 */
class FrontPage extends Controller
{
    /**
     * Get featured acquisitions
     */
    public function featuredAcquisitions() {
        if ( get_field('featured_acquisitions') ) {
            return get_field('featured_acquisitions');
        }

        return;
    }

    /**
     * Get featured dispositions
     */
    public function featuredDispositions() {
        if ( get_field('featured_dispositions') ) {
            return get_field('featured_dispositions');
        }

        return;
    }

    /**
     * Get disposition region
     *
     * @param   object  $disposition
     */
    public static function dispositionRegion( $disposition ) {
        if ( $disposition ) {
            $terms = get_the_terms($disposition, 'dispositions_region');

            if ( $terms ) {
                return $terms[0]->name;
            }

            return;
        }

        return;
    }

    /**
     * Get recent acquisitions
     */
    public function acquisitions()
    {
        $query = new \WP_Query([
            'post_type'         => 'dispositions',
            'posts_per_page'    => 6,
            'post__in'          => self::featuredAcquisitions(),
            'tax_query'         => [
                [
                    'taxonomy' => 'dispositions_acquisition',
                    'slug'     => 'slug',
                    'terms'    => 'yes',
                    'operator' => 'IN'
                ]
            ],
            'orderby'           => 'post__in'
        ]);

        if ( $query->have_posts() ) {
            return $query->posts;
        }

        return;
    }

    /**
     * Get recent dispositions
     */
    public function dispositions()
    {
        $query = new \WP_Query([
            'post_type'         => 'dispositions',
            'posts_per_page'    => 6,
            'post__in'          => self::featuredDispositions(),
            'tax_query'         => [
                [
                    'taxonomy' => 'dispositions_acquisition',
                    'slug'     => 'slug',
                    'terms'    => 'no',
                    'operator' => 'IN'
                ]
            ],
            'orderby'           => 'post__in'
        ]);

        if ( $query->have_posts() ) {
            return $query->posts;
        }

        return;
    }

    /**
     * Get recent posts
     */
    public function posts()
    {
        $query = new \WP_Query([
            'post_type'         => 'post',
            'posts_per_page'    => 6
        ]);

        if ( $query->have_posts() ) {
            return $query->posts;
        }

        return;
    }
}
