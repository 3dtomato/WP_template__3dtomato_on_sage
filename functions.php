<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
    'functions/utils.php',                 // Utility functions
    'functions/init.php',                  // Initial theme setup and constants
    'functions/wrapper.php',               // Theme wrapper class
    'functions/conditional-tag-check.php', // ConditionalTagCheck class
    'functions/config.php',                // Configuration
    'functions/assets.php',                // Scripts and stylesheets
    'functions/titles.php',                // Page titles
    'functions/extras.php',                // Custom functions
    'functions/post-types.php',            // Custom post types
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
