<?php

$name = $_POST['name']; 
$email = $_POST['mail'];
$comment = $_POST['comment'];

if(empty($name) || empty($email) || empty($comment))
{
        echo '<h1>Please enter all information on the form</h1>';
}
else 
{
        $to = 'ballj19@gmail.com';
        $body = $comment;
        $subject = $name . ' : ' . $email;

        mail($to,$subject,$body,'');
        echo '<h1>Thank you, your message has been sent!</h1>';
}
?>
<a href="../HogWildReptiles/">Return Home</a>