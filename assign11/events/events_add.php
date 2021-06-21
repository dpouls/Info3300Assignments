<?php include '../view/header.php'; ?>
<main>
    <section>
        <h1>Add An Event</h1>
        <form action="/assign11/events/index.php" method="post">
            <input type="hidden" name="action" value="add_event_data" />
            Event Name: <input type="text" name="event_name"> <br>
            Event Type:
            <select name="event_type">
                <?php foreach ($event_types as $event_type) : ?>
                <option value="<?=$event_type[0]?>"><?=$event_type[0]?></option>
                <?php endforeach; ?>
            </select>
            <br>
            Event Location: <input type="text" name="event_location">
            <br>
            Event Date and Start Time: <input type="text" name="start_time" id=""> <br>
            Event Date and End Time: <input type="text" name="end_time" id=""> <br>
            Event Hours Duration: <input type="text" name="duration" > <br>
            <input type="submit" value="Submit">
            
        </form>

    </section>
</main>
<?php include '../view/footer.php'; ?>