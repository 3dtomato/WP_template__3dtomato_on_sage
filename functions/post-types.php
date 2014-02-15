<?php
/**
 * Created by PhpStorm.
 * User: Tomas
 * Date: 8. 6. 2015
 * Time: 0:57
 */

use \tomato\Wordpress\Post_Types\Post_Type_Gallery;

$prefix_css_id__meta_box = TOMATO_PREFIX_META . 'box__';    // "twp_meta__box__"
$prefix_css_id__meta_form = TOMATO_PREFIX_META . 'form__';  // "twp_meta__form__"

/*----------------------------------------------------------------------------------------------------------------------
                                                  PHOTO GALLERY
----------------------------------------------------------------------------------------------------------------------*/

/**
 * Create Photo Gallery post type
 */
$post__ph_gallery__name_base = 'ph_gallery';
$post__ph_gallery = new Post_Type_Gallery($post__ph_gallery__name_base);

/*
 * Add meta boxes - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
 */
/**
 * Add meta box: Template
 * Set the template file of the current gallery.
 */
//$metaBox_templateOptions =
$post__ph_gallery->addMetaBox_templateOptions(
    [
//        [
//            'label' => 'Photo Gallery - Simple scroll - Vertical',
//            'value' => 'gallery-simple_scroll_vertical.php'
//        ],
//        [
//            'label' => 'Photo Gallery - Simple scroll - Horizontal',
//            'value' => 'gallery-simple_scroll_horizontal.php'
//        ],
        [
            'label' => 'Photo Gallery - Grid',
            'value' => 'gallery-grid.php'
        ],
        [
            'label' => 'Photo Gallery - Slideshow 1',
            'value' => 'gallery-slideshow_1.php'
        ]
    ]
);

$post__ph_gallery->addMetaBox_photosCollection();


/**
 * Add meta box: Photos
 * Set the photos of current photo gallery.
 */

/*
 * Add taxonomy - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
 */

/**
 * Add taxonomy: photographer
 */
$post__ph_gallery__tax = $post__ph_gallery->addTaxonomyToPostType(
    [
        [
            'tax_key' => TOMATO_PREFIX_TAX . 'photographer',
            'names' => ['name_singular' => 'Photographer', 'name_plural' => 'Photographers'],
            'args' => ['hierarchical' => false]
        ]
    ]
);