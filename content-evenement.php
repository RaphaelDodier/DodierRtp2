<?php /*Template Name: content-evenement*/
get_header();
?>

<!-- ///////////////////////     FRONT-PAGE  /////////////////// -->
<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
            the_post();

			get_template_part( 'template-parts/content', 'page' );
        //    echo get_the_title();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
        

/////////////////////////////////////////////// EVENEMENT ///////////////////////////////////////////////////

$args3=array(
    "category_name" =>"evenement",
    "posts_per_page"=> 10
);

 
 
//  The 2nd Query (without global var) 
$query3 = new WP_Query( $args3 );
 
// The 2nd Loop
while ( $query3->have_posts() ) {
    $query3->the_post();
    echo '<h2>' . get_the_title( $query3->post->ID ) . '</h2>';
    echo '<p>' . substr(get_the_excerpt(),0,200) . '</p>';

}
 
// Restore original Post Data
wp_reset_postdata();
 
?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();