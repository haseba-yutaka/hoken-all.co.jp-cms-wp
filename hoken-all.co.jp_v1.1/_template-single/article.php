<?php
/**
 * Template Single - Article
 *
 * メディア記事 詳細ページ
 *
 * @package WordPress
 * @since   1.0.0
 */

?>
<div class="-section-headLower">
	<div class="-section-headLower-inner -section-inner">
	<?php echo_taxonomy_as_ul( 'article_category' ); ?>
	<h1 class="-head-title" data-text-en="">
		<span><?php the_title(); ?></span>
	</h1>
	</div>
</div>

<div class="-section-main pb0">
	<div class="-section-inner -middle">
	<div class="single-head_v1">
		<div class="single-head__meta mt0">
		<?php updateBlack( '' ); ?>
		<div class="single-head__sns">
			<span class="-title">記事を共有する</span>
			<?php
			$args = array(
				'className' => '-sns',
			);
			get_template_part( '_include/inc-sns', null, $args );
			?>
		</div>
		</div>
	</div>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="single-head__thumb">
            <?php
                $thumb_id = get_post_thumbnail_id();
                $full = wp_get_attachment_image_url($thumb_id, 'full');
                $srcset = wp_get_attachment_image_srcset($thumb_id, 'full');
                $sizes = wp_get_attachment_image_sizes($thumb_id, 'full');

                $img = wp_get_attachment_image_src($thumb_id, 'full');
                $width  = $img[1];
                $height = $img[2];

                $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
                if (!$alt) {
                    $alt = get_the_title();
                }
                echo '<img
                    src="' . esc_url($full) . '"
                    srcset="' . esc_attr($srcset) . '"
                    sizes="' . esc_attr($sizes) . '"
                    width="' . esc_attr($width) . '"
                    height="' . esc_attr($height) . '"
                    loading="eager"
                    fetchpriority="high"
                    class="image"
                    alt="' . esc_attr($alt) . '"
                >';                
            ?>
            <?php /*<img src="<?php the_post_thumbnail_url( 'thumb-large' ); ?>" alt="<?php echo the_title_attribute(); ?>の画像" class="image" loading="lazy"> */ ?>
		</div>
	<?php endif; ?>
	<div class="single-content__body">
		<div class="-single-content p-article-content">
		<?php the_content(); ?>
		</div>
	</div>
	</div>
	<?php
	global $post;
	$args     = array(
		'numberposts' => 3,
		'post_type'   => 'article',
		'exclude'     => $post->ID,
	);
	$articles = get_posts( $args );
	?>
	<?php if ( $articles ) : ?>
	<div class="-section-inner -middle mt12">
		<div class="single-head_v1">
		<h2 class="single-head__title">
			<span>関連の<?php echo esc_html( get_post_type_object( 'article' )->label ); ?></span>
		</h2>
		</div>
		<div class="mt5">
		<?php
		foreach ( $articles as $article ) :
			?>
			<div class="-item-news">
				<a class="-item-news__link" href="<?php the_permalink( $article->ID ); ?>">
				<div class="-item-news__info">
					<time class="-time" datetime="<?php echo the_date( 'Y-m-d' ); ?>">
						<?php echo get_the_date( 'Y/m/d' ); ?>
					</time>
					<div class="-category">
						<?php
						terms_category( $article->ID, 'article_category' );
						?>
					</div>
				</div>
				<div class="-item-news__title">
						<?php echo esc_html( $article->post_title ); ?>
				</div>
				</a>
			</div>
			<?php
			endforeach;
			wp_reset_postdata();
		?>
		</div>
	</div>
	<?php endif; ?>
</div>
