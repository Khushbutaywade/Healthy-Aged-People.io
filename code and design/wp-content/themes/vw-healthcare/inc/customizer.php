<?php
/**
 * VW Healthcare Theme Customizer
 *
 * @package VW Healthcare
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function vw_healthcare_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_healthcare_custom_controls' );

function vw_healthcare_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'vw_healthcare_Customize_partial_blogname',
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'vw_healthcare_Customize_partial_blogdescription',
	));

	//add home page setting pannel
	$vw_healthcare_parent_panel = new VW_Healthcare_WP_Customize_Panel( $wp_customize, 'vw_healthcare_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'vw-healthcare' ),
		'priority' => 10,
	));

	// Layout
	$wp_customize->add_section( 'vw_healthcare_left_right', array(
    	'title' => esc_html__( 'General Settings', 'vw-healthcare' ),
		'panel' => 'vw_healthcare_panel_id'
	) );

	$wp_customize->add_setting('vw_healthcare_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'vw_healthcare_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Healthcare_Image_Radio_Control($wp_customize, 'vw_healthcare_width_option', array(
        'type' => 'select',
        'label' => esc_html__('Width Layouts','vw-healthcare'),
        'description' => esc_html__('Here you can change the width layout of Website.','vw-healthcare'),
        'section' => 'vw_healthcare_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('vw_healthcare_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_healthcare_sanitize_choices'
	));
	$wp_customize->add_control('vw_healthcare_theme_options',array(
        'type' => 'select',
        'label' => esc_html__('Post Sidebar Layout','vw-healthcare'),
        'description' => esc_html__('Here you can change the sidebar layout for posts. ','vw-healthcare'),
        'section' => 'vw_healthcare_left_right',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','vw-healthcare'),
            'Right Sidebar' => esc_html__('Right Sidebar','vw-healthcare'),
            'One Column' => esc_html__('One Column','vw-healthcare'),
            'Three Columns' => esc_html__('Three Columns','vw-healthcare'),
            'Four Columns' => esc_html__('Four Columns','vw-healthcare'),
            'Grid Layout' => esc_html__('Grid Layout','vw-healthcare')
        ),
	) );

	$wp_customize->add_setting('vw_healthcare_page_layout',array(
        'default' => 'One_Column',
        'sanitize_callback' => 'vw_healthcare_sanitize_choices'
	));
	$wp_customize->add_control('vw_healthcare_page_layout',array(
        'type' => 'select',
        'label' => esc_html__('Page Sidebar Layout','vw-healthcare'),
        'description' => esc_html__('Here you can change the sidebar layout for pages. ','vw-healthcare'),
        'section' => 'vw_healthcare_left_right',
        'choices' => array(
            'Left_Sidebar' => esc_html__('Left Sidebar','vw-healthcare'),
            'Right_Sidebar' => esc_html__('Right Sidebar','vw-healthcare'),
            'One_Column' => esc_html__('One Column','vw-healthcare')
        ),
	) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_healthcare_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_healthcare_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Healthcare_Toggle_Switch_Custom_Control( $wp_customize, 'vw_healthcare_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-healthcare' ),
		'section' => 'vw_healthcare_left_right'
    )));

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_healthcare_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_healthcare_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Healthcare_Toggle_Switch_Custom_Control( $wp_customize, 'vw_healthcare_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-healthcare' ),
		'section' => 'vw_healthcare_left_right'
    )));

    //Pre-Loader
	$wp_customize->add_setting( 'vw_healthcare_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_healthcare_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Healthcare_Toggle_Switch_Custom_Control( $wp_customize, 'vw_healthcare_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-healthcare' ),
        'section' => 'vw_healthcare_left_right'
    )));

	$wp_customize->add_setting('vw_healthcare_preloader_bg_color', array(
		'default'           => '#2cd7bd',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_healthcare_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'vw-healthcare'),
		'section'  => 'vw_healthcare_left_right',
	)));

	$wp_customize->add_setting('vw_healthcare_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_healthcare_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'vw-healthcare'),
		'section'  => 'vw_healthcare_left_right',
	)));

	// Header
	$wp_customize->add_section( 'vw_healthcare_header' , array(
    	'title' => esc_html__( 'Header', 'vw-healthcare' ),
		'panel' => 'vw_healthcare_panel_id'
	) );

	$wp_customize->add_setting('vw_healthcare_opening_time',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_healthcare_opening_time',array(
		'label'	=> esc_html__('Add Opening Time','vw-healthcare'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Opening Hours: Monday to Saturday - 8 AM to 5 PM', 'vw-healthcare' ),
        ),
		'section'=> 'vw_healthcare_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_healthcare_phone_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_healthcare_phone_text',array(
		'label'	=> esc_html__('Add Phone Text','vw-healthcare'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Emergency Number', 'vw-healthcare' ),
        ),
		'section'=> 'vw_healthcare_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_healthcare_phone_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_healthcare_phone_number',array(
		'label'	=> esc_html__('Add Phone Number','vw-healthcare'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '9876543210', 'vw-healthcare' ),
        ),
		'section'=> 'vw_healthcare_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_healthcare_location_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_healthcare_location_text',array(
		'label'	=> esc_html__('Add Location Text','vw-healthcare'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Address', 'vw-healthcare' ),
        ),
		'section'=> 'vw_healthcare_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_healthcare_location',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_healthcare_location',array(
		'label'	=> esc_html__('Add Location','vw-healthcare'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Dummy Street, Australia', 'vw-healthcare' ),
        ),
		'section'=> 'vw_healthcare_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_healthcare_appointment_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_healthcare_appointment_text',array(
		'label'	=> esc_html__('Button Text','vw-healthcare'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'APPOINTMENT', 'vw-healthcare' ),
        ),
		'section'=> 'vw_healthcare_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_healthcare_appointment_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('vw_healthcare_appointment_link',array(
		'label'	=> esc_html__('Button Link','vw-healthcare'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'https://www.example.com/appointment', 'vw-healthcare' ),
        ),
		'section'=> 'vw_healthcare_header',
		'type'=> 'url'
	));

	//Slider
	$wp_customize->add_section( 'vw_healthcare_slidersettings' , array(
    	'title' => esc_html__( 'Slider Settings', 'vw-healthcare' ),
		'panel' => 'vw_healthcare_panel_id'
	) );

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_healthcare_slider_arrows',array(
		'selector'        => '#slider .carousel-caption h1',
		'render_callback' => 'vw_healthcare_Customize_partial_vw_healthcare_slider_arrows',
	));

	$wp_customize->add_setting( 'vw_healthcare_slider_arrows',array(
    	'default' => 0,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_healthcare_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Healthcare_Toggle_Switch_Custom_Control( $wp_customize, 'vw_healthcare_slider_arrows',array(
      	'label' => esc_html__( 'Show / Hide Slider','vw-healthcare' ),
      	'section' => 'vw_healthcare_slidersettings'
    )));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'vw_healthcare_slider_page' . $count, array(
			'default'  => '',
			'sanitize_callback' => 'vw_healthcare_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_healthcare_slider_page' . $count, array(
			'label'    => esc_html__( 'Select Slider Page', 'vw-healthcare' ),
			'description' => esc_html__('Slider image size (1600 x 650)','vw-healthcare'),
			'section'  => 'vw_healthcare_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//content layout
	$wp_customize->add_setting('vw_healthcare_slider_content_option',array(
        'default' => 'Left',
        'sanitize_callback' => 'vw_healthcare_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Healthcare_Image_Radio_Control($wp_customize, 'vw_healthcare_slider_content_option', array(
        'type' => 'select',
        'label' => esc_html__('Slider Content Layouts','vw-healthcare'),
        'section' => 'vw_healthcare_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ))));

	//Services
	$wp_customize->add_section('vw_healthcare_services',array(
		'title'	=> __('Our Specialize Section','vw-healthcare'),
		'panel' => 'vw_healthcare_panel_id',
	));

	$wp_customize->add_setting('vw_healthcare_services_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_healthcare_services_text',array(
		'label'	=> esc_html__('Services Heading Text','vw-healthcare'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Our Speciality', 'vw-healthcare' ),
        ),
		'section'=> 'vw_healthcare_services',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_healthcare_services_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_healthcare_services_title',array(
		'label'	=> esc_html__('Services Heading Title','vw-healthcare'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'We Specialize In', 'vw-healthcare' ),
        ),
		'section'=> 'vw_healthcare_services',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_healthcare_services_btn_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_healthcare_services_btn_text',array(
		'label'	=> esc_html__('Services Button Text','vw-healthcare'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'View All Speciality', 'vw-healthcare' ),
        ),
		'section'=> 'vw_healthcare_services',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_healthcare_services_btn_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('vw_healthcare_services_btn_link',array(
		'label'	=> esc_html__('Services Button Link','vw-healthcare'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'https://www.example.com/services', 'vw-healthcare' ),
        ),
		'section'=> 'vw_healthcare_services',
		'type'=> 'url'
	));

	$categories = get_categories();
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';	
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_healthcare_services_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_healthcare_sanitize_choices',
	));
	$wp_customize->add_control('vw_healthcare_services_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Category to display services','vw-healthcare'),
		'section' => 'vw_healthcare_services',
	));

	//Blog Post
	$wp_customize->add_panel( $vw_healthcare_parent_panel );

	$BlogPostParentPanel = new VW_Healthcare_WP_Customize_Panel( $wp_customize, 'vw_healthcare_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'vw-healthcare' ),
		'panel' => 'vw_healthcare_panel_id',
		'priority' => 20,
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_healthcare_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'vw-healthcare' ),
		'panel' => 'vw_healthcare_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_healthcare_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'vw_healthcare_Customize_partial_vw_healthcare_toggle_postdate', 
	));

	$wp_customize->add_setting( 'vw_healthcare_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_healthcare_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Healthcare_Toggle_Switch_Custom_Control( $wp_customize, 'vw_healthcare_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-healthcare' ),
        'section' => 'vw_healthcare_post_settings'
    )));

    $wp_customize->add_setting( 'vw_healthcare_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_healthcare_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Healthcare_Toggle_Switch_Custom_Control( $wp_customize, 'vw_healthcare_toggle_author',array(
		'label' => esc_html__( 'Author','vw-healthcare' ),
		'section' => 'vw_healthcare_post_settings'
    )));

    $wp_customize->add_setting( 'vw_healthcare_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_healthcare_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Healthcare_Toggle_Switch_Custom_Control( $wp_customize, 'vw_healthcare_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-healthcare' ),
		'section' => 'vw_healthcare_post_settings'
    )));

    $wp_customize->add_setting( 'vw_healthcare_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_healthcare_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_healthcare_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-healthcare' ),
		'section'     => 'vw_healthcare_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_healthcare_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog layout
    $wp_customize->add_setting('vw_healthcare_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'vw_healthcare_sanitize_choices'
    ));
    $wp_customize->add_control(new vw_healthcare_Image_Radio_Control($wp_customize, 'vw_healthcare_blog_layout_option', array(
        'type' => 'select',
        'label' => esc_html__('Blog Layouts','vw-healthcare'),
        'section' => 'vw_healthcare_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('vw_healthcare_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_healthcare_sanitize_choices'
	));
	$wp_customize->add_control('vw_healthcare_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Post Content','vw-healthcare'),
        'section' => 'vw_healthcare_post_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','vw-healthcare'),
            'Excerpt' => esc_html__('Excerpt','vw-healthcare'),
            'No Content' => esc_html__('No Content','vw-healthcare')
        ),
	) );

    // Button Settings
	$wp_customize->add_section( 'vw_healthcare_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'vw-healthcare' ),
		'panel' => 'vw_healthcare_blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'vw_healthcare_button_border_radius', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_healthcare_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_healthcare_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-healthcare' ),
		'section'     => 'vw_healthcare_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_healthcare_button_text', array( 
		'selector' => '.post-main-box .more-btn a', 
		'render_callback' => 'vw_healthcare_Customize_partial_vw_healthcare_button_text', 
	));

    $wp_customize->add_setting('vw_healthcare_button_text',array(
		'default'=> esc_html__('READ MORE','vw-healthcare'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_healthcare_button_text',array(
		'label'	=> esc_html__('Add Button Text','vw-healthcare'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'READ MORE', 'vw-healthcare' ),
        ),
		'section'=> 'vw_healthcare_button_settings',
		'type'=> 'text'
	));

	// Related Post Settings
	$wp_customize->add_section( 'vw_healthcare_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'vw-healthcare' ),
		'panel' => 'vw_healthcare_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_healthcare_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'vw_healthcare_Customize_partial_vw_healthcare_related_post_title', 
	));

    $wp_customize->add_setting( 'vw_healthcare_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_healthcare_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Healthcare_Toggle_Switch_Custom_Control( $wp_customize, 'vw_healthcare_related_post',array(
		'label' => esc_html__( 'Related Post','vw-healthcare' ),
		'section' => 'vw_healthcare_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_healthcare_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_healthcare_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','vw-healthcare'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Related Post', 'vw-healthcare' ),
        ),
		'section'=> 'vw_healthcare_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_healthcare_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_healthcare_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','vw-healthcare'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '3', 'vw-healthcare' ),
        ),
		'section'=> 'vw_healthcare_related_posts_settings',
		'type'=> 'number'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'vw_healthcare_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-healthcare' ),
		'panel' => 'vw_healthcare_blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'vw_healthcare_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_healthcare_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Healthcare_Toggle_Switch_Custom_Control( $wp_customize, 'vw_healthcare_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-healthcare' ),
		'section' => 'vw_healthcare_single_blog_settings'
    )));

	//Responsive Media Settings
	$wp_customize->add_section('vw_healthcare_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','vw-healthcare'),
		'panel' => 'vw_healthcare_panel_id',
	));

    $wp_customize->add_setting( 'vw_healthcare_resp_slider_hide_show',array(
      	'default' => 0,
     	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_healthcare_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Healthcare_Toggle_Switch_Custom_Control( $wp_customize, 'vw_healthcare_resp_slider_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Slider','vw-healthcare' ),
      	'section' => 'vw_healthcare_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_healthcare_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_healthcare_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Healthcare_Toggle_Switch_Custom_Control( $wp_customize, 'vw_healthcare_sidebar_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Sidebar','vw-healthcare' ),
      	'section' => 'vw_healthcare_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_healthcare_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_healthcare_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Healthcare_Toggle_Switch_Custom_Control( $wp_customize, 'vw_healthcare_resp_scroll_top_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-healthcare' ),
      	'section' => 'vw_healthcare_responsive_media'
    )));

	//Footer Text
	$wp_customize->add_section('vw_healthcare_footer',array(
		'title'	=> esc_html__('Footer Settings','vw-healthcare'),
		'panel' => 'vw_healthcare_panel_id',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_healthcare_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'vw_healthcare_Customize_partial_vw_healthcare_footer_text', 
	));
	
	$wp_customize->add_setting('vw_healthcare_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_healthcare_footer_text',array(
		'label'	=> esc_html__('Copyright Text','vw-healthcare'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Copyright 2020, .....', 'vw-healthcare' ),
        ),
		'section'=> 'vw_healthcare_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_healthcare_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'vw_healthcare_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Healthcare_Image_Radio_Control($wp_customize, 'vw_healthcare_copyright_alingment', array(
        'type' => 'select',
        'label' => esc_html__('Copyright Alignment','vw-healthcare'),
        'section' => 'vw_healthcare_footer',
        'settings' => 'vw_healthcare_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

	$wp_customize->add_setting( 'vw_healthcare_footer_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_healthcare_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Healthcare_Toggle_Switch_Custom_Control( $wp_customize, 'vw_healthcare_footer_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll to Top','vw-healthcare' ),
      	'section' => 'vw_healthcare_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_healthcare_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'vw_healthcare_Customize_partial_vw_healthcare_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('vw_healthcare_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'vw_healthcare_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Healthcare_Image_Radio_Control($wp_customize, 'vw_healthcare_scroll_top_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Scroll To Top','vw-healthcare'),
        'section' => 'vw_healthcare_footer',
        'settings' => 'vw_healthcare_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

    // Has to be at the top
	$wp_customize->register_panel_type( 'VW_Healthcare_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Healthcare_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_healthcare_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class VW_Healthcare_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_healthcare_panel';
	    public function json() {
			$array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
			$array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
			$array['content'] = $this->get_content();
			$array['active'] = $this->active();
			$array['instanceNumber'] = $this->instance_number;
			return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class VW_Healthcare_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vw_healthcare_section';
	    public function json() {
			$array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
			$array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
			$array['content'] = $this->get_content();
			$array['active'] = $this->active();
			$array['instanceNumber'] = $this->instance_number;

			if ( $this->panel ) {
			$array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
			} else {
			$array['customizeAction'] = 'Customizing';
			}
			return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function vw_healthcare_Customize_controls_scripts() {
	wp_enqueue_script( 'vw-healthcare-customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_healthcare_Customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Healthcare_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Healthcare_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new VW_Healthcare_Customize_Section_Pro( $manager,'vw_healthcare_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'VW Healthcare Pro', 'vw-healthcare' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-healthcare' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/healthcare-wordpress-theme/'),
		) )	);

		$manager->add_section(new VW_Healthcare_Customize_Section_Pro($manager,'vw_healthcare_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENATATION', 'vw-healthcare' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-healthcare' ),
			'pro_url'  => admin_url('themes.php?page=vw_healthcare_guide'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-healthcare-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-healthcare-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Healthcare_Customize::get_instance();