<?php

$this->start_controls_section(
	'5_banner_section',
	[
		'label'     => __( 'Banner', 'webteck' ),
		'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition'	=> ['layout_style' => ['layout_three']]
	]
);
$this->add_control(
	'overlay2',
	[
		'label' 		=> esc_html__( 'Bg', 'webteck' ),
		'type' 			=> \Elementor\Controls_Manager::MEDIA,
		'default' 		=> [
			'url' =>  \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);
$repeater = new \Elementor\Repeater();

$repeater->add_control(
	'title', [
		'label' 		=> __( 'Title', 'webteck' ),
		'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
		'default' 		=> __( 'Safe Cleaning Supplies' , 'webteck' ),
		'rows' 			=> 2,
		'label_block' 	=> true,
	]
);

$repeater->add_control(
	'button_text',
	[
		'label' 	=> esc_html__( 'Button Text', 'webteck' ),
        'type' 		=> \Elementor\Controls_Manager::TEXT,
        'default'  	=> esc_html__( 'Choose Plan', 'webteck' ),
	]
);

$repeater->add_control(
	'button_link',
	[
		'label' 		=> esc_html__( 'Link', 'webteck' ),
		'type' 		=> \Elementor\Controls_Manager::TEXT,
		'placeholder' 	=> esc_html__( 'https://your-link.com', 'webteck' ),
		'show_external' => true,
	]
);

$repeater->add_control(
	'button_text2',
	[
		'label' 	=> esc_html__( 'Button Text 2', 'webteck' ),
        'type' 		=> \Elementor\Controls_Manager::TEXT,
        'default'  	=> esc_html__( 'Choose Plan', 'webteck' ),
	]
);

$repeater->add_control(
	'button_link2',
	[
		'label' 		=> esc_html__( 'Link 2', 'webteck' ),
		'type' 		=> \Elementor\Controls_Manager::TEXT,
		'placeholder' 	=> esc_html__( 'https://your-link.com', 'webteck' ),
		'show_external' => true,
	]
);
$repeater->add_control(
	'img',
	[
		'label' 		=> esc_html__( 'Image', 'webteck' ),
		'type' 			=> \Elementor\Controls_Manager::MEDIA,
		'default' 		=> [
			'url' =>  \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);

$this->add_control(
	'banners5',
	[
		'label' 		=> __( 'Banners', 'webteck' ),
		'type' 			=> \Elementor\Controls_Manager::REPEATER,
		'fields' 		=> $repeater->get_controls(),
		'default' 		=> [
			[
				'title' 		=> __( 'Your Name', 'webteck' ),
			],
		],
		'title_field' 	=> '{{{ title }}}',
	]
);
$this->add_control(
	'video_text',
	[
		'label' 	=> esc_html__( 'Video Text', 'webteck' ),
        'type' 		=> \Elementor\Controls_Manager::TEXT,
        'default'  	=> esc_html__( 'Choose Plan', 'webteck' ),
	]
);

$this->add_control(
	'video_link',
	[
		'label' 		=> esc_html__( 'Video Link', 'webteck' ),
		'type' 		=> \Elementor\Controls_Manager::TEXT,
		'placeholder' 	=> esc_html__( 'https://your-link.com', 'webteck' ),
		'show_external' => true,
	]
);
$this->add_control(
	'button_text',
	[
		'label' 	=> esc_html__( 'Button Text', 'webteck' ),
        'type' 		=> \Elementor\Controls_Manager::TEXT,
        'default'  	=> esc_html__( 'Choose Plan', 'webteck' ),
	]
);

$this->add_control(
	'button_link',
	[
		'label' 		=> esc_html__( 'Link', 'webteck' ),
		'type' 		=> \Elementor\Controls_Manager::TEXT,
		'placeholder' 	=> esc_html__( 'https://your-link.com', 'webteck' ),
		'show_external' => true,
	]
);
$this->end_controls_section();