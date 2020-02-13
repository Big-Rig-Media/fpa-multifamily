<?php

namespace App\Controllers;

use Sober\Controller\Controller;

/**
 * TemplateAcquisitions
 *
 * Methods available only on the acquisitions template
 */
class TemplateAcquisitions extends Controller
{
    /**
     * Get brokers
     */
    public function brokers()
    {
        $query = new \WP_Query([
            'post_type'         => 'employees',
            'posts_per_page'    => -1,
            'meta_key'          => 'employee_broker',
            'meta_value'        => 'yes',
            'meta_compare'      => '='

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
    public static function dispositions( $broker )
    {
        if ( $broker ) {
            $query = new \WP_Query([
                'post_type'         => 'dispositions',
                'posts_per_page'    => -1,
                'tax_query'         => [
                    [
                        'taxonomy' => 'dispositions_broker',
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
