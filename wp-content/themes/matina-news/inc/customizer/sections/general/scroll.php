<?php
/**
 * Add Scroll to Top section and it's fields inside General section group.
 * 
 * @package Matina News
 */

add_action( 'customize_register', 'matina_news_register_general_scroll_fields' );

if ( ! function_exists( 'matina_news_register_general_scroll_fields' ) ) :

    /**
     * Register Scroll to Top section's fields.
     */
    function matina_news_register_general_scroll_fields ( $wp_customize ) {

        /**
         * Scroll to Top Section
         *
         * Theme Options > General > Scroll to Top
         *
         * @since 1.0.0
         */
        $wp_customize->add_section( new Matina_News_Customize_Section(
            $wp_customize, 'matina_news_section_scroll_to_top',
                array(
                    'priority'      => 100,
                    'panel'         => 'matina_news_theme_options_panel',
                    'section'       => 'matina_news_general_group',
                    'capability'    => 'edit_theme_options',
                    'theme_options' => '',
                    'title'         => __( 'Scroll to Top', 'matina-news' )
                )
            )
        );

        /**
         * Toggle option for scroll to top
         *
         * Theme Options > General > Scroll to Top
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_scroll_top_option',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => true,
                'sanitize_callback' => 'matina_news_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Toggle(
            $wp_customize, 'matina_news_scroll_top_option',
                array(
                    'priority'      => 10,
                    'section'       => 'matina_news_section_scroll_to_top',
                    'settings'      => 'matina_news_scroll_top_option',
                    'label'         => __( 'Enable Scroll to Top', 'matina-news' )
                )
            )
        );

        /**
         * Radio icons field for scroll top arrow
         *
         * Theme Options > General > Site Layout > Site Style
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_scroll_top_arrow',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => 'fas fa-arrow-up',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Radio_Icons(
            $wp_customize, 'matina_news_scroll_top_arrow',
                array(
                    'priority'          => 20,
                    'section'           => 'matina_news_section_scroll_to_top',
                    'settings'          => 'matina_news_scroll_top_arrow',
                    'label'             => __( 'Arrow Icon', 'matina-news' ),
                    'description'       => __( 'Choose required arrow from available lists.', 'matina-news' ),
                    'choices'           => matina_news_scroll_top_arrow_choices(),
                    'active_callback'   => 'matina_news_cb_has_enable_scroll_top',
                )
            )
        );

        /**
         * Toggle option for scroll top label option
         *
         * Theme Options > General > Scroll to Top
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_scroll_top_label_option',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => false,
                'sanitize_callback' => 'matina_news_sanitize_checkbox'
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Toggle(
            $wp_customize, 'matina_news_scroll_top_label_option',
                array(
                    'priority'          => 30,
                    'section'           => 'matina_news_section_scroll_to_top',
                    'settings'          => 'matina_news_scroll_top_label_option',
                    'label'             => __( 'Enable Scroll to Top Label', 'matina-news' ),
                    'active_callback'   => 'matina_news_cb_has_enable_scroll_top',
                )
            )
        );

        /**
         * Text field for scroll to top label
         *
         * Theme Options > General > Scroll to Top
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_scroll_top_label',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => __( 'Back to Top', 'matina-news' ),
                'transport'         => 'postMessage',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        
        $wp_customize->add_control( 'matina_news_scroll_top_label',
            array(
                'priority'          => 40,
                'section'           => 'matina_news_section_scroll_to_top',
                'settings'          => 'matina_news_scroll_top_label',
                'label'             => __( 'Scroll Top Label', 'matina-news' ),
                'type'              => 'text',
                'active_callback'   => 'matina_news_cb_has_scroll_top_label_option'
            )
        );

    }

endif;