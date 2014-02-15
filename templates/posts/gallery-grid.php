<?php
/**
 * Name:                Xxxx
 * Description:         xxx
 *
 * Revision date:       1.0.0
 * Since:               11.3.14 19:11
 * Compatibility WP:    based on WordPress 3.8
 * Compatibility PHP:   PHP 5.3
 *
 * Author:              Tomas Hrda | hrda@3dtomato.com
 * Author URI:          http://3dtomato.com
 * License:
 * License URI:
 */

use \tomato\Wordpress\General\Images_Collection;

// DEFINE VARS --------------------------------------------------------------------------------
$post_id = $post->ID;
$post_title = $post->post_title;
$images_html = '';

//comments_template('/templates/parts/comments.php');

// BUILD IMAGES --------------------------------------------------------------------------------
{
  $collection = new Images_Collection($post_id);
  foreach ($collection->imagesCollection as &$img_data) {

    $img_html = $img_data->html;
    //\tomato\Wordpress\General\Helper::debug_print($img_data, '$img_data', true );

    $images_html .= "
        <a  class='XXXhisrc'
            href='" . $img_html['img_full_url'] . "'
            title='" . $img_html['img_title'] . "'
            target='_blank'>

            <img id='" . $img_html['css_id'] . "'
                 class='gallery_image_thumbnail'
                 data-post-id='" . $img_html['att_post_id'] . "'
                 title='" . $img_html['img_title'] . "'
                 alt='" . $img_html['alt'] . "'

                 src='" . $img_html['img_thumbnail_url'] . "'

                 width='" . $img_html['img_thumbnail_w'] . "'
                 height='" . $img_html['img_thumbnail_h'] . "'
            >
        </a>
        ";
  }
}


// ECHO SITE --------------------------------------------------------------------------------

/*
 * GALLERY
 */

?>
<h1><?php echo $post_title ?></h1>
<div id='gallery_container'>
  <?php echo $images_html ?>
</div>
<?php

/*
 * COMMENTS
 */
//if (comments_open() || get_comments_number()) {
//    comments_template();
//    require(__DIR__ . '/../parts/comments.php');
//}
?>
