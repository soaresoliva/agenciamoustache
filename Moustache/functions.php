<?php

	//configurações do tema
	function Tema_setup(){

		remove_action('wp_head', 'wp_generator');
		add_theme_support( 'automatic-feed-links' );
		add_theme_support('post-thumbnails');
		add_theme_support( 'title-tag' );
		add_theme_support(' widgets ');
		add_theme_support('menus');
		add_theme_support( 'custom-logo' );

		add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        register_nav_menus( array(
			'nav-top' => 'Header Menu',
			'nav-footer' => 'Footer Menu'
		) );

		add_image_size( 'custom-size', 391, 147, true );
		add_theme_support( 'customize-selective-refresh-widgets' );
	}

	add_action('after_setup_theme', 'Tema_setup');

	//opções do tema
	function tema_settings( $wp_customize ){

		//painel
		$wp_customize->add_panel( 'general_settings', array(
			'priority'       => 125,
			'capability'     => 'edit_theme_options',
			'title'      => __('Configurações Gerais', 'temaSite'),
		) );

		//sessão
		$wp_customize->add_section( 'footer_section' , array(
			'title'      => __('Footer', 'temaSite'),
			'panel'  => 'general_settings',
			'priority'   => 4,
	   	) );


	   	$wp_customize->add_section( 'home_section' , array(
			'title'      => __('Home', 'temaSite'),
			'panel'  => 'general_settings',
			'priority'   => 4,
	   	) );

	   	//itens
		$wp_customize->add_setting( 'footer_copyright', array( 'default' => '#' , 'type' => 'option' ) );
		$wp_customize->add_control(	'footer_copyright', 
			array(
				'label'    => __( 'Texto Copyright', 'temaSite' ),
				'section'  => 'footer_section',
				'type'     => 'text',
		));


		$wp_customize->add_setting( 'titulo_sessao_1', array( 'default' => '#' , 'type' => 'option' ) );
		$wp_customize->add_control(	'titulo_sessao_1', 
			array(
				'label'    => __( 'título da Sessão 1', 'temaSite' ),
				'section'  => 'home_section',
				'type'     => 'text',
		));


		$wp_customize->add_setting( 'titulo_sessao_2', array( 'default' => '#' , 'type' => 'option' ) );
		$wp_customize->add_control(	'titulo_sessao_2', 
			array(
				'label'    => __( 'título da Sessão 2', 'temaSite' ),
				'section'  => 'home_section',
				'type'     => 'text',
		));

		$wp_customize->add_setting( 'conteudo_banner', array( 'default' => '#' , 'type' => 'option' ) );
		$wp_customize->add_control(	'conteudo_banner', 
			array(
				'label'    => __( 'Conteúdo do banner', 'temaSite' ),
				'section'  => 'home_section',
				'type'     => 'textarea',
		));

		$wp_customize->add_setting( 'image_banner', array( 'default' => '#' , 'type' => 'option' ) );
		$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'image_banner', 
			array(
			  'label' => __( 'Imagem Banner', 'temaSite' ),
			  'section' => 'home_section',
			  'mime_type' => 'image',
			) ) );
	}

	add_action( 'customize_register', 'tema_settings' );

	//widgets do tema
	function tema_widgets()
	{
		register_sidebar( array(
			'name'          => 'Footer col 1',
			'before_widget' => '<div id="%1$s" class="footer-item widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4><span class="divisa"></span>',
		) );

		register_sidebar( array(
			'name'          => 'Footer col 2',
			'before_widget' => '<div id="%1$s" class="footer-item widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4><span class="divisa"></span>',
		) );

		register_sidebar( array(
			'name'          => 'Footer col 3',
			'before_widget' => '<div id="%1$s" class="footer-item widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4><span class="divisa"></span>',
		) );
	}

	add_action( 'widgets_init', 'tema_widgets' );


	//CSS E JS
	function tema_scripts()
	{
		wp_enqueue_style( 'tema-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap', array(), null );
		wp_enqueue_style( 'tema-normalize', get_template_directory_uri() . '/css/normalize.css' );
		wp_enqueue_style( 'tema-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
		wp_enqueue_style( 'tema-aos', get_template_directory_uri() . '/css/aos.css' );
		wp_enqueue_style( 'tema-owl', get_template_directory_uri() . '/css/owl.carousel.min.css' );
		wp_enqueue_style( 'tema-owl-theme', get_template_directory_uri() . '/css/owl.theme.default.min.css' );
		wp_enqueue_style( 'tema-style', get_stylesheet_uri());

		wp_enqueue_script( 'tema-jquery', get_template_directory_uri() . '/js/jquery-3.1.1.min.js', array(), '', true );
		wp_enqueue_script( 'tema-jquery-migrate', get_template_directory_uri() . '/js/jquery-migrate-1.4.1.min.js', array(), '', true );
		wp_enqueue_script( 'tema-popper', get_template_directory_uri() . '/js/popper.min.js', array(), '', true );
		wp_enqueue_script( 'tema-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '', true );
		wp_enqueue_script( 'tema-aos', get_template_directory_uri() . '/js/aos.js', array(), '', true );
		wp_enqueue_script( 'tema-owl', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '', true );
		wp_enqueue_script( 'tema-nav', get_template_directory_uri() . '/js/jquery.nav.js', array(), '', true );
		wp_enqueue_script( 'tema-maskedinput', get_template_directory_uri() . '/js/jquery.maskedinput.min.js', array(), '', true );
		wp_enqueue_script( 'tema-custom', get_template_directory_uri() . '/js/custom.js', array(), '', true );
	}

	add_action( 'wp_enqueue_scripts', 'tema_scripts' );
?>