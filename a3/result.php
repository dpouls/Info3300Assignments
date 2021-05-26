<?php
$errors = array();
$user_data = array();

#1----------------------------------------------------------------
$first_name = filter_input(INPUT_GET,'first_name');
if ($first_name == null) {       
    $errors[] = 'first_name_error=First name is required';
} elseif (strlen($first_name) < 3) {
    $errors[] = 'first_name_error=First name must be longer than 2 chars';
}
$user_data[] = "first_name=$first_name";
#2----------------------------------------------------------------
$last_name = filter_input(INPUT_GET,'last_name');
if ($last_name == null) {       
    $errors[] = 'last_name_error=last name is required';
} elseif (strlen($last_name) < 3) {
    $errors[] = 'last_name_error=last name must be longer than 2 chars';
}
$user_data[] = "last_name=$last_name";
#3----------------------------------------------------------------
$minor_name = filter_input(INPUT_GET,'minor_name');
if ($minor_name == null) {       
    $errors[] = 'minor_name_error=minor name is required';
} elseif (strlen($minor_name) < 3) {
    $errors[] = 'minor_name_error=minor name must be longer than 2 chars';
}
$user_data[] = "minor_name=$minor_name";
#4----------------------------------------------------------------
$minor_age = filter_input(INPUT_GET,'minor_age',FILTER_VALIDATE_INT);
if ($minor_age == null) {       
    $errors[] = 'minor_age_error=minor age is required';
} elseif (!$minor_age) {
    $errors[] = 'minor_age_error=minor age must be all numbers';
} elseif ($minor_age > 17) {
    $errors[] = 'minor_age_error=Minor is NOT a minor';
}
$user_data[] = "minor_age=$minor_age";
#5----------------------------------------------------------------
$minor_birth_date = filter_input(INPUT_GET,'minor_birth_date');
if ($minor_birth_date == null) {       
    $errors[] = 'minor_birth_date_error=minor birth date is required';
} 
$user_data[] = "minor_birth_date=$minor_birth_date";
#6----------------------------------------------------------------
$street = filter_input(INPUT_GET,'street');

if ($street == null) {       
    $errors[] = 'street_error=Street is required';
} 
$user_data[] = "street=$street";
#7----------------------------------------------------------------
$city = filter_input(INPUT_GET,'city');
if ($city == null) {       
    $errors[] = 'city_error=City is required';
} 
$user_data[] = "city=$city";
#8----------------------------------------------------------------
$state = filter_input(INPUT_GET,'state');
if ($state == null) {       
    $errors[] = 'state_error=State is required';
} 
$user_data[] = "state=$state";
#9----------------------------------------------------------------
$zip = filter_input(INPUT_GET,'zip',FILTER_VALIDATE_INT);
if ($zip == null) {       
    $errors[] = 'zip_error=Zip is required';
} elseif (!$zip) {
    $errors[] = 'zip_error=Zip must be numbers';
    
}
$user_data[] = "zip=$zip";
#10---------------------------------------------------------------
$email = filter_input(INPUT_GET,'email',FILTER_VALIDATE_EMAIL);
if ($email == null) {
    $errors[] = 'email_error=Email is required';
    } elseif (!$email) {
        $errors[]='email_error=Email formatting required';
    }
$user_data[] = "email=$email";

#11---------------------------------------------------------------
$signature = filter_input(INPUT_GET,'signature');
if ($signature == null) {
    $errors[] = 'signature_error=Signature is required';
} elseif (strlen($signature) < 3) {
    $errors[] = 'signature_error=Signature must be longer than 3 chars';
}
$user_data[]= "signature=$signature";
#12---------------------------------------------------------------
$authorize_play = filter_input(INPUT_GET,'authorize_play',FILTER_VALIDATE_BOOLEAN);

$page = "waiver.php?";
if (count($errors) > 0) {
    foreach ($errors as $error) {
        $page .= $error . '&';
    }
    foreach ($user_data as $data) {
        $page .= $data . '&';
    }
    header("Location: $page");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
</head>

<body>
    <h1 id='head_waiver'>DLP - Carnival Waiver Result &nbsp; &nbsp;</h1><img src="ferris_wheel.jpg" alt="ferris wheel">
    <div id="result">
        <?php 
            if ($authorize_play) {
                echo "Congratulations your minor ($minor_name) is cleared to play";
            } else {
                echo 'Sorry, your permission is required :(';
            }
        ?>
    </div>
</body>

</html>