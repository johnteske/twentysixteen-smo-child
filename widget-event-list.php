<?php
global $eo_event_loop,$eo_event_loop_args;

//The list ID / classes
$id      = ( $eo_event_loop_args['id'] ? 'id="'.$eo_event_loop_args['id'].'"' : '' );
$classes = $eo_event_loop_args['class'];
?>
			
<?php if ( $eo_event_loop->have_posts() ) :  ?>

	<ul <?php echo $id; ?> class="<?php echo esc_attr( $classes );?>" > 

		<?php while ( $eo_event_loop->have_posts() ) :  $eo_event_loop->the_post(); ?>

			<?php
				//Generate HTML classes for this event
				$eo_event_classes = eo_get_event_classes();

				//For non-all-day events, include time format
				$format = eo_get_event_datetime_format();
				
				$smo_ticket_url = get_post_meta($id, 'smo_ticket_url', true);
				$smo_ticket_text = get_post_meta($id, 'smo_ticket_text', true) ?: "Buy Tickets";
				$smo_time_append = get_post_meta($id, 'smo_time_append', true);
				
				$smo_work_1_comp = get_post_meta($id, 'smo_work_1_comp', true);
				$smo_work_1_title = get_post_meta($id, 'smo_work_1_title', true);
				$smo_work_2_comp = get_post_meta($id, 'smo_work_2_comp', true);
				$smo_work_2_title = get_post_meta($id, 'smo_work_2_title', true);
				$smo_work_3_comp = get_post_meta($id, 'smo_work_3_comp', true);
				$smo_work_3_title = get_post_meta($id, 'smo_work_3_title', true);
				$smo_work_4_comp = get_post_meta($id, 'smo_work_4_comp', true);
				$smo_work_4_title = get_post_meta($id, 'smo_work_4_title', true);
				$smo_work_5_comp = get_post_meta($id, 'smo_work_5_comp', true);
				$smo_work_5_title = get_post_meta($id, 'smo_work_5_title', true);

				$smo_werks = [
					[$smo_work_1_comp, $smo_work_1_title],
					[$smo_work_2_comp, $smo_work_2_title],
					[$smo_work_3_comp, $smo_work_3_title],
					[$smo_work_4_comp, $smo_work_4_title],
					[$smo_work_5_comp, $smo_work_5_title],
				];
			?>

			<li class="<?php echo esc_attr( implode( ' ',$eo_event_classes ) ); ?>" >

				<h3><a href="<?php echo eo_get_permalink(); ?>"><?php the_title(); ?></a></h3>

				<p>
				<?php echo eo_get_the_start( $format ); ?>

				<?php if ( $smo_time_append ) : ?>
					<br />							
					<?php echo $smo_time_append; ?>
				<?php endif; ?>

				<?php if ( eo_get_venue() ) : ?>
					<br/>
					<a href="<?php eo_venue_link(); ?>"> <?php eo_venue_name(); ?></a>
				<?php endif; ?>
				</p>
				
				<ul style="margin-left: 0">
					<?php
						foreach ($smo_werks as $work_array) {
							if( ! empty($work_array[0]) ) {
						    	echo "<li><em>$work_array[1]</em>, $work_array[0]</li>\n";
					    	}
						}
					?>
				</ul><br />
				
				<?php if ( $smo_ticket_url ) : ?>				
					<p><a class="button" href="<?php echo $smo_ticket_url; ?>"><?php echo $smo_ticket_text; ?></a></p>
				<?php endif; ?>


				<p><?php the_content(); ?></p>
			</li>

		<?php endwhile; ?>

	</ul>

<?php elseif ( ! empty( $eo_event_loop_args['no_events'] ) ) :  ?>

	<ul id="<?php echo esc_attr( $id );?>" class="<?php echo esc_attr( $classes );?>" > 
		<li class="eo-no-events" > <?php echo $eo_event_loop_args['no_events']; ?> </li>
	</ul>

<?php endif;
