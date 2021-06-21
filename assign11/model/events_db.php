<?php
require('database.php');

function read_events() {
   global $db;
   $query = 'SELECT event_id, event_name, event_type, event_location, start_time, duration
             FROM event_tracker.events';
   $statement = $db->prepare($query);
   $statement->execute();
   $events = $statement->fetchAll();
   $statement->closeCursor();
   return $events;
}

function get_event_type(){
   global $db;
   $query = 'SELECT DISTINCT event_type
             FROM event_tracker.events';
   $statement = $db->prepare($query);
   $statement->execute();
   $event_type = $statement->fetchAll();
   $statement->closeCursor();
   return $event_type;   
}

function get_event($event_id) {
   global $db;
   $query = 'SELECT event_id, event_name, event_type, event_location, start_time, end_time,
             duration
             FROM event_tracker.events
             WHERE event_id = :eventid';
   $statement = $db->prepare($query);
   $statement->bindParam(':eventid', $event_id);
   $statement->execute();
   $event = $statement->fetch();
   $statement->closeCursor();
   return $event;
}

function create_event($event_name, $event_type, $event_location, $start_time, $end_time, $duration){
   global $db;
   $query = 'INSERT INTO events(event_name, event_type, event_location, start_time, end_time,duration)
             VALUES (:eventname, :eventtype, :eventlocation, :starttime, :endtime, :duration)';
             $statement = $db->prepare($query);
             $statement->bindParam(':eventname',$event_name);
             $statement->bindParam(':eventtype',$event_type);
             $statement->bindParam(':eventlocation',$event_location);
             $statement->bindParam(':starttime',$start_time);
             $statement->bindParam(':endtime', $end_time);
             $statement->bindParam(':duration',$duration);
             $statement->execute();
             return $statement->rowCount();
}

function update_event($event_id, $event_name, $event_type, $event_location, $start_time, $end_time, $duration){
   global $db;
   $query = 'UPDATE events set event_name = :eventname, event_type = :eventtype,
             event_location = :eventlocation, start_time = :starttime, end_time = :endtime,
             duration = :duration
             WHERE event_id = :eventid';
   $statement = $db->prepare($query);
   $statement->bindParam(':eventid',$event_id);
   $statement->bindParam(':eventname',$event_name);
   $statement->bindParam(':eventtype',$event_type);
   $statement->bindParam(':eventlocation',$event_location);
   $statement->bindParam(':starttime',$start_time);
   $statement->bindParam(':endtime', $end_time);
   $statement->bindParam(':duration',$duration);      
   $statement->execute();
   return $statement->rowCount();


}

function delete_event($event_id){
   global $db;
   $query = 'DELETE from events WHERE event_id = :eventid';
   $statement = $db->prepare($query);
   $statement->bindParam(':eventid',$event_id);
   $statement->execute();
   return $statement->rowCount();
}
