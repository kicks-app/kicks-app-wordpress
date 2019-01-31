<div data-href="<?= get_permalink() ?>" class="card card-<?= get_post_type() ?> mb-3">
	<?php
		/*
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail('post-thumbnail', array('class' => 'img-top')); ?>
		</a>
		*/
	?>
	<div class="card-body">
    <?php the_title( sprintf( '<h5 class="entry-title card-title"><a class="text-dark" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ); ?>
		<?php
	    $tags = get_tags();
	    if ( $tags ) : ?>
				<div class="tags mb-3">
	       <?php foreach ( $tags as $tag ) : ?>
	         <a class="badge badge-secondary" href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" title="<?php echo esc_attr( $tag->name ); ?>"><?php echo esc_html( $tag->name ); ?></a>
	       <?php endforeach; ?>
			 	</div>
	    <?php endif;
		?>
    <div class="card-text">
      <?= get_the_excerpt($post) ?>
    </div>
	</div>
</div>
