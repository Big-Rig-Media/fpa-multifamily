<?php

namespace App\Controllers;

use Sober\Controller\Controller;

/**
 * TemplateDispositions
 *
 * Methods available only on the dispositions template
 */
class TemplateAcquisitions extends Controller
{
    /**
     * Get brokers
     */
    public function brokers()
    {
        $query = new \WP_Query([
            'post_type'         => 'brokers',
            'posts_per_page'    => -1
        ]);

        if ( $query->have_posts() ) {
            return $query->posts;
        }

        return;
    }

    /**
     * Get dispositions based on taxonomy
     *
     * @param   object  $term
     */
    public static function dispositions( $broker = null )
    {
        if ( $broker ) {
            $query = new \WP_Query([
                'post_type'         => 'dispositions',
                'posts_per_page'    => -1,
                'tax_query'         => [
                    [
                        'taxonomy' => 'broker',
                        'field'    => 'slug',
                        'terms'    => $broker->post_name
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
