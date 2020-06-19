<?php

class Elementor_Test_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return "TestWidget";
    }

	public function get_title() {
        return __("TestWidget",'elementortestplugin');
    }

	public function get_icon() {
        return 'fa fa-image';
    }

	public function get_categories() {
        return array('general','testcategory', 'sliders');
    }

	protected function _register_controls() {
        $this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'elementortestplugin' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'heading',
			[
				'label' => __( 'Type Something', 'elementortestplugin' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Hello World', 'elementortestplugin' ),
			]
		);

		$this->add_control(
			'heading_description',
			[
				'label' => __( 'Type Description', 'elementortestplugin' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Description', 'elementortestplugin' ),
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'position_section',
			[
				'label' =>__('position', 'elementortestplugin'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'alignment',
			[
				'label' => __( 'Heading Alignment', 'elementortestplugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left'  => __( 'Left', 'elementortestplugin' ),
					'right' => __( 'Right', 'elementortestplugin' ),
					'center' => __( 'Center', 'elementortestplugin' ),
				],
				'selectors'=>[
					'{{WRAPPER}} h1.heading'=>'text-align: {{VALUE}}'
				]
			]
		);

		$this->add_control(
			'description_alignment',
			[
				'label' => __( 'Description Alignment', 'elementortestplugin' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left'  => __( 'Left', 'elementortestplugin' ),
					'right' => __( 'Right', 'elementortestplugin' ),
					'center' => __( 'Center', 'elementortestplugin' ),
				],
				'selectors'=>[
					'{{WRAPPER}} p'=>'text-align: {{VALUE}}'
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'color_section',
			[
				'label' =>__('Color', 'elementortestplugin'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'header_color',
			[
				'label' => __( 'Heading Color', 'elementortestplugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				// 'placeholder' => __( 'Hello World', 'elementortestplugin' ),
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} h1.heading'=>'color: {{VALUE}}'
				]
			]
		);
		
		$this->add_control(
			'description_color',
			[
				'label' => __( 'Description Color', 'elementortestplugin' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				// 'placeholder' => __( 'Hello World', 'elementortestplugin' ),
				'default' => '#888888',
				'selectors' => [
					'{{WRAPPER}} p'=>'color: {{VALUE}}'
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'image_section',
			[
				'label' =>__('Image', 'elementortestplugin'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'imagex',
			[
			'label' => __('Image','elementortestplugin'),
			'type' => \Elementor\Controls_Manager::MEDIA,
			'default' =>[
				'url' =>\Elementor\Utils::get_placeholder_image_src()
			]
		]
	);

	$this->add_group_control(
		\Elementor\Group_Control_Image_Size::get_type(),
		[
			'default' => 'large',
			'name' => 'imagesz',
		]
	);

		$this->end_controls_section();

		$this->start_controls_section(
			'demo_section',
			[
			'label' => __('Control Demo','elementortestplugin'),
			'type' => \Elementor\Controls_Manager::TAB_CONTENT,
		]
	);

		$this->add_control(
			'demo_select2',
			[
				'label' => __( 'Select 2 Demo', 'elementortestplugin' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => [
					'BD'  => __( 'Bangladesh', 'elementortestplugin' ),
					'BR' => __( 'Brazil', 'elementortestplugin' ),
					'AR' => __( 'Argentina', 'elementortestplugin' ),
					'AU' => __( 'Australia', 'elementortestplugin' ),
					'DK' => __( 'Denmark', 'elementortestplugin' ),
				],
			]
		);

		$this->add_control(
			'demo_choose',
			[
				'label' => __( 'Choose Demo', 'elementortestplugin' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'label_block' => true,
				'toggle' => false,
				'options' => [
					'left' => [
						'title' =>__('Left', 'elementortestplugin'),
						'icon' => 'fa fa-align-left'
					],
					'center' => [
						'title' =>__('Center', 'elementortestplugin'),
						'icon' => 'fa fa-align-center'
					],
					'right' => [
						'title' =>__('Right', 'elementortestplugin'),
						'icon' => 'fa fa-align-right'
					],
					'justify' => [
						'title' =>__('justify', 'elementortestplugin'),
						'icon' => 'fa fa-align-justify'
					],
				],
			]
		);

		$this->add_control(
			'demo_dimension',
			[
				'label' => __( 'Dimension', 'elementortestplugin' ),
				'type' => \Elementor\Controls_Manager::IMAGE_DIMENSIONS,
				'description' => __('Input Width & Height', 'elementortestplugin'),
				'default' => [
					'height' => 100,
					'width'  => 300
				]

			]
		);

		$this->add_control(
			'gallery',
			[
				'label' => __( 'Gallery Control', 'elementortestplugin' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
			]
		);

		$this->add_control(
			'demo_icon',
			[
				'label' => __( 'Icon Control', 'elementortestplugin' ),
				'type' => \Elementor\Controls_Manager::ICON,
				'include' => [
					'fa fa-facebook',
					'fa fa-twitter',
					'fa fa-github'
				],
				'default' => 'fa fa-twitter'
			]
		);


		$this->add_control(
			'demo_popover',
			[
				'label' => __( 'Fonts', 'elementortestplugin' ),
				'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
			]
		);

		$this->start_popover();
		$this->add_control(
			'demo_font_p1',
			[
				'label' => __( 'Font For P1', 'elementortestplugin' ),
				'type' => \Elementor\Controls_Manager::FONT,
				'default' => "'Open Sans', 'sans-serif'",
				'selectors'=> [
					'{{WRAPPER}} .p1'=>'font-family: {{VALUE}}'
				]
			]
		);

		$this->add_control(
			'demo_font_p2',
			[
				'label' => __( 'Font For P2', 'elementortestplugin' ),
				'type' => \Elementor\Controls_Manager::FONT,
				'default' => "'Open Sans', 'sans-serif'",
				'selectors'=> [
					'{{WRAPPER}} .p2'=>'font-family: {{VALUE}}'
				]
			]
		);
		$this->end_popover();

		$this->add_control(
			'demo_slider',
			[
				'label' => __( 'Font Size', 'elementortestplugin' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', '%', 'rem'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 120,
						'step' => 5
					],
					'%' => [
						'min' => 0,
						'max' => 200,
						'step' => 10
					],
					'rem' => [
						'min' => 0,
						'max' => 200,
						'step' => 10
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 60
				],
				'selectors'=> [
					'{{WRAPPER}} .p1'=>'font-size: {{SIZE}}{{UNIT}}'
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => __( 'Typography For P3', 'elementortestplugin' ),
				'name' => 'demo_typography',
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector'=> '{{WRAPPER}} .p3',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'label' => __( 'Text Shadow', 'elementortestplugin' ),
				'name' => 'demo_ts',
				'selector'=> '{{WRAPPER}} .p3',
			]
		);

		$this->end_controls_section();
    }

	protected function render() {
        $settings = $this->get_settings_for_display();
		$heading = $settings['heading'];
		$description = $settings['heading_description'];

		// $this->add_inline_editing_attributes('heading', 'basic');
		// $this->add_inline_editing_attributes('heading_description', 'basic');
		// $this->add_render_attribute('heading', [
		// 	'class'=>'heading'
		// ]);
		// $this->add_render_attribute('heading_description', [
		// 	'class'=>'description'
		// ]);
		// echo "<h1 ". $this->get_render_attribute_string('heading') .">".esc_html($heading)."</h1>";
		// echo "<p ". $this->get_render_attribute_string('heading_description') .">".wp_kses_post($description)."</p>";
		echo "<h1 class='heading'>". esc_html($heading) . "</h1>";
		echo "<p class='description'>". wp_kses_post($description) . "</p>";
		// echo wp_get_attachment_image($settings['image']['id']);
		echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($settings, 'imagesz', 'imagex');
		echo "<div>";
		$countries = $settings['demo_select2'];
		print_r($countries);
		echo "<br/>";
		echo $settings['demo_choose'];
		echo "<br/>";
		echo $settings['demo_dimension'];
		echo "</div>";

		echo "<div>";
		$gallery_images = $settings['gallery'];
		echo "<pre>";
		// print_r($gallery_images);
		foreach($gallery_images as $gallery_image){
			echo  wp_get_attachment_image($gallery_image['id'],'thumbnail');
		}
		echo "</pre>";
		echo "</div>";

		echo "<div>";
		echo '<i class="'.$settings['demo_icon'].'"></i>';
		echo "</div>";

		echo "<div>";
		?>
		<p class="p1">
		Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam natus eius est.
		</p>

		<p class="p2">
		Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam natus eius est.
		</p>

		<p class="p3">
		Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam natus eius est.
		</p>

		<?php
		echo "</div>";
		?>

		<?php
    }
	
    protected function _content_template() {
		?>
		<#
		var image = {
			id:settings.imagex.id,
			url:settings.imagex.url,
			size:settings.imagesz_size,
			dimension: settings.imagesz_custom_dimension,
		}

		var imageUrl = elementor.imagesManager.getImageUrl(image);
		console.log(imageUrl);
		#>

		<h1 class='heading'>{{{settings.heading}}}</h1>
		<p class='description'>{{{settings.heading_description}}}</p>
		<img src="{{{imageUrl}}}" alt="">
		<ul>
		<#
		_.each(settings.demo_select2, function(country){ #> 
		<li>{{{country}}}</li>
		 <#});
		 #>
		</ul>
		<div>
		{{{settings.demo_choose}}}
		</div>
		<div>
		Width: {{{settings.demo_dimension.width}}}<br/>
		Height: {{{settings.demo_dimension.height}}}
		</div>
		<div>
		<#
		_.each(settings.gallery, function(image){
			var image = {
			id:image.id,
			url:image.url,
			size:'thumbnail',
		}
		var imageUrl = elementor.imagesManager.getImageUrl(image);
			#>
			<img src='{{imageUrl}}'/>
			<#
		});
		#>
		</div>

		<div>
		 	
			 <i class="{{{ settings.demo_icon }}}"></i>
		</div>

		<p class="p1">
		Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam natus eius est.
		</p>

		<p class="p2">
		Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam natus eius est.
		</p>
		
		<p class="p3">
		Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam natus eius est.
		</p>

		<p>
		Size: {{{ settings.demo_slider.size }}} {{{ settings.demo_slider.unit }}}
		</p>

		<#
		console.log(settings);
		#>

		<?php
	}
    
}