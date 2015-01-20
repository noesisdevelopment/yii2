<?php get_header(); global $post; ?>

<div class="container default-page">
	<?php the_post_thumbnail('promo-top-high'); ?>
	<div class="row">	
		<div class="left-col col-md-8">
			<div class="main-header">
                <h1><?php the_title(); ?></h1>
			</div>
			<div class="main-content">
            
            	<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
                        <div class="post page bg_fff <?php echo $post->post_name; ?>" id="post-<?php the_ID(); ?>">
                            <div class="entry">
                                <?php the_content(); ?>            <?php edit_post_link('Edit Page ', '', ''); ?>

                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            
            
            
            
            
            
            
			</div>
                    
		
		</div><!-- end of .left-col -->

		<!-- Right Column - sidebar(main) -->
		<?php get_sidebar(); ?>

	</div>
</div>

<?php get_footer(); ?>