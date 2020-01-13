<footer class="main-footer" >
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-4">
				<?php if( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer col 1') ) : ?>
				<?php endif; ?>
			</div>
			<div class="col-12 col-md-4">
				<?php if( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer col 2') ) : ?>
				<?php endif; ?>
			</div>
			<div class="col-12 col-md-4">
				<?php if( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer col 3') ) : ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="rodape">
		<div class="container-fluid ">
			<div class="row">
				<div class="col-12 col-md-6">
					<?php if(get_option('footer_copyright')) : ?>
						<p class="footer-copyright"><?php echo get_option('footer_copyright'); ?></p>
					<?php endif; ?>
				</div>

				<div class="col-12 col-md-6">
					<?php 
				        wp_nav_menu( array(
							'theme_location' => 'nav-footer',
							'container' => 'nav',
							'container_class' => 'nav-footer'
						)); 
				    ?>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>