<?php
/*
 * ----------------------
 * Footer Theme nipoto
 * ----------------------
 */
/* The footer widget area is triggered if any of the areas
   * have widgets. So let's check that first.
   *
   * If none of the sidebars have widgets, then let's bail early.
   */

get_template_part('template-parts/footer/footer');
wp_footer();
