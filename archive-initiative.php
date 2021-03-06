<?php get_header(); ?>
<input type="hidden" value="<?php if(isset($_GET['priority'])){ echo $_GET['priority']; } ?>" id="priority-querystring" />
<section class="initiatives">
    <div class="container">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <h5>Our Initiatives</h5>
                    <h1>Initiatives &amp; Programs</h1>
                </div>
                <div class="col-md-4 hidden-sm hidden-xs">
                    <div class="filters">
                        <p class="filter">Filter by Priority</p>
                        <?php
                            $terms = get_terms( 'priorities', array('hide_empty' => 0, 'has_password' => false) );
                            if ( !empty( $terms ) && !is_wp_error( $terms ) ): foreach ( $terms as $term ): ?>
                                <div class="icon <?php print $term->slug; ?> active" id="<?php echo $term->slug; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php print $term->name; ?>" data-container="body">
                                    <?php include('svg/icon_' . $term->slug . '.php'); ?>
                                </div>
                        <?php endforeach; endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
                <?php $terms = get_the_terms( $post->ID, 'priorities' ); ?>
                <?php if (!get_field('is_hidden')): ?>
                <div class="col-sm-6">
                    <a href="<?php the_permalink(); ?>" class="initiative-summary" data-priorities="<?php foreach ( $terms as $term ){ echo $term->slug . ' '; } ?>">
                       <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'fullsize' ); ?>
                       <div class="image" style="background-image:url('<?php print $image[0]; ?>');"></div>
                        <?php foreach ( $terms as $term ): ?>
                            <div class="icon <?php print $term->slug; ?>"><?php include('svg/icon_' . $term->slug . '.php'); ?></div>
                        <?php endforeach; ?>
                        <h3><?php the_title(); ?></h3>
                        <p><?php the_field('short_description'); ?></p>
                    </a>
                </div>
                <?php endif; ?>
            <?php endwhile; endif; ?>
        </div>
        <div class="row hidden">
            <a class="btn btn-default" href="#" role="button" id="show-more"><h4>View More Programs</h4></a>
        </div>
    </div>
</section>
<?php get_footer(); ?>
