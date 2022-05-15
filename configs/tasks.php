<?php
return array(
    array(
        'id' => 'your_task_id',
        'format' => 'html',
        'type' => 'url',
        'source_cms' => 'general',
        'url_validator' => true,
        'data_rules' => array(
            'title' => array(
                'type'    => 'xpath',
                'pattern' => '.product-view h1.title-product, #blog-info h1.blog-title',
            ),
            'seo_title' => array(
                'type'    => 'xpath',
                'pattern' => 'title',
                'get'     => 'text',
            ),
            'seo_description' => array(
                'type'      => 'xpath',
                'pattern'   => 'meta[name="description"]',
                'get'       => 'attribute',
                'attribute' => 'content',
            ),
            'product_content' => array(
                'type'    => 'xpath',
                'pattern' => '#tab-description',
                'get'     => 'innerHtml',
            ),
            'product_attributes' => array(
                'type'    => 'xpath',
                'pattern' => '#tab-specification',
                'get'     => 'innerHtml',
            ),
            'product_price' => array(
                'type'      => 'regex',
                'pattern'   => '/\"price\":\s?\"([^\"]+)/',
                'group'     => 1,
                'callbacks' => array(
                    'str_replace' => array( array( '.' ), '', '%%argument%%' ),
                ),
            ),
            'product_metas' => array(
                'type'    => 'xpath',
                'pattern' => '.product-view > ul.list-unstyled li',
                'get'     => 'innerHtml',
                'return'  => 'array',
            ),
            'categories' => array(
                'type'    => 'xpath',
                'pattern' => '.breadcrumbs .breadcrumb-links li a, #page .breadcrumb li a, .breadcrumbs .breadcrumb-links li a',
                'get'     => 'text',
                'return'  => 'array',
            ),
            'coverImage' => array(
                'type'      => 'xpath',
                'pattern'   => 'meta[property="og:image"]',
                'get'       => 'attribute',
                'attribute' => 'content',
            ),
            'galleryImages' => array(
                'type'      => 'xpath',
                'pattern'   => '#image-additional-carousel a',
                'get'       => 'attribute',
                'attribute' => 'href',
                'return'    => 'array',
            )
        ),
        'sources' => array(
            array(
                'type' => 'sitemap',
                'url' => 'https://the-opencart-site/sitemap.xml',
            )
        )
    )
);
