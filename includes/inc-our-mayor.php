<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?php if (get_field('our_mayor_video_url')): ?>
                <iframe width="100%" height="460px" src="<?php the_field('our_mayor_video_url'); ?>?hd=1&rel=0&autohide=1&showinfo=0" frameborder="0" allowfullscreen></iframe>
            <?php else : ?>
                <img src="<?php the_field('our_mayor_image'); ?>" />
            <?php endif; ?>
        </div>
        <div class="col-md-4 hidden-sm hidden-xs">
            <blockquote>
                <p><?php the_field('our_mayor_blockquote_text'); ?></p>
                <footer><?php the_field('our_mayor_blockquote_citation'); ?></footer>
            </blockquote>
        </div>
    </div>
</div>