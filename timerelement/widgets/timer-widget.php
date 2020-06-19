<?php


class Elementor_Timer_Widget Extends \Elementor\Widget_Base {

	public function get_name() {
		return 'timerWidget';
	}

	public function get_title() {
		return __( 'Timer Widget', 'timerelement' );
	}

	public function get_icon() {
		return 'fa fa-clock-o';
	}

	public function get_categories() {
		return [ 'timerelement' ];
	}

	protected function _register_controls() {

        $this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'timerelement' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'display_type',
			[
				'label' => __( 'Display Type', 'timerelement' ),
				'type'   => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'clock' => __('clock', 'timerelement'),
					'timerc' => __('Time CountDown', 'timerelement'),
					'genericc' => __('Normal CountDown', 'timerelement'),
				],
				'default' => 'clock'
			]
		);

		$this->add_control(
			'clock_format',
			[
				'label' => __( 'Clock Format', 'timerelement' ),
				'type'   => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'12' => __('12 HOUR', 'timerelement'),
					'24' => __('24 HOUR', 'timerelement'),
				],
				'default' => '12',
				'condition' => [
					'display_type' => 'clock'
				]
			]
		);

		$this->add_control(
			'target_clock_time',
			[
				'label' => __( 'Target Time', 'timerelement' ),
				'type'   => \Elementor\Controls_Manager::DATE_TIME,
				'condition' => [
					'display_type' => 'timerc'
				],
				'label_block' => false,
				
			]
		);

		$this->add_control(
			'generic_countdown',
			[
				'label' => __( 'Countdown Form', 'timerelement' ),
				'type'   => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'display_type' => 'genericc'
				],
				'label_block' => false,
				
			]
		);

		$this->add_control(
			'decrement',
			[
				'label' => __( 'Decrease By (milliseconds)', 'timerelement' ),
				'type'   => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'display_type' => 'genericc'
				],
				'label_block' => false,
				'default' => 1000
				
			]
		);

		$this->end_controls_section();
	}


	protected function render() {

		$settings   = $this->get_settings_for_display(); //and echo $settings['dummy_text']
		$display_type = $this->get_settings('display_type');
		$clock_format = $this->get_settings('clock_format');
		$target_time = $this->get_settings('target_clock_time');
		$countdown = $this->get_settings('generic_countdown');
		$decrement = $this->get_settings('decrement');
        ?>
		<diV class="clock" 
		data-display-type="<?php echo $display_type ?>"
		data-clock-format="<?php echo $clock_format ?>"
		data-target-time="<?php echo $target_time ?>"
		data-countdown="<?php echo $countdown ?>"
		data-decrement="<?php echo $decrement ?>"
		>
		</diV>
		<?php

	}

	// protected function _content_template() {
 
	// }

}