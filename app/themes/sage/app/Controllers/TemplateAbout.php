<?php

namespace App\Controllers;

use Sober\Controller\Controller;

/**
 * TemplateAbout
 *
 * Methods available only on the about template
 */
class TemplateAbout extends Controller
{
    /**
     * Get offices
     */
    public function offices()
    {
        $query = new \WP_Query([
            'post_type'         => 'offices',
            'posts_per_page'    => -1
        ]);

        if ( $query->have_posts() ) {
            return $query->posts;
        }

        return;
    }

    /**
     * Get address of office
     *
     * @param   object  $office
     */
    public static function address( $office )
    {
        if ( $office ) {
            $address = get_field('office_address', $office);

            if ( $address ) {
                return 'https://www.google.com/maps/dir/Current+Location/'.urlencode($address).'';
            }

            return;
        }

        return;
    }

    /**
     * Get spotlight employees
     */
    public function employees()
    {
        $employees = get_field('employee_spotlight');

        if ( $employees ) {
            $query = new \WP_Query([
                'post_type' => 'employees',
                'post__in'  => $employees
            ]);

            if ( $query->have_posts() ) {
                return $query->posts;
            }

            return;
        }

        return;
    }
}
