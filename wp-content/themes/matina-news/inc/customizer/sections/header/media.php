<?php
/**
 * Add Media section and it's fields inside Header section group.
 * 
 * @package Matina News
 */

add_action( 'customize_register', 'matina_news_register_header_media_fields' );

if ( ! function_exists( 'matina_news_register_header_media_fields' ) ) :

    /**
     * Register Media section's fields.
     */
    function matina_news_register_header_media_fields ( $wp_customize ) {

        /**
         * Media Section
         *
         * Theme Options > Header > Media
         *
         * @since 1.0.0
         */
        $wp_customize->add_section( new Matina_News_Customize_Section(
            $wp_customize, 'header_image',
                array(
                    'priority'      => 25,
                    'panel'         => 'matina_news_theme_options_panel',
                    'section'       => 'matina_news_header_group',
                    'capability'    => 'edit_theme_options',
                    'theme_options' => '',
                    'title'         => __( 'Media', 'matina-news' )
                )
            )
        );

        /**
         * Color option for header image overlay
         *
         * Theme Options > Header > Media
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_header_image_overlay_color',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => 'rgba(0,0,0,0.3)',
                'sanitize_callback' => 'matina_news_sanitize_alpha_color'
            )
        );

        $wp_customize->add_control( new Matina_News_Control_Color(
            $wp_customize, 'matina_news_header_image_overlay_color',
                array(
                    'priority'          => 60,
                    'section'           => 'header_image',
                    'settings'          => 'matina_news_header_image_overlay_color',
                    'label'             => __( 'Overlay Color', 'matina-news' )
                )
            )
        );

        /**
         * Select field for header background position
         *
         * Theme Options > Header > Media
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_header_image_position',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => 'initial',
                'transport'         => 'postMessage',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        
        $wp_customize->add_control( 'matina_news_header_image_position',
            array(
                'priority'          => 70,
                'section'           => 'header_image',
                'settings'          => 'matina_news_header_image_position',
                'label'             => __( 'Background Position', 'matina-news' ),
                'type'              => 'select',
                'choices'           => matina_news_bg_image_position_choices()
            )
        );

        /**
         * Select field for header background attachment
         *
         * Theme Options > Header > Media
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_header_image_attachment',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => 'initial',
                'transport'         => 'postMessage',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        
        $wp_customize->add_control( 'matina_news_header_image_attachment',
            array(
                'priority'          => 80,
                'section'           => 'header_image',
                'settings'          => 'matina_news_header_image_attachment',
                'label'             => __( 'Background Attachment', 'matina-news' ),
                'type'              => 'select',
                'choices'           => matina_news_bg_image_attachment_choices()
            )
        );

        /**
         * Select field for header background repeat
         *
         * Theme Options > Header > Media
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_header_image_repeat',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => 'initial',
                'transport'         => 'postMessage',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        
        $wp_customize->add_control( 'matina_news_header_image_repeat',
            array(
                'priority'          => 90,
                'section'           => 'header_image',
                'settings'          => 'matina_news_header_image_repeat',
                'label'             => __( 'Background Repeat', 'matina-news' ),
                'type'              => 'select',
                'choices'           => matina_news_bg_image_repeat_choices()
            )
        );

        /**
         * Select field for header background size
         *
         * Theme Options > Header > Media
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting( 'matina_news_header_image_size',
            array(
                'capability'        => 'edit_theme_options',
                'theme_options'     => '',
                'default'           => 'initial',
                'transport'         => 'postMessage',
                'sanitize_callback' => 'sanitize_text_field'
            )
        );
        
        $wp_customize->add_control( 'matina_news_header_image_size',
            array(
                'priority'          => 100,
                'section'           => 'header_image',
                'settings'          => 'matina_news_header_image_size',
                'label'             => __( 'Background Size', 'matina-news' ),
                'type'              => 'select',
                'choices'           => matina_news_bg_image_size_choices()
            )
        );

    }

endif;