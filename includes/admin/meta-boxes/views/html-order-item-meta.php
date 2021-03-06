<div class="view">
	<?php if ( $meta_data = $item->get_formatted_meta_data() ) : ?>
		<table cellspacing="0" class="display_meta">
			<?php foreach ( $meta_data as $meta_id => $meta ) :
				// Skip hidden core fields
				if ( in_array( $meta->key, apply_filters( 'woocommerce_hidden_order_itemmeta', array(
					'_qty',
					'_tax_class',
					'_product_id',
					'_variation_id',
					'_line_subtotal',
					'_line_subtotal_tax',
					'_line_total',
					'_line_tax',
					'method_id',
					'cost',
				) ) ) ) {
					continue;
				}
				?>
				<tr>
					<th><?php echo wp_kses_post( $meta->display_key ); ?>:</th>
					<td><?php echo wp_kses_post( $meta->display_value ); ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
	<?php endif; ?>
</div>
<div class="edit" style="display: none;">
	<table class="meta" cellspacing="0">
		<tbody class="meta_items">
			<?php if ( $meta_data = $item->get_formatted_meta_data() ) : ?>
				<?php foreach ( $meta_data as $meta_id => $meta ) :
					// Skip hidden core fields
					if ( in_array( $meta->key, apply_filters( 'woocommerce_hidden_order_itemmeta', array(
						'_qty',
						'_tax_class',
						'_product_id',
						'_variation_id',
						'_line_subtotal',
						'_line_subtotal_tax',
						'_line_total',
						'_line_tax',
						'method_id',
						'cost',
					) ) ) ) {
						continue;
					}
					?>
					<tr data-meta_id="<?php echo esc_attr( $meta_id ); ?>">
						<td>
							<input type="text" name="meta_key[<?php echo esc_attr( $item_id ); ?>][<?php echo esc_attr( $meta_id ); ?>]" value="<?php echo esc_attr( $meta->key ); ?>" />
							<textarea name="meta_value[<?php echo esc_attr( $item_id ); ?>][<?php echo esc_attr( $meta_id ); ?>]"><?php echo esc_textarea( rawurldecode( $meta->value ) ); ?></textarea>
						</td>
						<td width="1%"><button class="remove_order_item_meta button">&times;</button></td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="4"><button class="add_order_item_meta button"><?php _e( 'Add&nbsp;meta', 'woocommerce' ); ?></button></td>
			</tr>
		</tfoot>
	</table>
</div>
