<?php


class let_oom_form extends WP_Widget {

	function let_oom_form() {
		// Instantiate the parent object
		parent::__construct( false, 'Golfmol: Order of merit' );
	}

	function widget( $args, $instance ) {
		?>
        <div class="widget golfmol-oom">
			<h3 class="widget-title"><?php echo $instance['tit']; ?></h3>
			<div class="widget-content">
                <?php golfmol_oom($instance['rows']) ?>
                <div class="clear"></div>
            </div>
        </div>
        <?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['tit'] = strip_tags($new_instance['tit']);
		$instance['rows'] = strip_tags($new_instance['rows']);
		return $instance;
	}
	

	function form( $instance ) {
		?>
        <style>
		.block{ display:block; width:100%}
        </style><br />
        <label for="">Title</label><br />
        <input type="text" class="block" id="<?php echo $this->get_field_id('tit'); ?>" name="<?php echo $this->get_field_name('tit'); ?>" value="<?php echo $instance['tit']; ?>" /><br />

        <label for="">Rows</label><br />
		<select id="<?php echo $this->get_field_id('rows'); ?>" name="<?php echo $this->get_field_name('rows'); ?>">
        <?php for($i=1;$i<20;$i++){ ?>
        <option value="<?php echo $i ?>" <?php selected($i,$instance['rows']) ?>><?php echo $i ?></option>
		<?php } ?>
        </select><br>
        <?php
	}
}

function let_oom_register_widgets() {
	register_widget( 'let_oom_form' );
}

add_action( 'widgets_init', 'let_oom_register_widgets' );






?>