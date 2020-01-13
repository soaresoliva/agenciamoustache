<?php
include_once("../../../wp-config.php"); 
$s =  $_GET["s"];
$query = new WP_Query( array( 's' => $s));

if ( $query->have_posts() ) {
	$qtd = 0;
	while ( $query->have_posts() ) {
		$query->the_post();
		$link  = get_field('home_link_externo');
?>
		<div class="row">
			<div class="col-12 col-md-10">
				<h4><a href="<?php echo $link; ?>"><?php echo get_the_title(); ?></a></h4>
				<p><a href="<?php echo $link; ?>"><?php echo wp_strip_all_tags( get_the_excerpt(), true ); ?></a></p>
				<hr />
			</div>
		</div>
<?php
		
	}
}
wp_reset_postdata();
?>
<p class="close-search text-center"><a href="#">X FECHAR</a></p>