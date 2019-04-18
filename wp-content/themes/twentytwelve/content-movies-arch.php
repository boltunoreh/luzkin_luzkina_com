<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<div class="movie_arch">
			<div class="movie_arch_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
      <?php $image = get_field('movie_poster'); ?>
      <div class="movie_arch_poster">
        <a href="<?php the_permalink(); ?>"><img src="<?php echo $image['url' ]; ?>" alt="<?php echo $image['title' ]; ?>"></a>
      </div>
		<?php endif; ?>
	</div>
