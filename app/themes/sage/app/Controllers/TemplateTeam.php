<?php

namespace App\Controllers;

use Sober\Controller\Controller;

/**
 * TemplateTeam
 *
 * Methods available only on the team template
 */
class TemplateTeam extends Controller
{
    /**
     * Get employees
     */
    public function employees()
    {
        $query = new \WP_Query([
            'post_type'         => 'employees',
            'posts_per_page'    => -1
        ]);

        if ( $query->have_posts() ) {
            return $query->posts;
        }

        return;
    }

    /**
     * Get vcard of employee
     *
     * @param   object  $employee
     */
    public static function vcard( $employee )
    {
        if ( $employee ) {
            $vcard = get_field('employee_vcard', $employee);

            if ( $vcard ) {
                return $vcard;
            }

            return;
        }

        return;
    }
}
