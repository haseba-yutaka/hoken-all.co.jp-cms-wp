<?php get_template_part( '_include/header' ); ?>

<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();

		if ( is_singular( 'news' ) ) {
			/** お知らせ */
			get_template_part( '_template-single/news' );
		} elseif ( is_singular( 'article' ) ) {
			/** メディア記事 */
			get_template_part( '_template-single/article' );
		}

	endwhile;
endif;
?>

<?php
$args = array(
	'className' => 'mt10',
);
get_template_part( '_include/footer', null, $args );

