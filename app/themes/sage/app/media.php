<?php

namespace App;

/**
 * Modify Allowed Media Mime Types
 */
add_filter('upload_mimes', function($mimes) {
    $mimes['svg'] = 'image/svg+xml';

    return $mimes;
});


/**
 * Custom image sizes
 *
 * @link    https://developer.wordpress.org/reference/functions/add_image_size/
 *
 * e.g. add_image_size('w800x400', 800, 400, true)
 */

$custom_sizes = [
    'w1920x800' => [1920, 800, true],
    'w960x800'  => [960, 800, true],
    'w960x600'  => [960, 600, true],
    'w596x454'  => [595, 454, true],
    'w492x544'  => [492, 544, true],
    'w480x300'  => [480, 300, true],
    'w298x227'  => [298, 227, true],
    'w246x272'  => [246, 272, true]
];

if (!empty($custom_sizes)) {
    foreach ($custom_sizes as $key => $custom_size) {
        add_image_size($key, $custom_size[0], $custom_size[1], $custom_size[2]);
    }
}

/**
 * Add custom image sizes to media library
 *
 * @link    https://codex.wordpress.org/Plugin_API/Filter_Reference/image_size_names_choose
 * @param   array   $sizes
 */
add_filter('image_size_names_choose', function($sizes) {
    $addsizes = [
        'w960x600' => __('Wide Ratio Large'),
        'w480x300' => __('Wide Radio Small')
    ];

    $newsizes = array_merge($sizes, $addsizes);

    return $newsizes;
});
