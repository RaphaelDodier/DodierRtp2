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
	"post_per_page"=>10
);

$queryAtelier = new WP_Query($argsAtelier);

$i = 0;

// LA BOUCLE
while ( $queryAtelier->have_posts() ) {
    $queryAtelier->the_post();
    $i = $i+1;
    echo '<p>'.$i.'. '. get_the_title() .'</p>';
            
};

wp_reset_postdata();

?>
        </main><!-- #main -->
        </div><!-- #primary -->
    
    <?php
    get_sidebar();
    get_footer();