<?php

$this->start_controls_section(
	'4_group_img_section',
	[
		'label'     => __( 'Image', 'webteck' ),
		'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition'	=> ['layout_style' => ['layout_two']]
	]
);
$this->add_control(
    '3_img_1',
    [
        'label'     => __( 'Image 1', 'webteck' ),
        'type'      => \Elementor\Controls_Manager::MEDIA,
        'dynamic' 		=> [
			'active' 		=> true,
		],
		'default' 		=> [
			'url' 		=>  \Elementor\Utils::get_placeholder_image_src(),
		],
    ]
);
$this->add_control(
    '3_img_2',
    [
        'label'     => __( 'Image 2', 'webteck' ),
        'type'      => \Elementor\Controls_Manager::MEDIA,
        'dynamic' 		=> [
			'active' 		=> true,
		],
		'default' 		=> [
			'url' 		=>  \Elementor\Utils::get_placeholder_image_src(),
		],
    ]
);
$this->add_control(
    '3_img_3',
    [
        'label'     => __( 'Image 3', 'webteck' ),
        'type'      => \Elementor\Controls_Manager::MEDIA,
        'dynamic' 		=> [
			'active' 		=> true,
		],
		'default' 		=> [
			'url' 		=>  \Elementor\Utils::get_placeholder_image_src(),
		],
    ]
);
$this->add_control(
	'3_content', [
		'label' 		=> __( 'Title', 'webteck' ),
		'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
		'default' 		=> __( 'Experience' , 'webteck' ),
		'label_block' 	=> true,
	]
);
$this->end_controls_section();