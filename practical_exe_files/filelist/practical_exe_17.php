<?php include 'header.php'; ?>

<div class="container m-5 p-5" id="content">

    <?php

    // Write a PHP script to send a test email to a user using the mail() function.

    echo "<h4>Write a PHP script to send a test email to a user using the mail() function.</h4>";

    $to = "recipient@example.com"; // Replace with recipient's email
    $subject = "Test Email";
    $message = "This is a test email sent from a PHP script.";
    $headers = "From: sender@example.com"; // Replace with your email

    if (mail($to, $subject, $message, $headers)) {
        echo "Email successfully sent to $to";
    } else {
        echo "Email sending failed.";
    }
    ?>

</div>

</main>
<footer>
    <!-- place footer here -->
    <?php include 'footer.php'; ?>