<?php
/**
 * Integration class for Radium_PriceTables.
 * This class integrates the contact table 
 * generated here into the radium framework
 *
 * @since 1.0.0
 *
 * @package	Radium_PriceTables
 * @author	Franklin M Gitonga
 */
 /**
  * loads all the actions
  *
  * @since 1.0.0
  */

function radium_form_integration_action() {
 			
 	/** Instantiate all the necessary components of the plugin */
 	$integrate = new Radium_Forms_Integrate;

}
add_action( 'init', 'radium_form_integration_action' );
  
class Radium_Forms_Integrate {

	/**
	 * Holds a copy of the object for easy reference.
	 *
	 * @since 1.0.0
	 *
	 * @var object
	 */
	private static $instance;

	/**
	 * Constructor. Hooks all interactions to initialize the class.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
	
		self::$instance = $this;
		
 		/** Register hooks */
 		add_filter('radium_builder_elements', array(&$this, 'builder_contact_element'), 11);	
 		add_action('radium_builder_contact', array(&$this, 'builder_contact_frontend_element'), 11, 3); 
 		add_filter('radium_sample_layouts', array(&$this, 'builder_contact_samples_layout'), 11 );
 		
	}
	
	
	/** 
	 * Register Pricing Element
	 * @return array();
	 * 
	 * @since 1.0.0
	 */
	public function builder_contact_element( $elements ) {

		//Contact Form
			$element_slogan = array(
			
				array(
					'id' 		=> 'contact_form_recipients',
					'name'		=> __( 'Email Recipients', 'radium' ),
					'desc'		=> __( 'Add a custom email recipient. Leave blank to use default site email address', 'radium' ),
					'std'		=> '',
					'type'		=> 'text'
				),
				array(
					'id' 		=> 'contact_form_subject',
					'name'		=> __( 'Subject', 'radium' ),
					'desc'		=> __( '', 'radium' ),
					'std'		=> '',
					'type'		=> 'text'
				)	
				    
			);
			
			$elements['contact'] = array(
				'info' => array(
					'name' 	=> 'Contact Form',
					'id'	=> 'contact',
					'query'	=> 'none',
					'hook'	=> 'radium_contact_block',
					'shortcode'	=> '[contact]',
					'desc' 	=> __( 'contact form', 'radium' )
				),
				'options' => $element_slogan
			);
		
			return $elements;
		
	}
	
	
	/**
	 * Display slider.
	 *
	 * @since 2.1.0
	 *
	 * @param string $slider Slug of custom-built slider to use
	 */

	public function builder_contact_frontend_element(  $id, $settings, $location ) { ?>
		<div class="row">
			<div class="twelve columns">
				<?php echo do_shortcode('[contact-form][contact-field label="Name" type="name" required="true" /][contact-field label="Email" type="email" required="true" /][contact-field label="Website" type="url" /][contact-field label="Comment" type="textarea" required="true" /][/contact-form]'); ?>
			</div>
		</div>
		<?php
	}
	
	/**
	 * Get all sample layouts.
	 *
	 * @return array
	 */
	 
	function builder_contact_samples_layout( $samples ) {
  		
		$samples['contact'] = array(
					'name' => 'Contact Page',
					'id' => 'contact',
					'preview' => plugins_url( 'images/sample-contact-page.png', dirname(__FILE__)),
					
		 			'featured' => array(
		 					'element_1' => array(
		 						'type' => 'map',
		 						'query_type' => 'none',
		 						'width' => 'element1-1',
		 						'options' => array(
		 							'address' => 'New York',
		 							'width' => '100%', 
		 							'height' => '400',
		 						)
		 					)
		 				),
		 				
		 			'primary' => array(
		 					'element_2' => array(
		 					'type' => 'contact',
		 					'query_type' => 'none',
		 					'width' => 'element1-1',
		 					'options' => array( )
		 				)
		 			)
					
				);
		
		return $samples;
	}
	
}
