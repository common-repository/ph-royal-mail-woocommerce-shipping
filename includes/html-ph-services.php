<style type="text/css">
.royalmail_services td.sort {
	cursor: move;
	width: 16px;
	padding: 0 16px;
	cursor: move;
	background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAICAYAAADED76LAAAAHUlEQVQYV2O8f//+fwY8gJGgAny6QXKETRgEVgAAXxAVsa5Xr3QAAAAASUVORK5CYII=) no-repeat center;
}
td.service-name {
    width: 75%;
}
</style>

<tr valign="top" id="service_options">
	<td class="titledesc" colspan="2" style="padding-left:0px">
	<strong><?php _e( 'Services', 'ph-shipping-royalmail' ); ?></strong><br><br>
		<table class="royalmail_services widefat" style="width: 50%;">
			<thead>
				<th class="sort">&nbsp;</th>
				<th><?php _e( 'Service Code', 'ph-shipping-royalmail' ); ?></th>
				<th><?php _e( 'Enabled', 'ph-shipping-royalmail' ); ?></th>
			</thead>
			<tbody>
				<?php
					$sort = 0;
					$this->ordered_services = array();

					foreach ( $this->services as $service ) {
						$code = $service['id'];
						$name = $service['name'];

						if ( isset( $this->custom_services[ $code ]['order'] ) ) {
							$sort = $this->custom_services[ $code ]['order'];
						}

						while ( isset( $this->ordered_services[ $sort ] ) )
							$sort++;

						$this->ordered_services[ $sort ] = array( $code, $name );

						$sort++;
					}

					ksort( $this->ordered_services );

					foreach ( $this->ordered_services as $value ) {
						$code = $value[0];
						$name = $value[1];
						?>
						<tr>
							<td class="sort"><input type="hidden" class="order" name="royalmail_service[<?php echo $code; ?>][order]" value="<?php echo isset( $this->custom_services[ $code ]['order'] ) ? $this->custom_services[ $code ]['order'] : ''; ?>" /></td>
							<td class="service-name"><strong><?php echo $name; ?></strong></td>
							<td><input type="checkbox" name="royalmail_service[<?php echo $code; ?>][enabled]" <?php checked( ( ! isset( $this->custom_services[ $code ]['enabled'] ) || ! empty( $this->custom_services[ $code ]['enabled'] ) ), true ); ?> /></td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</td>
</tr>

<script type="text/javascript">
	jQuery(window).load(function(){
		// Ordering
		jQuery('.royalmail_services tbody').sortable({
			items:'tr',
			cursor:'move',
			axis:'y',
			handle: '.sort',
			scrollSensitivity:40,
			forcePlaceholderSize: true,
			helper: 'clone',
			opacity: 0.65,
			placeholder: 'wc-metabox-sortable-placeholder',
			start:function(event,ui){
				ui.item.css('baclbsround-color','#f6f6f6');
			},
			stop:function(event,ui){
				ui.item.removeAttr('style');
				royalmail_services_services_row_indexes();
			}
		});

		function royalmail_services_services_row_indexes() {
			jQuery('.royalmail_services tbody tr').each(function(index, el){
				jQuery('input.order', el).val( parseInt( jQuery(el).index('.royalmail_services tr') ) );
			});
		};

	});

</script>