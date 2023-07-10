<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-index__item">

		<div class="container">

			<div class="d-sm-flex align-items-center">

				<div class="col-sm-4">
					<a href="<?php echo the_permalink(); ?>">
						<?php if (has_post_thumbnail()) : ?>
							<div class="post-index__image">
								<?php the_post_thumbnail('blog-thumbnail'); ?>
							</div>
						<?php endif; ?>
					</a>
				</div>
				
				<div class="post-index__meta col-sm-8">
				
					<h3 class="post-index__title"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h3>

					<div class="post-index__category">
						<?php foreach (get_the_category() as $category): ?>

							<?php $item_count = count(get_the_category()); ?>

							<?php if ($item_count > 1): ?>
								<?php echo $category->name.', '; ?>
							<?php else: ?>
								<?php echo $category->name; ?>
							<?php endif; ?>

						<?php endforeach; ?>
					</div>
				
					<p class="post-index__excerpt">
						<?php $limit = 60; echo excerpt($limit); ?>
					</p>

					<span class="post-index__read-more">
						<a href="<?php echo the_permalink(); ?>" class="read-more">Read More</a>
					</span>		

				</div>

			</div>

		</div>

	</div>
</article>