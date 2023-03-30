<?php

class UT_Services {

    private static $_instance = null; 

    static public function get_instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {

        /* Hook into the 'init' action so that the function
        * Containing our post type registration is not 
        * unnecessarily executed. 
        */
        add_action( 'init', [$this, 'custom_post_type'], 0 );
        add_action( 'init', [$this, 'add_custom_taxonomies'], 0 );
    }

    function custom_post_type() {

        register_post_type( 'service', [
            'label'               => 'Услуги',
            'labels'              => array(
                'name'          => 'Услуги',
                'singular_name' => 'Услуга',
                'menu_name'     => 'Архив Услуг',
                'all_items'     => 'Все Услуги',
                'add_new'       => 'Добавить Услугу',
                'add_new_item'  => 'Добавить новую Услугу',
                'edit'          => 'Редактировать',
                'edit_item'     => 'Редактировать Услугу',
                'new_item'      => 'Новая Услуга',
            ),
            'description'         => '',
            'public'              => true,
            'publicly_queryable'  => true,
            'show_ui'             => true,
            'show_in_rest'        => true,
            'rest_base'           => '',
            'show_in_menu'        => true,
            'exclude_from_search' => false,
            'capability_type'     => 'post',
            'map_meta_cap'        => true,
            'hierarchical'        => false,
            'rewrite'             => array( 
                // 'slug' => 'faq/%cat_service%', 
                'with_front' => false, 
                'pages' => false, 
                'feeds' => false, 
                'feed' => false 
            ),
            'has_archive'         => true, // 'service',
            'query_var'           => true,
            'supports'            => array( 'title', 'editor', 'thumbnail', ),
            'taxonomies'          => array( 'cat_service' ),
        ] );
    }

    function add_custom_taxonomies() {

        register_taxonomy(
            'cat_service', 
            ['service'], 
            array(
                'public'                => true,
                'show_in_nav_menus'     => true, // равен аргументу public
                'show_ui'               => true, // равен аргументу public
                'show_tagcloud'         => true, // равен аргументу show_ui
                'hierarchical'          => true,
                'show_admin_column'     => true,
                'labels' => array(
                    'name' => _x( 'Категории', 'taxonomy general name' ),
                    'singular_name' => _x( 'Категория', 'taxonomy singular name' ),
                    'search_items' =>  __( 'Поиск Категории' ),
                    'all_items' => __( 'Все Категории' ),
                    'parent_item' => __( 'Родительская Категория' ),
                    'parent_item_colon' => __( 'Родительская Категория:' ),
                    'edit_item' => __( 'Edit Категория' ),
                    'update_item' => __( 'Обновить Категорию' ),
                    'add_new_item' => __( 'Добавить новую Категорию' ),
                    'new_item_name' => __( 'Новое имя Категории' ),
                    'menu_name' => __( 'Категории' ),
                ),
                'rewrite' => array(
                    'slug' => 'cat-services', // This controls the base slug that will display before each term
                    'with_front' => true, // Don't display the category base before "/locations/"
                    'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
                ),
            )
        );
    }

} 