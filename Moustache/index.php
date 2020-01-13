<?php  get_header(); ?>
<main class="main-content" id="home">
	<!--  BANNER -->
	<section class="section-block banner-block">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="slogan-content">
						<?php if(get_option('conteudo_banner')) : ?>
							<?php echo get_option('conteudo_banner'); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- END BANNER -->

	<!-- CONTEUDO INTERNO -->
	<section class="section-block conteudo-block" id="conteudointerno">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-title" data-aos="fade-up">
						<?php if(get_option('titulo_sessao_1')) : ?>
							<h2 class="text-center"><?php echo get_option('titulo_sessao_1'); ?></h2>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="owl-carousel owl-theme">
						<?php while ( have_posts() ) : the_post() ?>
						<!--  CAROUSEL ITEM -->
						<div class="item">
							<div class="card-box">
								<span class="card-category">
									<?php $categories = get_the_category(); ?>
									<?php if ( ! empty( $categories ) ) { ?>
										<a href="<?php the_field('home_link_externo');?>" target="_blank"><?php echo esc_html( $categories[0]->name ); ?></a>
									<?php } ?>
								</span>
								<figure class="card-image">
									<?php echo get_the_post_thumbnail( get_the_ID(), 'custom-size', array( 'class' => 'img-fluid' ) ); ?>
								</figure>
								<div class="card-body">
									<h3 class="card-title">
										<a href="<?php the_field('home_link_externo');?>" target="_blank"><?php the_title(); ?></a>
									</h3>
									<p class="card-intro"><?php echo wp_strip_all_tags( get_the_excerpt(), true ); ?></p>

									<a href="<?php the_field('home_link_externo');?>" class="btn card-link hover-zoom" target="_blank"><?php the_field('home_texto_button');?></a>
								</div>
							</div>
						</div>
						<!--  END CAROUSEL ITEM -->
						<?php endwhile; ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="carousel-mavigator">
						<a href="#" class="prevSlider seta"><</a>
						<span class="dots" id="dotsCarousel">
						</span>
						<a href="#" class="nextSlider seta">></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- END CONTEUDO INTERNO -->


	<!-- FORMULARIO -->
	<section class="section-block form-block"  id="faleconosco" >
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-title" data-aos="fade-up">
						<?php if(get_option('titulo_sessao_2')) : ?>
							<h2 class="text-center"><?php echo get_option('titulo_sessao_2'); ?></h2>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="form-content" data-aos="fade-up">
						<?php echo do_shortcode( '[contact-form-7 id="9" title="Formulário da Home"]' ); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- END FORMULARIO -->

</main>
<?php get_footer(); ?>