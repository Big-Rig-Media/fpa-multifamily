<?php
/**
* Plugin Name:     Big Rig Media
* Plugin URI:
* Description:     Various client based functions: custom post types, shortcode, etc
* Version:         1.0.0
* Author:          Ernesto Arellano Jr
* Author URI:
* License:         MIT
* License URI:     http://opensource.org/licenses/MIT
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
  echo 'The night is dark and full of terrors.';

  exit;
}

class BigRigMedia
{
  /**
   * Constructor
   *
   * @since 1.0.0
   */
  public function __construct()
  {
    // Variables
    $this->settings = [
      'dir'     => plugin_dir_url(__FILE__),
      'version' => '1.0.0'
    ];

    // Actions
    add_action('init', [$this, 'init']);
    add_action('save_post', [$this, 'update_broker_terms']);
    add_action('save_post', [$this, 'update_office_terms']);

    // Admin: Add columns to employees custom post type
    add_filter( 'manage_edit-employees_columns', [$this, 'employees_admin_columns'] );
    add_action( 'manage_employees_posts_custom_column', [$this, 'employees_admin_columns_content'], 10, 2 );

    // Admin: Add columns to dispositions custom post type
    add_filter( 'manage_edit-dispositions_columns', [$this, 'dispositions_admin_columns'] );
    add_action( 'manage_dispositions_posts_custom_column', [$this, 'dispositions_admin_columns_content'], 10, 2 );
  }

  /**
   *  Create custom post type and taxonomies
   *
   * @link https://codex.wordpress.org/Function_Reference/register_post_type
   * @link https://codex.wordpress.org/Function_Reference/register_taxonomy
   * @since 1.0.0
   */
  public function init()
  {
    // Create custom post types
    register_post_type('brokers', [
      'label'                 => 'Brokers',
      'public'                => false,
      'publicly_queryable'    => false,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'query_var'             => true,
      'rewrite'               => ['slug' => 'brokers', 'with_front' => false],
      'capability_type'       => 'post',
      'has_archive'           => false,
      'hierarchical'          => false,
      'menu_position'         => null,
      'menu_icon'             => 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="#a0a5aa" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm95.8 32.6L272 480l-32-136 32-56h-96l32 56-32 136-47.8-191.4C56.9 292 0 350.3 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-72.1-56.9-130.4-128.2-133.8z"/></svg>'),
      'supports'              => ['title']
    ]);

    register_post_type('dispositions', [
      'label'                 => 'Dispositions',
      'public'                => false,
      'publicly_queryable'    => false,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'query_var'             => true,
      'rewrite'               => ['slug' => 'dispositions', 'with_front' => false],
      'capability_type'       => 'post',
      'has_archive'           => false,
      'hierarchical'          => false,
      'menu_position'         => null,
      'menu_icon'             => 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="#a0a5aa" d="M436 480h-20V24c0-13.255-10.745-24-24-24H56C42.745 0 32 10.745 32 24v456H12c-6.627 0-12 5.373-12 12v20h448v-20c0-6.627-5.373-12-12-12zM128 76c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12V76zm0 96c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12v-40zm52 148h-40c-6.627 0-12-5.373-12-12v-40c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40c0 6.627-5.373 12-12 12zm76 160h-64v-84c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v84zm64-172c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12v-40c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40zm0-96c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12v-40c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40zm0-96c0 6.627-5.373 12-12 12h-40c-6.627 0-12-5.373-12-12V76c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40z"/></svg>'),
      'supports'              => ['thumbnail','title']
    ]);

    register_post_type('employees', [
      'label'                 => 'Employees',
      'public'                => false,
      'publicly_queryable'    => false,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'query_var'             => true,
      'rewrite'               => ['slug' => 'employees', 'with_front' => false],
      'capability_type'       => 'post',
      'has_archive'           => false,
      'hierarchical'          => false,
      'menu_position'         => null,
      'menu_icon'             => 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="#a0a5aa" d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"/></svg>'),
      'supports'              => ['editor','excerpt','thumbnail','title']
    ]);

    register_post_type('offices', [
      'label'                 => 'Offices',
      'public'                => true,
      'publicly_queryable'    => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'query_var'             => true,
      'rewrite'               => ['slug' => 'offices', 'with_front' => false],
      'capability_type'       => 'post',
      'has_archive'           => false,
      'hierarchical'          => false,
      'menu_position'         => null,
      'menu_icon'             => 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><path fill="#a0a5aa" d="M336.5 160C322 70.7 287.8 8 248 8s-74 62.7-88.5 152h177zM152 256c0 22.2 1.2 43.5 3.3 64h185.3c2.1-20.5 3.3-41.8 3.3-64s-1.2-43.5-3.3-64H155.3c-2.1 20.5-3.3 41.8-3.3 64zm324.7-96c-28.6-67.9-86.5-120.4-158-141.6 24.4 33.8 41.2 84.7 50 141.6h108zM177.2 18.4C105.8 39.6 47.8 92.1 19.3 160h108c8.7-56.9 25.5-107.8 49.9-141.6zM487.4 192H372.7c2.1 21 3.3 42.5 3.3 64s-1.2 43-3.3 64h114.6c5.5-20.5 8.6-41.8 8.6-64s-3.1-43.5-8.5-64zM120 256c0-21.5 1.2-43 3.3-64H8.6C3.2 212.5 0 233.8 0 256s3.2 43.5 8.6 64h114.6c-2-21-3.2-42.5-3.2-64zm39.5 96c14.5 89.3 48.7 152 88.5 152s74-62.7 88.5-152h-177zm159.3 141.6c71.4-21.2 129.4-73.7 158-141.6h-108c-8.8 56.9-25.6 107.8-50 141.6zM19.3 352c28.6 67.9 86.5 120.4 158 141.6-24.4-33.8-41.2-84.7-50-141.6h-108z"/></svg>'),
      'supports'              => ['thumbnail','title']
    ]);

    // Set taxonomies
    $taxonomies = [
      'Dispositions Acquisition' => [
        'public'        => false,
        'label'         => 'Acquisition',
        'url'           => 'acquisition',
        'hierarchical'  => true,
        'parent'        => 'dispositions'
      ],
      'Dispositions Broker' => [
        'public'        => false,
        'label'         => 'Broker',
        'url'           => 'broker',
        'hierarchical'  => true,
        'parent'        => 'dispositions'
      ],
      'Dispositions City' => [
        'public'        => false,
        'label'         => 'City',
        'url'           => 'city',
        'hierarchical'  => true,
        'parent'        => 'dispositions'
      ],
      'Dispositions Region' => [
        'public'        => false,
        'label'         => 'Region',
        'url'           => 'region',
        'hierarchical'  => true,
        'parent'        => 'dispositions'
      ],
      'Dispositions State' => [
        'public'        => false,
        'label'         => 'State',
        'url'           => 'state',
        'hierarchical'  => true,
        'parent'        => 'dispositions'
      ],
      'Dispositions Status' => [
        'public'        => false,
        'label'         => 'Status',
        'url'           => 'status',
        'hierarchical'  => true,
        'parent'        => 'dispositions'
      ],
      'Employees Office' => [
        'public'        => false,
        'label'         => 'Office',
        'url'           => 'office',
        'hierarchical'  => true,
        'parent'        => 'employees'
      ],
      'Employees Job Title' => [
        'public'        => false,
        'label'         => 'Job Title',
        'url'           => 'title',
        'hierarchical'  => true,
        'parent'        => 'employees'
      ],
      'Employees Territory' => [
        'public'        => false,
        'label'         => 'Territory',
        'url'           => 'territory',
        'hierarchical'  => true,
        'parent'        => 'employees'
      ],
      'Offices Type' => [
        'public'        => false,
        'label'         => 'Type',
        'url'           => 'type',
        'hierarchical'  => true,
        'parent'        => 'offices'
      ]
    ];

    if (!empty($taxonomies)) {
      foreach ($taxonomies as $key => $taxonomy) {
        // Taxonomy variables
        $taxonomy_string    = str_replace(' ', '_', strtolower($key));
        $label              = ucwords($taxonomy['label']);
        $rewrite_url        = $taxonomy['url'];
        $public             = $taxonomy['public'];
        $hierarchical       = $taxonomy['hierarchical'];
        $parent             = $taxonomy['parent'];

        register_taxonomy(
          $taxonomy_string,
          $parent,
          [
            'label'         => $label,
            'public'        => $public,
            'show_ui'       => true,
            'rewrite'       => ['slug' => $rewrite_url, 'with_front' => false],
            'hierarchical'  => $hierarchical
          ]
        );
      }
    }
  }

  public function update_office_terms( $post_id )
  {
    // Check if we're on the right post type
    if ( get_post_type($post_id) !== 'offices' ) {
      return;
    }

    // Check that we're not on an auto draft
    if ( get_post_status($post_id) === 'auto-draft' ) {
      return;
    }

    // Define data to insert
    $office_title = get_the_title($post_id);
    $office_slug  = get_post($post_id)->post_name;

    // Grab all disposition brokers
    $office_terms = get_terms([
      'taxonomy'      => 'employees_office',
      'hide_empty'    => false
    ]);

    // Loop through all employee offices and update if necessary
    foreach ( $office_terms as $office_term ) {
      if ( $office_term->name === $office_title ) {
        wp_update_term( $office_term->term_id, $office_term->taxonomy, ['name' => $office_title, 'slug' => $office_slug] );
      }
    }

    // Insert new employee office
    wp_insert_term( $office_title, 'employees_office', ['slug' => $office_slug] );

    return;
  }

  /**
   *  Create custom post type and taxonomies
   *
   * @param int   $post_id
   * @since 1.0.0
   */
  public function update_broker_terms( $post_id )
  {
    // Check if we're on the right post type
    if ( get_post_type($post_id) !== 'brokers' ) {
      return;
    }

    // Check that we're not on an auto draft
    if ( get_post_status($post_id) === 'auto-draft' ) {
      return;
    }

    // Define data to insert
    $broker_title = get_the_title($post_id);
    $broker_slug  = get_post($post_id)->post_name;

    // Grab all disposition brokers
    $broker_terms = get_terms([
      'taxonomy'      => 'dispositions_broker',
      'hide_empty'    => false
    ]);

    // Loop through all disposition brokers and update if necessary
    foreach ( $broker_terms as $broker_term ) {
      if ( $broker_term->name === $broker_title ) {
        wp_update_term( $broker_term->term_id, $broker_term->taxonomy, ['name' => $broker_title, 'slug' => $broker_slug] );
      }
    }

    // Insert new disposition broker
    wp_insert_term( $broker_title, 'dispositions_broker', ['slug' => $broker_slug] );

    return;
  }

  /**
   * Modify dispositions admin columns
   *
   * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/manage_$post_type_posts_columns
   * @param array $columns
   * @since 1.0.0
   */
  public function dispositions_admin_columns( $columns )
  {
    $columns = [
      'cb'            => '<input type="checkbox" />',
      'title'         => __('Title'),
      'acquisition'   => __('Acquisition'),
      'broker'        => __('Broker'),
      'city'          => __('City'),
      'state'         => __('State'),
      'status'        => __('Status'),
      'date'          => __('Date')
    ];

    return $columns;
  }

  /**
   * Modify employees admin columns
   *
   * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/manage_$post_type_posts_columns
   * @param array $columns
   * @since 1.0.0
   */
  public function employees_admin_columns( $columns )
  {
    $columns = [
      'cb'            => '<input type="checkbox" />',
      'title'         => __('Title'),
      'shortcode'     => __('Shortcode'),
      'date'          => __('Date')
    ];

    return $columns;
  }

  /**
   * Populate employees admin columns
   *
   * @link https://codex.wordpress.org/Plugin_API/Action_Reference/manage_$post_type_posts_custom_column
   * @param string $column_name
   * @param int    $post_id
   * @since 1.0.0
   */
  public function employees_admin_columns_content( $column_name, $post_id )
  {
    switch( $column_name ) {
      // Shortcode
      case 'shortcode':
        if ( $post_id ) {
          echo '[employee id='.$post_id.']';
        }
      break;
    }
  }

  /**
   * Populate dispositions admin columns
   *
   * @link https://codex.wordpress.org/Plugin_API/Action_Reference/manage_$post_type_posts_custom_column
   * @param string $column_name
   * @param int    $post_id
   * @since 1.0.0
   */
  public function dispositions_admin_columns_content( $column_name, $post_id )
  {
    $output = [];

    switch( $column_name ) {
      // Acquisition
      case 'acquisition':
        $terms = get_the_terms( $post_id, 'dispositions_acquisition' );

        if ( !empty( $terms ))  {
          foreach ( $terms as $term ) {
            $output[] = $term->name;
          }
        }
      break;
      // Broker
      case 'broker':
        $terms = get_the_terms( $post_id, 'dispositions_broker' );

        if ( !empty( $terms ))  {
          foreach ( $terms as $term ) {
            $output[] = $term->name;
          }
        }
      break;
      // City
      case 'city':
        $terms = get_the_terms( $post_id, 'dispositions_city' );

        if ( !empty( $terms ))  {
          foreach ( $terms as $term ) {
            $output[] = $term->name;
          }
        }
      break;
      // State
      case 'state':
        $terms = get_the_terms( $post_id, 'dispositions_state' );

        if ( !empty( $terms ))  {
          foreach ( $terms as $term ) {
            $output[] = $term->name;
          }
        }
      break;
      // Status
      case 'status':
        $terms = get_the_terms( $post_id, 'dispositions_status' );

        if ( !empty( $terms ))  {
          foreach ( $terms as $term ) {
            $output[] = $term->name;
          }
        }
      break;
    }

    // Return output
    echo join(', ', $output);
  }
}

// Initialize main class
new BigRigMedia();