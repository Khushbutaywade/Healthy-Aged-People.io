<?php

	$vw_healthcare_custom_css= "";

	/*---------------------------First highlight color-------------------*/

	$vw_healthcare_first_color = get_theme_mod('vw_healthcare_first_color');

	if($vw_healthcare_first_color != false){
		$vw_healthcare_custom_css .='.middle-bar i, .topbar-btn a, #header, .main-navigation ul.sub-menu>li>a:before, .more-btn a,#comments input[type="submit"],#comments a.comment-reply-link,input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,nav.woocommerce-MyAccount-navigation ul li,.pro-button a, #footer-2, .scrollup i, .pagination span, .pagination a, .widget_product_search button, .woocommerce span.onsale,#sidebar h3{';
			$vw_healthcare_custom_css .='background-color: '.esc_attr($vw_healthcare_first_color).';';
		$vw_healthcare_custom_css .='}';
	}

	if($vw_healthcare_first_color != false){
		$vw_healthcare_custom_css .='a, .topbar-btn a:hover,.more-btn a:hover,input[type="submit"]:hover,#comments input[type="submit"]:hover,#comments a.comment-reply-link:hover,#slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover,.pagination .current,.pagination a:hover,#footer .tagcloud a:hover,#sidebar .tagcloud a:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.widget_product_search button:hover,nav.woocommerce-MyAccount-navigation ul li:hover, .woocommerce div.product p.price, .woocommerce div.product span.price,.woocommerce ul.products li.product .price{';
			$vw_healthcare_custom_css .='color: '.esc_attr($vw_healthcare_first_color).';';
		$vw_healthcare_custom_css .='}';
	}

	/*---------------------------Second highlight color-------------------*/

	$vw_healthcare_second_color = get_theme_mod('vw_healthcare_second_color');

	if($vw_healthcare_second_color != false){
		$vw_healthcare_custom_css .='.topbar-btn a:hover,.more-btn a:hover,input[type="submit"]:hover,#comments input[type="submit"]:hover,#comments a.comment-reply-link:hover,#slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover,.pagination .current,.pagination a:hover,#footer .tagcloud a:hover,#sidebar .tagcloud a:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.widget_product_search button:hover,nav.woocommerce-MyAccount-navigation ul li:hover, .slide-image{';
			$vw_healthcare_custom_css .='background-color: '.esc_attr($vw_healthcare_second_color).';';
		$vw_healthcare_custom_css .='}';
	}

	if($vw_healthcare_second_color != false){
		$vw_healthcare_custom_css .='.main-navigation a:hover, #footer .textwidget a,#footer li a:hover,.post-main-box:hover h3 a,#sidebar ul li a:hover,.post-navigation a:hover .post-title, .post-navigation a:focus .post-title,.post-navigation a:hover,.post-navigation a:focus{';
			$vw_healthcare_custom_css .='color: '.esc_attr($vw_healthcare_second_color).';';
		$vw_healthcare_custom_css .='}';
	}

	if($vw_healthcare_second_color != false){
		$vw_healthcare_custom_css .='.middle-bar i{';
			$vw_healthcare_custom_css .='border-color: '.esc_attr($vw_healthcare_second_color).';';
		$vw_healthcare_custom_css .='}';
	}

	if($vw_healthcare_second_color != false){
		$vw_healthcare_custom_css .='.top-bar{';
			$vw_healthcare_custom_css .='border-bottom-color: '.esc_attr($vw_healthcare_second_color).';';
		$vw_healthcare_custom_css .='}';
	}

	if($vw_healthcare_second_color != false){
		$vw_healthcare_custom_css .='.top-bar .custom-social-icons i{';
			$vw_healthcare_custom_css .='border-right-color: '.esc_attr($vw_healthcare_second_color).';';
		$vw_healthcare_custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$vw_healthcare_theme_lay = get_theme_mod( 'vw_healthcare_width_option','Full Width');
    if($vw_healthcare_theme_lay == 'Boxed'){
		$vw_healthcare_custom_css .='body{';
			$vw_healthcare_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_healthcare_custom_css .='}';
		$vw_healthcare_custom_css .='#slider .carousel-caption{';
			$vw_healthcare_custom_css .='right: 18% !important; left: 18% !important;';
		$vw_healthcare_custom_css .='}';
	}else if($vw_healthcare_theme_lay == 'Wide Width'){
		$vw_healthcare_custom_css .='body{';
			$vw_healthcare_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_healthcare_custom_css .='}';
	}else if($vw_healthcare_theme_lay == 'Full Width'){
		$vw_healthcare_custom_css .='body{';
			$vw_healthcare_custom_css .='max-width: 100%;';
		$vw_healthcare_custom_css .='}';
	}

	/*--------------------------- Slider Content Layout -------------------*/

	$vw_healthcare_theme_lay = get_theme_mod( 'vw_healthcare_slider_content_option','Left');
    if($vw_healthcare_theme_lay == 'Left'){
		$vw_healthcare_custom_css .='#slider .carousel-caption{';
			$vw_healthcare_custom_css .='text-align:left; right: 40%; left:20%';
		$vw_healthcare_custom_css .='}';
	}else if($vw_healthcare_theme_lay == 'Center'){
		$vw_healthcare_custom_css .='#slider .carousel-caption{';
			$vw_healthcare_custom_css .='text-align:center; right: 25%; left: 25%;';
		$vw_healthcare_custom_css .='}';
	}else if($vw_healthcare_theme_lay == 'Right'){
		$vw_healthcare_custom_css .='#slider .carousel-caption{';
			$vw_healthcare_custom_css .='text-align:right; right: 20%; left: 40%;';
		$vw_healthcare_custom_css .='}';
	}

	/*--------------------------- Slider -------------------*/

	$vw_healthcare_slider = get_theme_mod('vw_healthcare_slider_arrows');
	if($vw_healthcare_slider == false){
		$vw_healthcare_custom_css .='#services-sec{';
			$vw_healthcare_custom_css .='background: none; padding-bottom: 0px !important;';
		$vw_healthcare_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_healthcare_theme_lay = get_theme_mod( 'vw_healthcare_blog_layout_option','Default');
    if($vw_healthcare_theme_lay == 'Default'){
		$vw_healthcare_custom_css .='.post-main-box{';
			$vw_healthcare_custom_css .='';
		$vw_healthcare_custom_css .='}';
	}else if($vw_healthcare_theme_lay == 'Center'){
		$vw_healthcare_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p{';
			$vw_healthcare_custom_css .='text-align:center;';
		$vw_healthcare_custom_css .='}';
		$vw_healthcare_custom_css .='.post-info{';
			$vw_healthcare_custom_css .='margin-top:10px;';
		$vw_healthcare_custom_css .='}';
	}else if($vw_healthcare_theme_lay == 'Left'){
		$vw_healthcare_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, #our-services p{';
			$vw_healthcare_custom_css .='text-align:Left;';
		$vw_healthcare_custom_css .='}';
		$vw_healthcare_custom_css .='.post-main-box h2{';
			$vw_healthcare_custom_css .='margin-top:10px;';
		$vw_healthcare_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$vw_healthcare_resp_slider = get_theme_mod( 'vw_healthcare_resp_slider_hide_show',false);
	if($vw_healthcare_resp_slider == true && get_theme_mod( 'vw_healthcare_slider_arrows', false) == false){
    	$vw_healthcare_custom_css .='#slider{';
			$vw_healthcare_custom_css .='display:none;';
		$vw_healthcare_custom_css .='} ';
	}
    if($vw_healthcare_resp_slider == true){
    	$vw_healthcare_custom_css .='@media screen and (max-width:575px) {';
		$vw_healthcare_custom_css .='#slider{';
			$vw_healthcare_custom_css .='display:block;';
		$vw_healthcare_custom_css .='} }';
	}else if($vw_healthcare_resp_slider == false){
		$vw_healthcare_custom_css .='@media screen and (max-width:575px) {';
		$vw_healthcare_custom_css .='#slider{';
			$vw_healthcare_custom_css .='display:none;';
		$vw_healthcare_custom_css .='} }';
	}

	$vw_healthcare_resp_sidebar = get_theme_mod( 'vw_healthcare_sidebar_hide_show',true);
    if($vw_healthcare_resp_sidebar == true){
    	$vw_healthcare_custom_css .='@media screen and (max-width:575px) {';
		$vw_healthcare_custom_css .='#sidebar{';
			$vw_healthcare_custom_css .='display:block;';
		$vw_healthcare_custom_css .='} }';
	}else if($vw_healthcare_resp_sidebar == false){
		$vw_healthcare_custom_css .='@media screen and (max-width:575px) {';
		$vw_healthcare_custom_css .='#sidebar{';
			$vw_healthcare_custom_css .='display:none;';
		$vw_healthcare_custom_css .='} }';
	}

	$vw_healthcare_resp_scroll_top = get_theme_mod( 'vw_healthcare_resp_scroll_top_hide_show',true);
	if($vw_healthcare_resp_scroll_top == true && get_theme_mod( 'vw_healthcare_footer_scroll',true) != true){
    	$vw_healthcare_custom_css .='.scrollup i{';
			$vw_healthcare_custom_css .='visibility:hidden !important;';
		$vw_healthcare_custom_css .='} ';
	}
    if($vw_healthcare_resp_scroll_top == true){
    	$vw_healthcare_custom_css .='@media screen and (max-width:575px) {';
		$vw_healthcare_custom_css .='.scrollup i{';
			$vw_healthcare_custom_css .='visibility:visible !important;';
		$vw_healthcare_custom_css .='} }';
	}else if($vw_healthcare_resp_scroll_top == false){
		$vw_healthcare_custom_css .='@media screen and (max-width:575px){';
		$vw_healthcare_custom_css .='.scrollup i{';
			$vw_healthcare_custom_css .='visibility:hidden !important;';
		$vw_healthcare_custom_css .='} }';
	}

	/*---------------- Button Settings ------------------*/

	$vw_healthcare_button_border_radius = get_theme_mod('vw_healthcare_button_border_radius');
	if($vw_healthcare_button_border_radius != false){
		$vw_healthcare_custom_css .='.post-main-box .more-btn a{';
			$vw_healthcare_custom_css .='border-radius: '.esc_attr($vw_healthcare_button_border_radius).'px;';
		$vw_healthcare_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_healthcare_copyright_alingment = get_theme_mod('vw_healthcare_copyright_alingment');
	if($vw_healthcare_copyright_alingment != false){
		$vw_healthcare_custom_css .='.copyright p{';
			$vw_healthcare_custom_css .='text-align: '.esc_attr($vw_healthcare_copyright_alingment).';';
		$vw_healthcare_custom_css .='}';
	}

	/*------------------ Preloader Background Color  -------------------*/

	$vw_healthcare_preloader_bg_color = get_theme_mod('vw_healthcare_preloader_bg_color');
	if($vw_healthcare_preloader_bg_color != false){
		$vw_healthcare_custom_css .='#preloader{';
			$vw_healthcare_custom_css .='background-color: '.esc_attr($vw_healthcare_preloader_bg_color).';';
		$vw_healthcare_custom_css .='}';
	}

	$vw_healthcare_preloader_border_color = get_theme_mod('vw_healthcare_preloader_border_color');
	if($vw_healthcare_preloader_border_color != false){
		$vw_healthcare_custom_css .='.loader-line{';
			$vw_healthcare_custom_css .='border-color: '.esc_attr($vw_healthcare_preloader_border_color).'!important;';
		$vw_healthcare_custom_css .='}';
	}