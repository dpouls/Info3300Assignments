<?php
$first_name = filter_input(INPUT_GET,'first_name');
$last_name = filter_input(INPUT_GET,'last_name');
$minor_name = filter_input(INPUT_GET,'minor_name');
$minor_age = filter_input(INPUT_GET,'minor_age');
$minor_birth_date = filter_input(INPUT_GET,'minor_birth_date');
$street = filter_input(INPUT_GET,'street');
$city = filter_input(INPUT_GET,'city');
$state = filter_input(INPUT_GET,'state');
$zip = filter_input(INPUT_GET,'zip');
$email = filter_input(INPUT_GET,'email');
$signature = filter_input(INPUT_GET,'signature');
$authorize_play = filter_input(INPUT_GET,'authorize_play');


$first_name_error = filter_input(INPUT_GET,'first_name_error');
$last_name_error = filter_input(INPUT_GET,'last_name_error');
$minor_name_error = filter_input(INPUT_GET,'minor_name_error');
$minor_age_error = filter_input(INPUT_GET,'minor_age_error');
$minor_birth_date_error = filter_input(INPUT_GET,'minor_birth_date_error');
$street_error = filter_input(INPUT_GET,'street_error');
$city_error = filter_input(INPUT_GET,'city_error');
$state_error = filter_input(INPUT_GET,'state_error');
$zip_error = filter_input(INPUT_GET,'zip_error');
$email_error = filter_input(INPUT_GET,'email_error');
$signature_error = filter_input(INPUT_GET,'signature_error');




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Carnival Waiver</title>
</head>

<body>
    <h1 id='head_waiver'>DLP - Carnival Waiver &nbsp; &nbsp;</h1> <img src="ferris_wheel.jpg" alt="ferris wheel">
    <div id="waiver">
        <form action="result.php" method="get">
            Guardian first name <input type="text" name="first_name" placeholder="first name" value="<?=$first_name?>"><br>
            <div class='errors'><?=$first_name_error; ?></div>
            Guardian last name <input type="text" name="last_name" placeholder="last name" value="<?=$last_name?>"><br>
            <div class='errors'><?=$last_name_error; ?></div>
            Minor's name <input type="text" name="minor_name" placeholder="minor's name"value="<?=$minor_name?>"><br>
            <div class='errors'><?=$minor_name_error; ?></div>
            Minor's Age <input type="text" name="minor_age" placeholder="minor's age" size="3"value="<?=$minor_age?>"><br>
            <div class='errors'><?=$minor_age_error; ?></div>
            Minor's birthdate <input type="text" name="minor_birth_date" placeholder="minor's birth date" size="3"value="<?=$minor_birth_date?>"><br>
            <div class='errors'><?=$minor_birth_date_error; ?></div>
            Street <input type="text" name="street" placeholder="street"value="<?=$street?>"><br>
            <div class='errors'><?=$street_error; ?></div>
            City <input type="text" name="city" placeholder="city"value="<?=$city?>">
            <div class='errors'><?=$city_error; ?></div>
            State <input type="text" name="state" placeholder="state" value="<?=$state?>">
            <div class='errors'><?=$state_error; ?></div>
            Zip <input type="text" name="zip" placeholder="zip" size="5"value="<?=$zip?>"><br>
            <div class='errors'><?=$zip_error; ?></div>
            Guardian's email address <input type="email" name="email" placeholder="email"value="<?=$email?>"><br>
            <div class='errors'><?=$email_error; ?></div>
            Please type your name in the text area <br>

             <textarea name="signature" cols="30" rows="3"value="<?=$signature?>"></textarea><br>
             <div class='errors'><?=$signature_error; ?></div>

            I agree to allow my child to play Dial-a-Fortune games
            <input type="radio" name="authorize_play" value="true">Yes
            <input type="radio" name="authorize_play" value="false" checked>No <br><br>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>