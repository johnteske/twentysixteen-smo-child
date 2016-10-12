<?php
     $events = eo_get_events(array(
          'numberposts'=>3,
          'event_start_after'=>'today',
          'showpastevents'=>true,//Will be deprecated, but set it to true to play it safe.
     ));

     if($events):
          echo '<ul>';
          foreach ($events as $event):
               //Check if all day, set format accordingly
               $format = ( eo_is_all_day($event->ID) ? get_option('date_format') : get_option('date_format').' '.get_option('time_format') );
               printf(
                    '<li><a href="%s"> %s </a><br /> %s </li>',
                    'concerts/', //get_permalink($event->ID),
                    get_the_title($event->ID),
                    eo_get_the_start($format, $event->ID,null,$event->occurrence_id)
               );
          endforeach;
          echo '</ul>';
     endif;
?>
