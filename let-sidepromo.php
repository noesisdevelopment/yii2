<?php


class let_sidepromo_form extends WP_Widget {

	function let_sidepromo_form() {
		// Instantiate the parent object
		parent::__construct( false, 'LET: Side promo' );
	}

	function widget( $args, $instance ) {
		?>
        <div class="widget side-promo">
			<h3 class="widget-title"><?php echo $instance['tit']; ?></h3>
			<div class="widget-content">
                <?php let_promo('sidebar') ?>
				<style>
                .let_promo-sidebar img{ width:100%}
                </style>
                <div class="clear"></div>
            </div>
        </div>
        <?php
	}


	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['tit'] = strip_tags($new_instance['tit']);
		return $instance;
	}
	

	function form( $instance ) {
		?>
        <style>
		.block{ display:block; width:100%}
        </style><br />
        <label for="">Title</label><br />
        <input type="text" class="block" id="<?php echo $this->get_field_id('tit'); ?>" name="<?php echo $this->get_field_name('tit'); ?>" value="<?php echo $instance['tit']; ?>" /><br />
        <?php
	}
}

function let_sidepromo_register_widgets() {
	register_widget( 'let_sidepromo_form' );
}

add_action( 'widgets_init', 'let_sidepromo_register_widgets' );






?>