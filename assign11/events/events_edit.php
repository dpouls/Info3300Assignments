<?php include '../view/header.php'; ?>
<main>
    <section>
        <h1>Edit An Event</h1>
        <form action="/assign11/events/index.php" method="post">
            <input type="hidden" name="action" value="edit_event_data" />
            <input type="hidden" name="event_id" value="<?=$event['event_id']?>" /> <br>
            Event Name: <input type="text" name="event_name" value="<?=$event['event_name']?>"> <br>
            Event Type:
            <select name="event_type">
                <?php foreach ($event_types as $event_type) : ?>
                    <option value="<?= $event_type[0] ?>"
                    <?php if($event_type[0] == $event['event_type']){echo ' selected=true';}  ?>>
                    <?= $event_type[0] ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            Event Location: <input type="text" size="50" name="event_location" value="<?=$event['event_location'];?>">
            <br>
            Event Date and Start Time: <input type="text" name="start_time" value="<?=$event['start_time'];?>"> <br>
            Event Date and End Time: <input type="text" name="end_time" value="<?=$event['end_time'];?>"> <br>
            Event Hours Duration: <input type="text" name="duration" value="<?=$event['duration'];?>"> <br>
            <input type="submit" value="Submit">

        </form>

    </section>
</main>
<?php include '../view/footer.php'; ?>