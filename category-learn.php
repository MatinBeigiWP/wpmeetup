<?php get_header(); ?>

	<div class="container columns">
		<div class="row">

<?php echo '<h1 class="page-title" style="direction: rtl;">'.$title = single_cat_title( '', false ).'</h1>'; ?>


<div class="col-md-9 col-sm-12 col-xs-12 pull-right">
            
            
            
				<div class="events">
					<?php if(have_posts()): while(have_posts()): the_post(); ?>
					<div class="event clearfix">
						<div class="col-md-4 col-sm-4 col-xs-12 pull-right">
						    <?php if(has_post_thumbnail()){ ?>
						    <?php the_post_thumbnail('thumbnail'); ?>
						    <?php }else{ ?>
						    <img class="img-rounded thumbnail" src="<?php echo get_template_directory_uri(); ?>/dev/images/dummy.png">
						    <?php } ?>
						</div>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p><?php the_excerpt(); ?></p>
							<p class="text-left ltr"><?php the_time("l, d F Y, H:i A"); ?></p>
							<hr>
							<div class="clearfix">
								<p class="pull-left attendees">
								<span><strong>
								<?php
								    $atcnt    = get_post_meta(get_the_ID(), "_atcnt", true);
								    //$matches  = preg_grep ('/jpeg/i', get_post_meta(get_the_ID(), "_imgurl", true));
								    
								?></strong><?php the_author(); ?></span>
								<?php 
									if(get_post_meta(get_the_ID(), "_imgurl", true)){
										$i = 0;
										foreach(get_post_meta(get_the_ID(), "_imgurl", true) as $img){
											if($i > 11)
												break;
											
											if(check_image_exists($img))
												echo '<img class="rounded-100-32" src="'.$img.'">';
											
											$i++;
										}
									}
								?>
								</p>
							</div><!--p class="pull-left"><a class="btn btn-default" href="#" role="button">بیشتر بخوانید</a></p-->
						</div>
					</div><!--./event-->
					<?php endwhile; pagination_posts_nav_cat(); endif; ?>

				</div><!--./events-->
			</div><!--./col-md-9-->
			
			<div class="col-md-3 col-sm-12 col-xs-12" style="text-align: right;direction: rtl;line-height: 30px;">
						<div id="sidebar-primary" class="sidebar">
						<?php dynamic_sidebar( 'primary' ); ?>
						</div>
			</div>

		</div>
	</div><!-- /container -->
<?php get_footer(); ?>