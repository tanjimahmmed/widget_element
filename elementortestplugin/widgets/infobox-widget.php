<?php

class Elementor_Infobox_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return "InfoboxWidget";
    }

	public function get_title() {
        return __("Infobox Widget",'elementortestplugin');
    }

	public function get_icon() {
        return 'fa fa-info';
    }

	public function get_categories() {
        return array('general');
    }

    protected function _register_controls() {
        $this->start_controls_section(
			'content_section',
			[
				'label' =>__('Content', 'elementortestplugin'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        );

        
        

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
       
       ?>
       <a href="#">
       <div class="infostamp">
           <div class="stamp">
            <img src="../assets/img/android-24px.svg" alt="Kiwi standing on oval">
           </div>
           <div class="data">
               <h3>Lorem, ipsum dolor.</h3>
               <ul>
                   <li>Lorem ipsum dolor sit.</li>
                   <li>Lorem ipsum dolor sit.</li>
               </ul>
           </div>
           <div class="clear"></div>
       </div>
       </a>
       <?php
    }

    /*protected function _content_template(){
       
    }*/
}