<?php
add_shortcode( 'dunhakdis_icon', 'dunhakdis_icon' );
add_action( 'vc_before_init', 'dunhakdis_icon_vc' );

function dunhakdis_icon( $atts ) {

	extract( shortcode_atts( 
			array(
	        	'icon' => 'star',
	        	'title' => '',
	        	'text' => '',
	        	'link' => ''
	    	), $atts 
    	)
	);
	
	ob_start();
	
	if ( ! function_exists('vc_map') ) { 

		$icon = 'fa fa-' . $icon;

	} 
	
	?>
	
	<div class="dunhakdis_icon_container">
		<div class="dunhakdis_icon_container__wrap">
			<div class="dunhakdis_icon__icon">
				<a href="<?php echo esc_url( $link ); ?>" title="<?php echo esc_attr( $title ); ?>">
					<span class="dunhakdis_icon fa-2x <?php echo esc_attr( $icon ); ?>"></span>
				</a>
			</div>
			<div class="dunhakdis_icon__details">
				<h3>
					<a href="<?php echo esc_url( $link ); ?>" title="<?php echo esc_attr( $title ); ?>">
						<?php echo esc_html( $title ); ?>
					</a>
				</h3>
				<p>
					<?php echo esc_html( $text ); ?>
				</p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<?php

	return ob_get_clean();
}

function dunhakdis_icon_vc() {
	vc_map( array(
		"name" => __( "Dunhakdis Icon Box", "dutility" ),
		"base" => "dunhakdis_icon",
		"class" => "",
		"icon" => plugins_url('dunhakdis-utility/assets/images/icon-icon-box.jpg'),
		"category" => __( "Content", "dutility"),
		"params" => array(
			array(
				"type" => "iconpicker",
				"holder" => "",
				"class" => "",
				"heading" => __( "Icon", "dutility" ),
				"param_name" => "icon",
				"value" => "star",
				"settings" => array(
					"emptyIcon" => false, // default true, display an "EMPTY" icon?
					"iconsPerPage" => 200, // default 100, how many icons per/page to display
				),
				"description" => __( "Select your icon.", "dutility" )
			),
			array(
				"type" => "textfield",
				"holder" => "",
				"class" => "",
				"admin_label" => true,
				"heading" => __( "Title", "dutility" ),
				"param_name" => "title",
				"value" => __( "", "dutility" ),
				"description" => __( "Enter the title of the icon box.", "dutility" )
			),
			array(
				"type" => "vc_link",
				"holder" => "",
				"class" => "",
				"heading" => __( "Link", "dutility" ),
				"param_name" => "link",
				"value" => __( "", "dutility" ),
				"description" => __( "Enter or select an existing content of your website to link this icon box.", "dutility" )
			),
			array(
				"type" => "textarea",
				"holder" => "",
				"class" => "",
				"heading" => __( "Text", "dutility" ),
				"param_name" => "text",
				"value" => __( "", "dutility" ),
				"description" => __( "A small excerpt that explain what this icon box is all about.", "dutility" )
			)
		) // params
   ) ); //vc_map
}