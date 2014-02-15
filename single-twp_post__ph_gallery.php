<?php
/**
 * Created by PhpStorm.
 * User: Tomas
 * Date: 12. 6. 2015
 * Time: 19:09
 */

use \tomato\Wordpress\General\Post_Template_Helper;

?>

<h1>twp_post__ph_gallery</h1>

<?php

// Get gallery sub template
$t_helper = new Post_Template_Helper(get_the_ID(), 'twp_meta__ph_gallery__template', '/posts');
get_template_part($t_helper->getTemplateFolder() . $t_helper->getTemplateSlug(), $t_helper->getTemplateName());


?>
