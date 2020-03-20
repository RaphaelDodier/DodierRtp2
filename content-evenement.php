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
    'post_status' => 'future',
    'date_query' => array(
        array(
            'after' => '2020-04-01',
            'before' => '2020-06-30',
            'inclusive' => true,
        ),
    ),
);

 
 
//  The 3rd Query (without global var) 
$query3 = new WP_Query( $args3 );
 
echo "<div class = 'grilleEvenement'>";

// The 3rd Loop
while ( $query3->have_posts() ) {
    $query3->the_post();
    $jour = get_the_date('j');
    $mois = (int)get_the_date('m');
    $gridArea = $jour . '/' . (($mois+2)%3+1) . '/' . ($jour+1) . '/' . ((($mois+2)%3+1)+1);

    echo '<h3 style ="border:white 1px solid;grid-area:'. $gridArea.'"><a href='. get_the_permalink() .'>'. get_the_title($query3->post->ID) .'</a> - '. get_the_date('Y-m-d') .' - Grid-area'.$gridArea.'</h3>';

}
 
echo "</div>";

// Restore original Post Data
wp_reset_postdata();
 
?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();