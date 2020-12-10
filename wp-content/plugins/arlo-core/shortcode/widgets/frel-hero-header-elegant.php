<?php
namespace Frel\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use Frel\Frel_Helper;


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) { exit; }


/**
 * Frel Site Title
 */
class Frel_Hero_Header_Elegant extends Widget_Base {

	public function get_name() {
		return 'frel-hero-header-elegant';
	}

	public function get_title() {
		return __( 'Hero Header Elegant', 'frenify-core' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'frel-elements' ];
	}

	protected function _register_controls() {
		
		$this->start_controls_section(
			'section1',
			[
				'label' => __( 'Content', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			'title',
			  [
				 'label'       => __( 'Title', 'frenify-core' ),
				 'type'        => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your title text here', 'frenify-core' ),
				 'default' 	   => __( 'Albert Walkers', 'frenify-core' ),
				 'label_block' => true,
			  ]
		);
		
		
		$this->add_control(
		  	'desc',
			  [
				 'label'   => __( 'Description Pretext', 'frenify-core' ),
				 'type'    => Controls_Manager::TEXTAREA,
				 'placeholder' => __( 'Type your Description pretext here', 'frenify-core' ),
				 'default' 	   => __( 'I\'m a', 'frenify-core' ),
			  ]
		);
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'module_title',
			[
				 'label'       	=> __( 'Description Slide Text', 'frenify-core' ),
				 'type'        	=> Controls_Manager::TEXT,
				 'placeholder' 	=> __( 'Slide text here...', 'frenify-core' ),
				 'label_block' 	=> true,
			]
		);
		$this->add_control(
			'module_items',
			[
				'label' => __( 'Description Slide Items', 'frenify-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'module_title' 			=> __( 'Freelancer', 'frenify-core' ),
					],
					[
						'module_title' 			=> __( 'Web Developer', 'frenify-core' ),
					],
					[
						'module_title' 			=> __( 'Photographer', 'frenify-core' ),
					],
					
				],
				'title_field' => '{{{ module_title }}}',
			]
		);
		
		$this->add_control(
			  'image_url',
			  [
				 'label' => __( 'Choose Center Image', 'frenify-core' ),
				 'type' => Controls_Manager::MEDIA,
				  'default' 	=> [
					'url' 		=> ARLO_PLACEHOLDERS_URL.'bro.jpg'
				 ],
			  ]
		);
		
		
		$this->end_controls_section();
		
		
		$this->start_controls_section(
			'section_bg',
			[
				'label' => __( 'Background & Typography', 'frenify-core' ),
			]
		);
	
		$this->add_control(
			  'bg_img_url',
			  [
				'label' => __( 'Background Image', 'frenify-core' ),
				'type' => Controls_Manager::MEDIA,
				'default' 	=> [
					'url' 		=> ARLO_PLACEHOLDERS_URL.'bro_1.jpeg'
				],
			  ]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Title Typography', 'frenify-core' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .title_holder h3',
				'fields_options' => [
					'font_weight' => [
						'default' => '500',
					],
					'font_family' => [
						'default' => 'Kaushan Script',
					],
					'font_size'   => [
						'default' => [
										'unit' => 'px',
										'size' => '72'
									]
					],
					'line_height' => [
						'default' => [
										'unit' => 'px',
										'size' => '72',
									]
					],
					'letter_spacing' => [
						'default' => [
										'unit' => 'px',
										'size' => '0.5',
									]
					],
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_dimensions',
			[
				'label' => __( 'Dimensions', 'frenify-core' ),
			]
		);
		
		$this->add_control(
			  'h_wort',
			  [
				 'label'       => __( 'Height', 'frenify-core' ),
				 'type' => Controls_Manager::SELECT,
				 'default' => 'vh',
				 'options' => [
					'custom'			=> __( 'Custom', 'frenify-core' ),
					'vh' 				=> __( 'Window Height', 'frenify-core' ),
				 ],
			  ]
		);
		
		$this->add_control(
			  'h_wort_pt',
			  [
				 'label'   => __( 'Padding Top (px)', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 200,
				 'min'     => 0,
				 'max'     => 1000,
				 'step'    => 1,
				 'selectors' => [
					'{{WRAPPER}} .content_holder' => 'padding-top: {{VALUE}}px;',
				],
				'condition' => [
								'h_wort' => array('custom')
								]
			  ]
		);
		
		$this->add_control(
			  'h_wort_pb',
			  [
				 'label'   => __( 'Padding Bottom (px)', 'frenify-core' ),
				 'type'    => Controls_Manager::NUMBER,
				 'default' => 200,
				 'min'     => 0,
				 'max'     => 1000,
				 'step'    => 1,
				 'selectors' => [
					'{{WRAPPER}} .content_holder' => 'padding-bottom: {{VALUE}}px;',
				],
				'condition' => [
								'h_wort' => array('custom')
								]
			  ]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section2',
			[
				'label' => __( 'Coloring', 'frenify-core' ),
			]
		);
		
		
		$this->add_control(
			'sh1_color',
			[
				'label' => __( 'Animation Shape #1 Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'default' => 'rgba(255,75,54,0.3)',
				'selectors' => [
					'{{WRAPPER}} .firefox_svg.first' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'sh2_color',
			[
				'label' => __( 'Animation Shape #2 Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'default' => 'rgba(0,126,266,0.3)',
				'selectors' => [
					'{{WRAPPER}} .firefox_svg.second' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Title Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .content_holder h3' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		
		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Description Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .fn_cs_hero_header_exclusive .title_holder p' => 'color: {{VALUE}};',
				],
				'default' => '#fff',
			]
		);
		
		
		$this->add_control(
			'bg_color',
			[
				'label' => __( 'Overlay Color', 'frenify-core' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .o_color' => 'background-color: {{VALUE}};',
				],
				'default' => 'rgba(0,0,0,0)',
			]
		);
		
		$this->end_controls_section();

		

	}




	protected function render() {
		$title = get_bloginfo( 'name' );

		if ( empty( $title ) )
			return;

		
		$settings 			= $this->get_settings();
		
		
		$title 				= $settings['title'];
		$description 		= $settings['desc'];
		$sh1_color 			= $settings['sh1_color'];
		$sh2_color 			= $settings['sh2_color'];
		
		$h_wort 			= $settings['h_wort'];
		$bg_img_url 		= $settings['bg_img_url']['url'];
		$image 				= $settings['image_url']['url'];
		$module_items		= $settings['module_items'];
		$items				= '';
		if($module_items){
			foreach($module_items as $module_item){
				$items .= $module_item['module_title'] . ':::';
			}
		}
		if($items != ''){
			$items = substr($items, 0, -3);
		}
		
		$shape1			= '<svg class="fn_elegant_shape first other_svg"  xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 288 288">
		<linearGradient id="PSgrad_0" x1="70.711%" x2="0%" y1="70.711%" y2="0%">
		<stop offset="0%" stop-color="'.$sh1_color.'" stop-opacity="1" />
		<stop offset="100%" stop-color="'.$sh1_color.'" stop-opacity="1" />
		</linearGradient>
		<path fill="url(#PSgrad_0)"/>
		</svg>';
		$shape2			= '<svg class="fn_elegant_shape second other_svg"  xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 288 288">
		<linearGradient id="PSgrad_1" x1="70.711%" x2="0%" y1="70.711%" y2="0%">
		<stop offset="0%" stop-color="'.$sh2_color.'" stop-opacity="1" />
		<stop offset="100%" stop-color="'.$sh2_color.'" stop-opacity="1" />
		</linearGradient>
		<path fill="url(#PSgrad_1)"/>
		</svg>';
		
		$agent			= '';
		if (isset($_SERVER['HTTP_USER_AGENT'])) {
			$agent 		= $_SERVER['HTTP_USER_AGENT'];
		}
		if (strlen(strstr($agent, 'Firefox')) > 0) {
			$browser 	= 'firefox';
			$shape1		= '<img class="arlo_w_fn_svg fn_elegant_shape first firefox_svg" src="'.FREL_PLUGIN_URL.'assets/svg/arlo_shape_1.svg" alt="svg" />';
			$shape2		= '<img class="arlo_w_fn_svg fn_elegant_shape second firefox_svg" src="'.FREL_PLUGIN_URL.'assets/svg/arlo_shape_2.svg" alt="svg" />';
		}
		//Detect special conditions devices
		$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
		$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
		$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
		$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
		$webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");

		//do something with this information
		if( $iPod || $iPhone ){
			//browser reported as an iPhone/iPod touch -- do something here
			$shape1		= '<img class="arlo_w_fn_svg fn_elegant_shape first firefox_svg" src="'.FREL_PLUGIN_URL.'assets/svg/arlo_shape_1.svg" alt="svg" />';
			$shape2		= '<img class="arlo_w_fn_svg fn_elegant_shape second firefox_svg" src="'.FREL_PLUGIN_URL.'assets/svg/arlo_shape_2.svg" alt="svg" />';
		}else if($iPad){
			//browser reported as an iPad -- do something here
			$shape1		= '<img class="arlo_w_fn_svg fn_elegant_shape first firefox_svg" src="'.FREL_PLUGIN_URL.'assets/svg/arlo_shape_1.svg" alt="svg" />';
			$shape2		= '<img class="arlo_w_fn_svg fn_elegant_shape second firefox_svg" src="'.FREL_PLUGIN_URL.'assets/svg/arlo_shape_2.svg" alt="svg" />';
		}else if($Android){
			//browser reported as an Android device -- do something here
			$shape1		= '<img class="arlo_w_fn_svg fn_elegant_shape first firefox_svg" src="'.FREL_PLUGIN_URL.'assets/svg/arlo_shape_1.svg" alt="svg" />';
			$shape2		= '<img class="arlo_w_fn_svg fn_elegant_shape second firefox_svg" src="'.FREL_PLUGIN_URL.'assets/svg/arlo_shape_2.svg" alt="svg" />';
		}else if($webOS){
			//browser reported as a webOS device -- do something here
			$shape1		= '<img class="arlo_w_fn_svg fn_elegant_shape first firefox_svg" src="'.FREL_PLUGIN_URL.'assets/svg/arlo_shape_1.svg" alt="svg" />';
			$shape2		= '<img class="arlo_w_fn_svg fn_elegant_shape second firefox_svg" src="'.FREL_PLUGIN_URL.'assets/svg/arlo_shape_2.svg" alt="svg" />';
		}
	
		$oImage			= '<div class="o_img" data-bg-img="'.$bg_img_url.'"></div>';
		
		$html 				= Frel_Helper::frel_open_wrap();
		$title_holder		= '<span class="t_image" style="background-image:url('.$image.')">'.$shape1.$shape2.'</span><div class="title_holder"><h3>'.$title.'</h3><p>'.$description.' <span class="arlo_fn_animation_text" data-items="'.$items.'"></span></p></div>';
		
		
		$content 			= '<div class="container"><div class="content_holder">'.$title_holder.'</div></div>';
		$bGround			= '<div class="bg_holder">'.$oImage.'<div class="o_color"></div></div>';
		$html .= '<div class="fn_cs_hero_header_exclusive fn_elegant" data-height="'.$h_wort.'">'.$content.$bGround.'</div>';
		$html .= Frel_Helper::frel_close_wrap();
		
		echo $html;
	}

}
