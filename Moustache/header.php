<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta http-equiv="Content-Language" content="pt-br">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="" />
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<?php wp_head(); ?>
</head>
<body>
<h1 class="title-seo"><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></h1>


<!--  HEADER -->
<header class="main-header">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php 
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
				?>
				<a href="<?php echo home_url( '/' ); ?>" title="<?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?>"><img src="<?php echo $image[0] ?>" alt="<?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?>" title="<?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?>" class="img-logo"></a>

				<div class="search-box">
					<input type="search" name="s" id="s" required="required" class="input-buscar" placeholder="Buscar" data-url="<?php echo get_template_directory_uri(); ?>/getBusca.php">
					<input type="image" src="<?php echo get_template_directory_uri(); ?>/img/ico_search.png" name="" alt="Enviar" class="btn-buscar">
					<div class="result-search">
						<div class="result-search-content">
							
						</div>
					</div>
				</div>

				<button class="btn btn-link btn-menu-mobile d-md-none p-0 ml-3" type="button" data-toggle="collapse" data-target=".main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Mostrar menu"><svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 30 30" width="30" height="30" focusable="false"><title>Menu</title><path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"/></svg>
				</button>
				<?php 
			        wp_nav_menu( array(
						'theme_location' => 'nav-top',
						'container' => 'nav',
						'container_class' => 'main-menu  collapse',
						'menu_class' => 'nav-main'
					)); 
			    ?>
			</div>
		</div>
	</div>
</header>
<!--  END HEADER -->