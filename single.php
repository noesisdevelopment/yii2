<?php get_header(); global $post,$web_url,$templ_url; 



?>

<div id="each-post" class="container">
	<div class="row">	
		<div class="left-col  col-md-8">
			<div class="main-header">
                <h1><?php the_title(); ?></h1>
			</div>
            <div class="pull-right">
                <div class="category taxonomy oswald uppercase smaller">
                    <?php $c = 0; $the_category = get_the_category($post->ID); if($the_category){ ?>
                        <strong class="cat"><?php foreach($the_category as $the_cat){ $c++; if($c != 1){ echo ', '; } ?><a href="<?php echo $web_url ?>/?cat=<?php echo $the_cat->term_id; ?>"><?php echo $the_cat->name; ?></a><?php } ?></strong>
                    <?php } ?>
                    <?php $t = 0; $the_tags = get_the_tags($post->ID); if($the_tags){ ?>
                        <strong class="tag"><em class="fa fa-tag"></em>  <?php foreach($the_tags as $the_tag){ $t++; if($t != 1){ echo ', '; } ?><a href="<?php echo $web_url ?>/?tag=<?php echo $the_tag->slug; ?>"><?php echo $the_tag->name; ?></a><?php } ?></strong>
                    <?php } ?>
                </div>
            </div>
            <div class="date oswald">
                <strong><?php echo date('j/n/Y',strtotime($post->post_date)); ?></strong>
            </div>
            
            <?php if(has_post_thumbnail()){ ?>
            <div class="post_thumbnail">
			<?php the_post_thumbnail('featured-big') ?>
            </div>
            <?php } ?>
            
			<div class="main-content white-bg clear">
    
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
            
                        <div class="post" id="post-<?php the_ID(); ?>">
                            <div class="entry">
                                <?php the_content('Pokračování &raquo;'); ?><?php edit_post_link('Edit article', '', ''); ?>
                            </div>
                        </div>
            
                    <?php endwhile; ?>
                    <div class="navigation">
                        <div class="alignleft"><?php next_posts_link('&laquo; Previous') ?></div>
                        <div class="alignright"><?php previous_posts_link('Next &raquo;') ?></div>
                    </div>
            
                <?php else : ?>
                    <h2 class="center">Not Found</h2>
                    <?php include (TEMPLATEPATH . "/searchform.php"); ?>
                <?php endif; ?>
			</div>
            
                    
            <?php if(is_user_logged_in()){ ?> 
            <div class="widget_area bottom">
            
                <?php //if ( ! dynamic_sidebar( 'sidebar-single-bottom' ) ) : endif; ?>
        
            </div>
            <?php } ?>
            
            
            <div class="clearboth"></div>
                    
            
		</div><!-- end of .left-col -->

		<!-- Right Column - sidebar(main) -->
		<?php get_sidebar('articles'); ?>

	</div>
</div>
<script type="text/javascript" src="<?php echo $templ_url ?>/includes/widgets/let-omega-clock/js/betterClock.js"></script>
                <script type="text/javascript">
                var realTimeAnimation = new BetterClock(104, 99, '');
                realTimeAnimation.init("realTimeClockCanvas");
                </script>
                 
<?php get_footer(); ?>