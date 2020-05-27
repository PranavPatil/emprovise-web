<?php

require("../phpmail/class.phpmailer.php");
require("../phpmail/class.smtp.php");

//Retrieve form data.
//GET - user submitted data using AJAX
//POST - in case user does not support javascript, we'll use POST instead
$fname = isset($_POST['fname']) ? $_POST['fname']: NULL;
$lname = isset($_POST['lname']) ? $_POST['lname']: NULL;
$email = isset($_POST['email']) ? $_POST['email']: NULL;
$feedback = isset($_POST['feedback']) ? $_POST['feedback']: NULL;

//flag to indicate which method it uses. If POST set it to 1
if ($_POST) $post=1;

//Simple server side validation for POST data, of course,
//you should validate the email
$errors = array();

if (!$fname) $errors[count($errors)] = 'First name is empty.';
if (!$lname) $errors[count($errors)] = 'Last name is empty.';
if (!$email) $errors[count($errors)] = 'Email id is empty.';
if (!$feedback) $errors[count($errors)] = 'Feedback provided is empty.';

//if the errors array is empty, send the mail
if (!$errors) {

   try {
	 $adminid = "pranav@gmail.com";
	 $adminname = "Emprovise Admin";
     $html = $fname . " " . $lname . " (" . $email .") Feedback : " . $feedback;
     $mail = new PHPMailer(true);
     $mail->IsSMTP();                                      // set mailer to use SMTP
     $mail->Host = "smtp.gmail.com";  // specify main and backup server
     $mail->SMTPAuth = true;     // turn on SMTP authentication
     $mail->SMTPSecure = "ssl";
     $mail->Port = "465";
     $mail->Username = "emprovise.root";  // SMTP username
     $mail->Password = "password"; // SMTP password
     $mail->From = $email;
     $mail->FromName = $fname . " " . $lname;
     $mail->AddReplyTo($email, $fname . " " . $lname);
     $mail->AddAddress($adminid, $adminname);
     $mail->Subject = "Emprovise User Feedback";
     $mail->AltBody = $html;
     $mail->WordWrap = 50;                                 // set word wrap to 50 characters
#    $mail->Body    = $html;
     $mail->MsgHTML($html);
     $mail->IsHTML(true);                                  // set email format to HTML

     if(!$mail->Send())
     {
       echo 'Mailer Error: ' . $mail->ErrorInfo;
     }
     else{
       echo 'Feedback received successfully !';
     }
   } catch (phpmailerException $e) {
       echo 'Mailer Error: ' . $e->errorMessage();
   }

//if the errors array has values
} else {
    //display the errors message
    for ($i=0; $i<count($errors); $i++) echo $errors[$i] . ' ';
    exit;
}

?>
