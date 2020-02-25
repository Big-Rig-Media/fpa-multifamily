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
     * Get recent acquisitions
     */
    public function acquisitions()
    {
        $query = new \WP_Query([
            'post_type'         => 'acquisitions',
            'posts_per_page'    => 6
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
            'posts_per_page'    => 6
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
