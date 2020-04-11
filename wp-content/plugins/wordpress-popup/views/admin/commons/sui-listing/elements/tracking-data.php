<?php if ( ! $multiple_charts ) : ?>

	<?php self::static_render( 'admin/commons/sui-listing/elements/tracking-data-chart', $render_arguments ); ?>

<?php else : ?>

	<div class="sui-tabs sui-tabs-flushed">

		<div data-tabs style="border-top: 1px solid #E6E6E6;">

			<div class="active"><?php esc_html_e( 'Overall', 'hustle' ); ?></div>

			<?php foreach ( $multiple_charts as $data ) { ?>

				<div><?php echo esc_html( $data['display_name'] ); ?></div>

			<?php } ?>

		</div>

		<div data-panes>

			<div class="active">

				<?php self::static_render( 'admin/commons/sui-listing/elements/tracking-data-chart', $render_arguments ); ?>

			</div>

			<?php
			foreach ( $multiple_charts as $sub_type_slug => $data ) :
				$render_arguments['module_sub_type'] = $sub_type_slug;
				$render_arguments['sub_type_data']   = $data;
				?>

				<div>

					<?php self::static_render( 'admin/commons/sui-listing/elements/tracking-data-chart', $render_arguments ); ?>

				</div>

			<?php endforeach; ?>

		</div>

	</div>

	<?php
endif;
