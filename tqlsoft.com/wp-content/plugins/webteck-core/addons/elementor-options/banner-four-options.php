<?php

$this->start_controls_section(
	'4_banner_section',
	[
		'label'     => __( 'Banner', 'webteck' ),
		'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition'	=> ['layout_style' => ['layout_one']]
	]
);

$this->add_control(
	'title5', [
		'label' 		=> __( 'Title', 'webteck' ),
		'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
		'default' 		=> __( 'Safe Cleaning Supplies' , 'webteck' ),
		'rows' 			=> 2,
		'label_block' 	=> true,
	]
);
$this->add_control(
	'subtitle5', [
		'label' 		=> __( 'Subtitle', 'webteck' ),
		'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
		'default' 		=> __( 'Safe Cleaning Supplies' , 'webteck' ),
		'rows' 			=> 2,
		'label_block' 	=> true,
	]
);
$this->add_control(
	'desc5', [
		'label' 		=> __( 'Description', 'webteck' ),
		'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
		'default' 		=> __( 'Safe Cleaning Supplies' , 'webteck' ),
		'rows' 			=> 2,
		'label_block' 	=> true,
	]
);
$this->add_control(
	'button_text5',
	[
		'label' 	=> esc_html__( 'Button Text', 'webteck' ),
        'type' 		=> \Elementor\Controls_Manager::TEXT,
        'default'  	=> esc_html__( 'Choose Plan', 'webteck' ),
	]
);

$this->add_control(
	'button_link5',
	[
		'label' 		=> esc_html__( 'Link', 'webteck' ),
		'type' 		=> \Elementor\Controls_Manager::TEXT,
		'placeholder' 	=> esc_html__( 'https://your-link.com', 'webteck' ),
		'show_external' => true,
	]
);

$this->add_control(
	'img5',
	[
		'label' 		=> esc_html__( 'Image', 'webteck' ),
		'type' 			=> \Elementor\Controls_Manager::MEDIA,
		'default' 		=> [
			'url' =>  \Elementor\Utils::get_placeholder_image_src(),
		],
	]
);
$this->end_controls_section();