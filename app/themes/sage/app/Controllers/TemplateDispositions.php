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
                    'post_type' => 'brokers',
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
     * Get broker's company
     *
     * @param   object  $broker
     */
    public static function company( $broker )
    {
        if ( $broker ) {
            $company = get_field('company', $broker);

            if ( $company ) {
                return $company;
            }

            return;
        }

        return;
    }

    /**
     * Get broker's phone
     *
     * @param   object  $broker
     */
    public static function phone( $broker )
    {
        if ( $broker ) {
            $phone = get_field('phone', $broker);

            if ( $phone ) {
                return $phone;
            }

            return;
        }

        return;
    }

    /**
     * Get broker's email
     *
     * @param   object  $broker
     */
    public static function email( $broker )
    {
        if ( $broker ) {
            $email = get_field('email', $broker);

            if ( $email ) {
                return $email;
            }

            return;
        }

        return;
    }

    /**
     * Get disposition's website
     *
     * @param   object  $disposition
     */
    public static function website( $disposition )
    {
        if ( $disposition ) {
            $website = get_field('website', $disposition);

            if ( $website ) {
                return $website;
            }

            return;
        }

        return;
    }

    /**
     * Get disposition's units
     *
     * @param   object  $disposition
     */
    public static function units( $disposition )
    {
        if ( $disposition ) {
            $units = get_field('units', $disposition);

            if ( $units ) {
                return $units;
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
                    'relation'     => 'AND',
                    [
                        'taxonomy' => $term->taxonomy,
                        'field'    => 'slug',
                        'terms'    => $term->slug
                    ],
                    [
                        'taxonomy' => 'dispositions_acquisition',
                        'slug'     => 'slug',
                        'terms'    => 'yes',
                        'operator' => 'NOT IN'
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
