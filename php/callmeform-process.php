<?php
$errorMSG = "";

if (empty($_POST["lname"])) {
    $errorMSG = "Name is required ";
} else {
    $name = $_POST["lname"];
}

if (empty($_POST["lphone"])) {
    $errorMSG = "Phone is required ";
} else {
    $phone = $_POST["lphone"];
}

if (empty($_POST["lemail"])) {
    $errorMSG = "Email is required ";
} else {
    $email = $_POST["lemail"];
}

if (empty($_POST["lmessage"])) {
    $errorMSG = "Message is required ";
} else {
    $select = $_POST["lmessage"];
}

if (empty($_POST["lterms"])) {
    $errorMSG = "Terms is required ";
} else {
    $terms = $_POST["lterms"];
}

$EmailTo = "icorreas.ig@gmail.com";
$Subject = "New quote request from Aria landing page";

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Phone: ";
$Body .= $phone;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $select;
$Body .= "\n";
$Body .= "Terms: ";
$Body .= $terms;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);
// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}
?>
