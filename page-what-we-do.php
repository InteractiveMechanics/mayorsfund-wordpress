<?php get_header(); ?>
<section class="page">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php $hero = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'fullsize' ); ?>
        <?php if ( $hero ): ?>
            <section class="hero" style="background-image: url('<?php echo $hero[0]; ?>')">
                <div class="overlay"></div>
        		<div class="container">
        			<?php get_template_part('includes/inc-title'); ?>
        		</div>
        	</section>
        <?php endif; ?>
        <div class="container">
            <div class="row">
                <?php if ( !$hero ): ?>
                    <div class="col-sm-12">
                        <?php get_template_part('includes/inc-title'); ?>
                    </div>
                <?php endif; ?>
                <div class="col-sm-12 col-md-8">
                    <?php get_template_part('includes/inc-content'); ?>
                    <?php if( have_rows('grant_toolkit') ): ?>
                        <h3>Reports & Resources</h3>
                        <div class="resources">
                            <?php while ( have_rows('grant_toolkit') ): the_row(); ?>
                                <?php $file = get_sub_field('file'); ?>
                                <a href="<?php print $file['url']; ?>" class="resource">
                                    <span class="resource-type"><?php print substr($file['mime_type'], strpos($file['mime_type'], '/') + 1); ?></span>
                                    <h3><?php the_sub_field('name'); ?></h3>
                                </a>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-4 col-lg-3 col-lg-offset-1 hidden-sm hidden-xs">
                    <?php if( have_rows('callout_box') ): ?>
                        <?php while ( have_rows('callout_box') ): the_row(); ?>
                            <div class="callout">
                                <h5><?php the_sub_field('title'); ?></h5>
                                <p><?php the_sub_field('body'); ?></p>
                            </div>
                            <a href="<?php the_sub_field('link'); ?>" class="view-more">View <?php the_sub_field('title'); ?> &raquo;</a>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; endif; ?>
    </div>
</section>
<?php get_footer(); ?>
