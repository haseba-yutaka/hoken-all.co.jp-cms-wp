<?php lowerHead( '', '' ); ?>

<div class="-section-main">
	<div class="-section-inner -row">
	<div class="-row-head">
		<div class="display-block-pc">
		<ul class="-category-nav">
			<li class="
			<?php
			if ( ! is_tax() ) :
				?>
				current-cat<?php endif; ?>">
			<a href="<?php echo home_url(); ?>/article/">すべて</a>
			</li>
			<?php wp_list_categories( 'title_li=&taxonomy=article_category&show_option_none' ); ?>
		</ul>
		</div>
		<div class="display-block-sp">
		<div class="c-form-item mt0">
			<select class="select" name="select" onChange="location.href=value;">
			<option value="<?php echo home_url(); ?>/article/" 
										<?php
										if ( ! is_tax() ) :
											?>
				selected<?php endif; ?>>すべて</option>
			<?php
				$article_terms = get_terms( 'article_category' );
			foreach ( $article_terms as $value ) {
				$article_terms = get_the_terms( $post->ID, 'article_category' );
				$slug       = $article_terms[0]->slug;
				if ( is_tax() && $slug == $value->slug ) {
					echo '<option value="' . get_term_link( $value->slug, 'article_category' ) . '" selected>' . $value->name . '</option>';
				} else {
					echo '<option value="' . get_term_link( $value->slug, 'article_category' ) . '">' . $value->name . '</option>';
				}
			}
			?>
			</select>
			<i class="icon-select__right"></i>
		</div>
		</div>
		<div class="-monthly-list mt4 display-block-pc">
		<?php
			global $wpdb;
			$monthsQuery = "
							SELECT DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month, COUNT(ID) as posts_count
							FROM $wpdb->posts
							WHERE post_type = 'article'
							AND post_status = 'publish'
							AND post_date <= now()
							GROUP BY year, month
							ORDER BY post_date DESC
					";
			$months      = $wpdb->get_results( $monthsQuery );
			$currentYear = '';
		foreach ( $months as $month ) {
			$year       = $month->year;
			$monthNum   = $month->month;
			$postsCount = $month->posts_count;
			$monthName  = date_i18n( 'F', mktime( 0, 0, 0, $monthNum, 10 ) );
			if ( $year !== $currentYear ) {
				if ( ! empty( $currentYear ) ) {
					echo '</ul></div>';
				}
				echo "<div class=\"-monthly\">
										<div class=\"-monthly-head js-ac-head\">{$year}年</div>
										<ul class=\"-monthly-body js-ac-conts\">";
				$currentYear = $year;
			}
			$monthLink = esc_url( home_url( '/' . $year . '/' . sprintf( '%02d', $monthNum ) . '/?post_type=article' ) );
			echo "<li>
								<a href=\"{$monthLink}\">
									<span>{$monthName}</span>
									<small>{$postsCount}</small>
								</a>
							</li>";
		}
		if ( ! empty( $currentYear ) ) {
			echo '</ul></div>';
		}
		?>
		</div>
	</div>
	<div class="-row-body">
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( '_section/article/loop' );
		endwhile;
		wp_reset_query();
		wp_plugin_pager();
		?>
	</div>
	</div>
</div>
