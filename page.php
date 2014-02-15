<div class="debug"><?php echo(__FILE__); ?></div>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/parts/content', 'page'); ?>
<?php endwhile; ?>
