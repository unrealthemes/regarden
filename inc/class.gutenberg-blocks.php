<?php

class UT_Guneberg_Blocks {

    private static $_instance = null; 

    static public function get_instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {

        add_filter( 'block_categories_all', [$this, 'filter_block_categories_when_post_provided'], 10, 2 );
        add_action( 'acf/init', [$this, 'acf_init_block_types'] );
    }

    public function filter_block_categories_when_post_provided( $block_categories, $editor_context ) {

        if ( ! empty( $editor_context->post ) ) {
            array_push(
                $block_categories,
                array(
                    'slug'  => 'regarden',
                    'title' => 'Regarden',
                    'icon'  => 'regarden',
                )
            );
        }
        return $block_categories;
    }

    public function acf_init_block_types() {

        // Check function exists.
        if ( function_exists('acf_register_block_type') ) {
    
            acf_register_block_type([
                'name'              => 'contact-form',
                'title'             => 'Контактная форма',
                // 'description'       => __('A custom contact-form.'),
                'render_template'   => 'template-parts/blocks/contact-form.php',
                'category'          => 'regarden',
                'icon'              => 'regarden',
                'keywords'          => [ 'Контактная форма' ],
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'is_preview' => true
                        ]
                    ]
                ]
            ]);

            acf_register_block_type([
                'name'              => 'text',
                'title'             => 'Текстовый блок',
                // 'description'       => __('A custom text.'),
                'render_template'   => 'template-parts/blocks/text.php',
                'category'          => 'regarden',
                'icon'              => 'regarden',
                'keywords'          => [ 'Текстовый блок' ],
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'is_preview' => true
                        ]
                    ]
                ]
            ]);

            acf_register_block_type([
                'name'              => 'about',
                'title'             => 'О компании',
                // 'description'       => __('A custom about.'),
                'render_template'   => 'template-parts/blocks/about.php',
                'category'          => 'regarden',
                'icon'              => 'regarden',
                'keywords'          => [ 'О компании' ],
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'is_preview' => true
                        ]
                    ]
                ]
            ]);
            
            acf_register_block_type([
                'name'              => 'contacts',
                'title'             => 'Контакты',
                // 'description'       => __('A custom contacts.'),
                'render_template'   => 'template-parts/blocks/contacts.php',
                'category'          => 'regarden',
                'icon'              => 'regarden',
                'keywords'          => [ 'Контакты' ],
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'is_preview' => true
                        ]
                    ]
                ]
            ]);
            
            acf_register_block_type([
                'name'              => 'requisites',
                'title'             => 'Реквизиты',
                // 'description'       => __('A custom requisites.'),
                'render_template'   => 'template-parts/blocks/requisites.php',
                'category'          => 'regarden',
                'icon'              => 'regarden',
                'keywords'          => [ 'Реквизиты' ],
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'is_preview' => true
                        ]
                    ]
                ]
            ]);
            
            acf_register_block_type([
                'name'              => 'main-banner',
                'title'             => 'Баннер',
                // 'description'       => __('A custom main-banner.'),
                'render_template'   => 'template-parts/blocks/main-banner.php',
                'category'          => 'regarden',
                'icon'              => 'regarden',
                'keywords'          => [ 'Баннер' ],
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'is_preview' => true
                        ]
                    ]
                ]
            ]);
            
            acf_register_block_type([
                'name'              => 'faq',
                'title'             => 'Вопрос-Ответ',
                // 'description'       => __('A custom faq.'),
                'render_template'   => 'template-parts/blocks/faq.php',
                'category'          => 'regarden',
                'icon'              => 'regarden',
                'keywords'          => [ 'Вопрос', 'Ответ' ],
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'is_preview' => true
                        ]
                    ]
                ]
            ]);
            
            acf_register_block_type([
                'name'              => 'gallery-category',
                'title'             => 'Галерея (с категориями)',
                // 'description'       => __('A custom gallery-category.'),
                'render_template'   => 'template-parts/blocks/gallery-category.php',
                'category'          => 'regarden',
                'icon'              => 'regarden',
                'keywords'          => [ 'Галерея' ],
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'is_preview' => true
                        ]
                    ]
                ]
            ]);
            
            acf_register_block_type([
                'name'              => 'gallery',
                'title'             => 'Галерея',
                // 'description'       => __('A custom gallery.'),
                'render_template'   => 'template-parts/blocks/gallery.php',
                'category'          => 'regarden',
                'icon'              => 'regarden',
                'keywords'          => [ 'Галерея' ],
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'is_preview' => true
                        ]
                    ]
                ]
            ]);
            
            acf_register_block_type([
                'name'              => 'table',
                'title'             => 'Таблицы (с сайдбаром)',
                // 'description'       => __('A custom table.'),
                'render_template'   => 'template-parts/blocks/table.php',
                'category'          => 'regarden',
                'icon'              => 'regarden',
                'keywords'          => [ 'Таблицы' ],
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'is_preview' => true
                        ]
                    ]
                ]
            ]);
            
            acf_register_block_type([
                'name'              => 'table-post',
                'title'             => 'Таблицы',
                // 'description'       => __('A custom table-post.'),
                'render_template'   => 'template-parts/blocks/table-post.php',
                'category'          => 'regarden',
                'icon'              => 'regarden',
                'keywords'          => [ 'Таблицы' ],
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'is_preview' => true
                        ]
                    ]
                ]
            ]);
            
            acf_register_block_type([
                'name'              => 'services',
                'title'             => 'Услуги',
                // 'description'       => __('A custom services.'),
                'render_template'   => 'template-parts/blocks/services.php',
                'category'          => 'regarden',
                'icon'              => 'regarden',
                'keywords'          => [ 'Услуги' ],
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'is_preview' => true
                        ]
                    ]
                ]
            ]);
            
            acf_register_block_type([
                'name'              => 'articles',
                'title'             => 'Статьи',
                // 'description'       => __('A custom articles.'),
                'render_template'   => 'template-parts/blocks/articles.php',
                'category'          => 'regarden',
                'icon'              => 'regarden',
                'keywords'          => [ 'Статьи' ],
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'is_preview' => true
                        ]
                    ]
                ]
            ]);
            
            acf_register_block_type([
                'name'              => 'video',
                'title'             => 'Видео',
                // 'description'       => __('A custom video.'),
                'render_template'   => 'template-parts/blocks/video.php',
                'category'          => 'regarden',
                'icon'              => 'regarden',
                'keywords'          => [ 'Видео' ],
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'is_preview' => true
                        ]
                    ]
                ]
            ]);
            
            acf_register_block_type([
                'name'              => 'team',
                'title'             => 'Команда',
                // 'description'       => __('A custom team.'),
                'render_template'   => 'template-parts/blocks/team.php',
                'category'          => 'regarden',
                'icon'              => 'regarden',
                'keywords'          => [ 'Команда' ],
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'is_preview' => true
                        ]
                    ]
                ]
            ]);
            
            acf_register_block_type([
                'name'              => 'documents',
                'title'             => 'Документы (с категориями)',
                // 'description'       => __('A custom documents.'),
                'render_template'   => 'template-parts/blocks/documentscategory.php',
                'category'          => 'regarden',
                'icon'              => 'regarden',
                'keywords'          => [ 'Документы' ],
                'example'           => [
                    'attributes' => [
                        'mode' => 'preview',
                        'data' => [
                            'is_preview' => true
                        ]
                    ]
                ]
            ]);

        }
    }

} 