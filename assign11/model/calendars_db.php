<?php
require('database.php');

function get_calendar_entries($user_id) {
   global $db;
   $query =   'SELECT e.event_id, event_name, start_time, event_type, 
                      event_location, duration, attend_probability
               FROM events e JOIN calendars c on e.event_id = c.event_id
               WHERE c.user_id = :userid';
   $statement = $db->prepare($query);
   $statement->bindParam(':userid', $user_id);
   $statement->execute();
   $calendars = $statement->fetchAll();
   $statement->closeCursor();
   return $calendars;
}

function get_event_info($event_id) {
   global $db;
   $query =   'SELECT event_id, event_name, event_type, event_location, start_time, duration
               FROM event_tracker.events
               WHERE event_id = :eventid';
   $statement = $db->prepare($query);
   $statement->bindParam(':eventid', $event_id);
   $statement->execute();
   $event = $statement->fetch();
   $statement->closeCursor();
   return $event;   
}

function get_event_plan($event_id, $user_id) {
   global $db;
   $query =   'SELECT e.event_id, event_name, start_time, event_type, event_location, duration, attend_probability
               FROM events e JOIN calendars c on e.event_id = c.event_id
               WHERE e.event_id = :eventid AND c.user_id = :userid';
   $statement = $db->prepare($query);
   $statement->bindParam(':eventid', $event_id);
   $statement->bindParam(':userid', $user_id);
   $statement->execute();
   $event = $statement->fetch();
   $statement->closeCursor();
   return $event;   
}

function add_to_calendar($event_id, $user_id, $probability){
   global $db;
   $statement = $db->prepare('SELECT calendar_id FROM calendars WHERE event_id = :eventid and user_id = :userid');
   $statement->bindParam(':eventid', $event_id);
   $statement->bindParam(':userid', $user_id);
   $statement->execute();
   $book =  $statement->fetch(PDO::FETCH_BOTH);
   $already_in_calendar = $statement->rowCount() > 0;
   $statement->closeCursor();

   if(!$already_in_calendar){
      $statement2 = $db->prepare('INSERT INTO calendars (user_id, event_id, attend_probability)
      VALUES (:userid, :eventid, :probability )');

      $statement2->bindParam(':userid', $user_id);
      $statement2->bindParam(':eventid', $event_id);
      $statement2->bindParam(':probability', $probability);
      $statement2->execute();
      return $statement2->rowCount();
   } else{
      return 0;
   }
}
