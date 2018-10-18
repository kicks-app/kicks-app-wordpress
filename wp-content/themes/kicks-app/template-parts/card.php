<div data-href="<?= get_permalink() ?>" class="card card-<?= get_post_type() ?> mb-3">
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<?php the_post_thumbnail('post-thumbnail', array('class' => 'img-top')); ?>
	</a>
	<div class="card-body">
    <?php the_title( sprintf( '<h5 class="entry-title card-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ); ?>
    <div class="card-text">
      <?php the_excerpt() ?>
    </div>
	</div>
</div>
