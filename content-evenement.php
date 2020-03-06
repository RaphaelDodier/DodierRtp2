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
    'date_query' => array(
        array(
            'after' => '2019-09-01',
            'before' => '2019-11-30',
            'inclusive' => true,
        ),
    ),
);

 
 
//  The 3rd Query (without global var) 
$query3 = new WP_Query( $args3 );
 
// The 3rd Loop
while ( $query3->have_posts() ) {
    $query3->the_post();
    echo '<h3><a href='. get_the_permalink() .'>'. get_the_title($query3->post->ID) .'</a> - '. get_the_date('Y-m-d') .'</h3>';

}
 
// Restore original Post Data
wp_reset_postdata();
 
?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();