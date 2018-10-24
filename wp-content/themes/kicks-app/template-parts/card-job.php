<div data-href="<?= get_permalink() ?>" class="card card-<?= get_post_type() ?> mb-3">
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<?php the_post_thumbnail('post-thumbnail', array('class' => 'img-top')); ?>
	</a>
	<div class="card-body">
    <h5 class="entry-title card-title mb-0">
      <a href="<?= get_permalink(); ?>" rel="bookmark">
        <?= get_the_title(); ?>
      </a>
    </h5>
		<?php
			$tags = get_terms('job_tag');
			if ( $tags ) : ?>
				<div class="tags mb-2">
				 <?php foreach ( $tags as $tag ) : ?>
					 <a class="badge badge-secondary" href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" title="<?php echo esc_attr( $tag->name ); ?>">
						 <?php echo esc_html( $tag->name ); ?>
					 </a>
				 <?php endforeach; ?>
				</div>
			<?php endif;
		?>
    <div class="card-text">
      <?php the_excerpt() ?>
    </div>
	</div>
</div>
