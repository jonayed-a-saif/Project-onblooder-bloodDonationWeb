<?php

$this->start_controls_section(
	'7_group_img_section',
	[
		'label'     => __( 'Image', 'webteck' ),
		'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
		'condition'	=> ['layout_style' => ['layout_six']]
	]
);
$this->add_control(
    '6_img_1',
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
    '6_img_2',
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
    '6_img_3',
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
    '6_img_4',
    [
        'label'     => __( 'Image 4', 'webteck' ),
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
    '6_img_5',
    [
        'label'     => __( 'Image 5', 'webteck' ),
        'type'      => \Elementor\Controls_Manager::MEDIA,
        'dynamic' 		=> [
			'active' 		=> true,
		],
		'default' 		=> [
			'url' 		=>  \Elementor\Utils::get_placeholder_image_src(),
		],
    ]
);


$this->end_controls_section();