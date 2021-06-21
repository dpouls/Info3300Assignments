<?php
session_start();
require('../model/events_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
  if ($action == NULL) {
    $action = 'list_events';
  }
}

if ($action == 'list_events') {
  $events = read_events();
  $message = '';
  include('events_list.php');
} else if ($action == 'add_event') {
  $event_types = get_event_type();
  include('events_add.php');
} else if ($action == 'add_event_data') {
  $event_name = filter_input(INPUT_POST, 'event_name');
  $event_type = filter_input(INPUT_POST, 'event_type');
  $event_location = filter_input(INPUT_POST, 'event_location');
  $start_time = filter_input(INPUT_POST, 'start_time');
  $end_time = filter_input(INPUT_POST, 'end_time');
  $duration = filter_input(INPUT_POST, 'duration');
  $records_updated = create_event($event_name, $event_type, $event_location, $start_time, $end_time, $duration);
  $message = '';
  if ($records_updated > 0) {
    $message = 'Event Added';
  } else {
    $message = 'Error Adding Event';
  }
  $events = read_events();
  include('events_list.php');
} else if ($action == 'edit_event') {
  $event_id = filter_input(INPUT_GET,'event_id');
  $event = get_event($event_id);
  $event_types = get_event_type();
  include('events_edit.php');
} else if ($action == 'edit_event_data') {
  $event_id = filter_input(INPUT_POST, 'event_id');
  $event_name = filter_input(INPUT_POST, 'event_name');
  $event_type = filter_input(INPUT_POST, 'event_type');
  $event_location = filter_input(INPUT_POST, 'event_location');
  $start_time = filter_input(INPUT_POST, 'start_time');
  $end_time = filter_input(INPUT_POST, 'end_time');
  $duration = filter_input(INPUT_POST, 'duration');
  $records_updated = update_event($event_id, $event_name, $event_type, $event_location, $start_time, $end_time, $duration);
  $message = '';
  if ($records_updated > 0) {
    $message = 'Event Updated';
  } else {
    $message = 'Error Updating Event';
  }
  $events = read_events();
  include('events_list.php');

} else if ($action == 'delete_event_confirm') {
  $event_id = filter_input(INPUT_GET, 'event_id');
  $event = get_event($event_id);
  include('events_delete_confirm.php');

} else if ($action == 'delete_event') {
  $event_id = filter_input(INPUT_POST, 'event_id');
  $deleted_rows = delete_event($event_id);
  $message = '';
  if ($deleted_rows > 0) {
    $message = 'Event Deleted';
  } else {
    $message = 'Error Deleting Event';
  }
  $events = read_events();
  include('events_list.php');
}
