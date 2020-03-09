<?php /*Template Name: content-atelier*/
get_header();
?>


<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
			
			if( is_category('atelier')){

			get_template_part( 'content', 'atelier' );
		}else{
			get_template_part( 'content', get_post_format() );
		}

		endwhile; // End of the loop.


		echo '<h2>'.category_description( get_category_by_slug( 'atelier')).'</h2>';

/////////////////// QUERY///////////////////////
$argsAtelier = array(
	"category_name" => "atelier",
	"post_per_page"=>-1,
	"orderby"=> "post_name",
	"order"=>"ASC"
);

$queryAtelier = new WP_Query($argsAtelier);

$i = 0;

echo "<div class = 'grilleEvenement'>";

// LA BOUCLE
while ( $queryAtelier->have_posts() ) {
	$queryAtelier->the_post();

	$postName = get_post_field('post_name');

	$heure = substr($postName, -2);

	$heure = ($heure - 6);

	$auteur = get_the_author_meta( "display_name", $post->post_author );

	$colonne = 0;

	switch ($auteur){
		case "Luna":
			$colonne = 1;
		break;
		case "Eddy":
			$colonne = 2;
		break;
		case "Derick":
			$colonne = 3;
		break;
		case "Maybell":
			$colonne = 4;
		break;
	}

	$gridArea = $heure . "/" . $colonne . "/" . ($heure+2)  . "/" . ($colonne+1);

	echo "<div class = 'unAtelier' style = grid-area:".$gridArea.">";


	echo '<p><b>'. get_the_title() .'</b></p>';

	echo '<p>'. get_post_field('post_name') .'</p>';

	echo '<p>'. get_the_author_meta( "display_name", $post->post_author ) .'</p>';

	
	echo "</div>";

};

echo "</div>";

wp_reset_postdata();

?>
        </main><!-- #main -->
        </div><!-- #primary -->
    
    <?php
    get_sidebar();
    get_footer();