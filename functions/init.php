<?php

namespace Roots\Sage\Init;

use Roots\Sage\Assets;

/*---------------------------------------------------------------------------------------------------------------------
                                                  CONSTANTS
---------------------------------------------------------------------------------------------------------------------*/
/**
 * Zapnutí/vypnutí debugovací funkce \tomato\Wordpress\General\Helper::debug_print()
 *
 * Boolean: true = 'on' || false = 'off'
 */
define('TOMATO_DEBUG', false);

/**
 * Prefix používaný ve funkcích a třídách pro taxonomie, meta a další objekty.
 * Slouží pro odlišení od objektů cizých pluginů, šablon atd. Zamezezuje případným konfliktů způsoboných stejným názvem.
 *
 * String
 */
define('TOMATO_PREFIX', 'twp_');

/**
 * Important DIR paths and URL
 */

// folder names
define('TOMATO_DIR_NAME__LIBRARY', 'lib');
define('TOMATO_DIR_NAME__LIBRARY_THEME', 'lib_theme');
define('TOMATO_DIR_NAME__TEMPLATES', 'templates');

// folders path
define('TOMATO_DIR__THEME', get_template_directory());
define('TOMATO_DIR__LIBRARY', TOMATO_DIR__THEME . '/' . TOMATO_DIR_NAME__LIBRARY); // "/lib"
define('TOMATO_DIR__LIBRARY_THEME', TOMATO_DIR__THEME . '/' . TOMATO_DIR_NAME__LIBRARY_THEME); // "/lib_theme"
define('TOMATO_DIR__TEMPLATES', TOMATO_DIR__THEME . '/' . TOMATO_DIR_NAME__TEMPLATES); // "/templates"

define('TOMATO_PREFIX_POST', TOMATO_PREFIX . 'post__');     // "twp_post__"
define('TOMATO_PREFIX_TAX', TOMATO_PREFIX . 'tax__');       // "twp_tax__"
define('TOMATO_PREFIX_META', TOMATO_PREFIX . 'meta__');     // "twp_meta__"
/**
 * Tomato autoload function to load classes
 *
 * Loads classes from
 *      TOMATO_DIR__LIBRARY/tomato
 * or
 *      TOMATO_DIR__LIBRARY_THEME/tomato
 */
require_once(TOMATO_DIR__LIBRARY . '/tomato/autoload-class.php');


/*---------------------------------------------------------------------------------------------------------------------
                                                 THEME SETUP
---------------------------------------------------------------------------------------------------------------------*/
/**
 * Theme setup
 */
function setup()
{
  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/sage-translations
  load_theme_textdomain('sage', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus([
      'primary_navigation' => __('Primary Navigation', 'sage')
  ]);

  // Add post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');

  // Add post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

  // Add HTML5 markup for captions
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list']);

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style(Assets\asset_path('styles/editor-style.css'));
}

add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

/**
 * Register sidebars
 */
function widgets_init()
{
  register_sidebar([
      'name' => __('Primary', 'sage'),
      'id' => 'sidebar-primary',
      'before_widget' => '<section class="widget %1$s %2$s">',
      'after_widget' => '</section>',
      'before_title' => '<h3>',
      'after_title' => '</h3>'
  ]);

  register_sidebar([
      'name' => __('Footer', 'sage'),
      'id' => 'sidebar-footer',
      'before_widget' => '<section class="widget %1$s %2$s">',
      'after_widget' => '</section>',
      'before_title' => '<h3>',
      'after_title' => '</h3>'
  ]);
}

add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');
