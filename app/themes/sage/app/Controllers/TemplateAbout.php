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
     * Get office description
     *
     * @param   object  $office
     */
    public static function officeDescription( $office )
    {
        if ( $office ) {
            $description = get_field('office_description', $office);

            if ( $description ) {
                return $description;
            }

            return;
        }

        return;
    }

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
            $address1 = get_field('street_address_1', $office) ?: null;
            $address2 = get_field('street_address_2', $office) ?: null;
            $city = get_field('city', $office) ?: null;
            $state = get_field('state', $office) ?: null;
            $zipcode = get_field('zipcode', $office) ?: null;

            if ( $address1 || $address2 || $city || $state || $zipcode ) {

                return 'https://www.google.com/maps/dir/Current+Location/'.urlencode($address1 . ' ' . $address2 . ' ' . $city . ' ' . $state . ' ' . $zipcode).'';
            }

            return;
        }

        return;
    }

    /**
     * Get formatted address of office
     *
     * @param   object  $office
     */
    public static function simpleLocation( $office )
    {
        if ( $office ) {
            $address1 = get_field('street_address_1', $office) ?: null;
            $address2 = get_field('street_address_2', $office) ?: null;
            $city = get_field('city', $office) ?: null;
            $state = get_field('state', $office) ?: null;
            $zipcode = get_field('zipcode', $office) ?: null;

            if ( $address1 || $address2 || $city || $state || $zipcode ) {
                return $address1 . ' ' . $address2 . '<br><strong>' . $city . ', ' . $state . '</strong> ';
            }

            return;
        }

        return;
    }

    /**
     * Get formatted address of office
     *
     * @param   object  $office
     */
    public static function formatAddress( $office )
    {
        if ( $office ) {
            $address1 = get_field('street_address_1', $office) ?: null;
            $address2 = get_field('street_address_2', $office) ?: null;
            $city = get_field('city', $office) ?: null;
            $state = get_field('state', $office) ?: null;
            $zipcode = get_field('zipcode', $office) ?: null;

            if ( $address1 || $address2 || $city || $state || $zipcode ) {
                return $address1 . ' ' . $address2 . '<br><strong>' . $city . ', ' . $state . ' ' . $zipcode . '</strong> ';
            }

            return;
        }

        return;
    }

    /**
     * Get phone of office
     *
     * @param   object  $office
     */
    public static function phone( $office )
    {
        if ( $office ) {
            $phone = get_field('office_phone', $office);

            if ( $phone ) {
                return $phone;
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
