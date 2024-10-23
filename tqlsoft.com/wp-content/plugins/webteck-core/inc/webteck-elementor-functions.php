<?php

if (!function_exists('webteck_all_elementor_style')) :
    function webteck_all_elementor_style($agrs, $label, $selector, $condition, $style = 'color', $color = true, $typo = true, $mar = true, $pad = true) {
    
        if (false != $color) :
            $agrs->add_control(
                str_replace(' ', '_', $label) . '_color',
                [
                    'label'         => __($label . ' Color', 'webteck'),
                    'type'          => \Elementor\Controls_Manager::COLOR,
                    'selectors'     => [
                        $selector   => $style . ': {{VALUE}}',
                    ],
                    'condition'     => [
                        'layout_style' => $condition
                    ]
                ]
            );
        endif;

        if (false != $typo) :
            //title typography
            $agrs->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           =>  str_replace(' ', '_', $label) . '_typo',
                    'label'          => esc_html__($label . ' Typography', 'webteck'),
                    'selector'       => $selector,
                    'condition' => [
                        'layout_style' => $condition
                    ]
                ]
            );

        endif;

        if (false != $mar) :
            $agrs->add_responsive_control(
                str_replace(' ', '_', $label) . '_margin',
                [
                    'label'         => esc_html__($label . ' Margin', 'webteck'),
                    'type'          => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units'    => [ 'px', '%', 'em' ],
                    'selectors'     => [
                        $selector => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],

                    'condition' => [
                        'layout_style' => $condition,
                    ]
                ]
            );

        endif;

        if (false != $pad) :
            $agrs->add_responsive_control(
                str_replace(' ', '_', $label) . '_padding',
                [
                    'label'         => esc_html__($label . ' Padding', 'webteck'),
                    'type'          => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units'    => [ 'px', '%', 'em' ],
                    'selectors'     => [
                        $selector => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],

                    'condition' => [
                        'layout_style' => $condition
                    ]
                ]
            );

        endif;

    }
endif;
//--------------------------------------------------button--------------------------------------------------//

if (!function_exists('webteck_elementor_border_style')) :
    function webteck_elementor_border_style($agrs, $label, $selector, $condition)
    {

        
        if (false != $selector) :
            $agrs->add_group_control(
                 \Elementor\Group_Control_Border::get_type(),
                [
                    'name'      => $label .'border',
                    'label'     => __($label . ' Border', 'webteck'),
                    'selector'  => $selector ,
                    'condition' => [
                        'layout_style' => $condition
                    ]
                ]
            );

            $agrs->add_responsive_control(
                str_replace(' ', '_', $label) . '_border_radious',
                [
                    'label'         => esc_html__($label . ' Border Radious', 'webteck'),
                    'type'          => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units'    => [ 'px', '%', 'em' ],
                    'selectors'     => [
                        $selector => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],

                    'condition' => [
                        'layout_style' => $condition
                    ]
                ]
            );

        endif;
    }
endif;


if (!function_exists('webteck_elementor_color_style')) :
    function webteck_elementor_color_style($agrs, $label, $selector, $condition, $style = 'color')
    {
        if (false != $selector) :
            $agrs->add_control(
                str_replace(' ', '_', $label) . '_color',
                [
                    'label' => __($label . ' Color', 'webteck'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        $selector => $style . ': {{VALUE}}',
                    ],
                    'condition' => [
                        'layout_style' => $condition
                    ]
                ]
            );  
        endif;
    }
endif;

if (!function_exists('webteck_elementor_typography_style')) :
    function webteck_elementor_typography_style($agrs, $label, $selector, $condition)
    {   
        if (false != $selector) :
            $agrs->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           =>  str_replace(' ', '_', $label) . '_typo',
                    'label'          => esc_html__($label . ' Typography', 'webteck'),
                    'selector'       => $selector,
                    'condition' => [
                        'layout_style' => $condition
                    ]
                ]
            ); 
        endif;
    }
endif;


//function for load elementor widgets field style wise

if (!function_exists('webteck_get_elementor_option')) :
    function webteck_get_elementor_option($template_name = null)
    {
        $template_path = apply_filters('webteck-elementor/template-options', 'elementor-options/');
        $template = locate_template($template_path . $template_name);
        if (!$template) {
            $template = WEBTECK_ADDONS  . 'elementor-options/' . $template_name;
        }
        if (file_exists($template)) {
            return $template;
        }
    }
endif;