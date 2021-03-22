<?php get_header(); ?>

	<div class="container columns">
		<div class="row">
<?php echo '<h1 class="page-title" style="direction: rtl;">'.$title = single_cat_title( '', false ).'</h1>'; ?>

			<div class="col-md-9 pull-right">
				<div class="events">
					<div class="event clearfix">
						<!--div class="col-md-4 pull-right">
                    <img class="img-rounded thumbnail" src="dev/images/dummy.png">
                  </div-->
                  		<?php if(have_posts()): while(have_posts()): the_post(); ?>
						<div class="col-md-12">
							<h2><?php the_title(); ?></h2>
							<p><?php the_excerpt(); ?></p>
							<p class="text-left ltr"><?php the_time("l, d F Y, H:i A"); ?></p>
							<hr>
							<div class="clearfix">
								<p class="pull-left attendees">
									<?php 
                                	    $atcnt    = get_post_meta(get_the_ID(), "_atcnt", true);
                                	    $matches  = preg_grep ('/jpeg/i', get_post_meta(get_the_ID(), "_imgurl", true));
                                	    $fixit = $atcnt - count($matches);
										for($i = 1; $i <= $fixit; $i++){
												echo '<img class="rounded-100-32" src="'.get_template_directory_uri().'/dev/images/avatar.png">';
										}
										
										if(get_post_meta(get_the_ID(), "_imgurl", true)){
											foreach(get_post_meta(get_the_ID(), "_imgurl", true) as $img){
												if(check_image_exists($img))
													echo '<img class="rounded-100-32" src="'.$img.'">';
											}
										}

                                	?>
								</p>
							</div>
						</div>
						<div class="content col-lg-12">
							<?php the_content(); ?>
						</div>
						<?php
						endwhile; endif;
                        if ( comments_open() || get_comments_number() ) : ?>
                        <div class="col-lg-12"><?php comments_template(); ?></div>
                        <?php endif; ?>
					</div><!--./event-->
				</div><!--./events-->
			</div><!--./col-md-9-->
			
			<div class="col-md-3 pull-left">

				

			<div id="sidebar-primary" class="sidebar" style="direction: rtl;">
			<?php dynamic_sidebar( 'primary' ); ?>
			</div>

			</div>
			
		</div>
	</div><!-- /container -->
<?php get_footer(); ?>