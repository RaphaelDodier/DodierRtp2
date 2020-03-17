<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores
 */

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
        
        

/////////////////////////////////////////////// CONFÉRENCE ///////////////////////////////////////////////////
echo '<h2>'.category_description( get_category_by_slug( 'conference')).'</h2>';
 
// The Query
$args = array(
    "category_name" =>"conference",
    "posts_per_page"=> 3,
    // "orderby" => "date",
    // "order" => "ASC"
);
$query1 = new WP_Query( $args );
 
// The Loop
while ( $query1->have_posts() ) {
    $query1->the_post();
    echo '<div class="conference">';
    the_post_thumbnail("thumbnail");
        echo '<div class="conferenceTexte">';
            echo '<h3><a href='. get_the_permalink() .'>'. get_the_title() . '</a> ' . get_the_date('Y-m-d') . '</h3>';
            echo '<p>' . substr(get_the_excerpt(),0,200) . '</p>';
            echo '</div>';
    echo '</div>';
};
 
/* Restore original Post Data 
 * NB: Because we are using new WP_Query we aren't stomping on the 
 * original $wp_query and it does not need to be reset with 
 * wp_reset_query(). We just need to set the post data back up with
 * wp_reset_postdata().
 */
wp_reset_postdata();


/////////////////////////////////////////////// NOUVELLE ///////////////////////////////////////////////////
echo '<h2>'.category_description( get_category_by_slug( 'nouvelle')).'</h2>';
 
// The Query
$args2 = array(
    "category_name" =>"nouvelle",
    "posts_per_page"=> 3,
    // "orderby" => "date",
    // "order" => "ASC"
);
$query2 = new WP_Query( $args2 );
 
// The Loop
echo '<div class="nouvelles">';
while ( $query2->have_posts() ) {
    $query2->the_post();
    echo '<div class="uneNouvelles">';
    echo '<h3><a href='. get_the_permalink() .'>'. get_the_title() .'</a></h3>';
    // echo '<h3><a href='. get_the_permalink() .'>'. get_the_title() . '</a> ' . get_the_date('Y-m-d') . '</h3>';
    the_post_thumbnail("thumbnail");
    echo '</div>';
};
echo '</div>';
 
/* Restore original Post Data 
 * NB: Because we are using new WP_Query we aren't stomping on the 
 * original $wp_query and it does not need to be reset with 
 * wp_reset_query(). We just need to set the post data back up with
 * wp_reset_postdata().
 */
wp_reset_postdata();

 
?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();