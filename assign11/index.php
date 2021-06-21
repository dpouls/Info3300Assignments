<?php
session_start();
include 'view/header.php';
?>
<main>
   <h1>Menu</h1>
   <ul>
       <li>
           <a href="users">Users</a>
       </li>
       <li>
           <a href="events">Events</a>
       </li>
       <li>
           <a href="calendars">Calendar</a>
       </li>
       <li>
           <a href="groups">Groups (not implemented)</a>
       </li>
       <li>
           <a href="group_memberships">GroupMembershipGroups (not implemented)</a>
       </li> 
       <li>
           <a href="shares">CalendarSharesGroups (not implemented)</a>
       </li>                         
   </ul>
</main>
<?php include 'view/footer.php'; ?>
