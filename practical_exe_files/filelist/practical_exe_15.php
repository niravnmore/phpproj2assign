<?php include 'header.php'; ?>

<div class="container m-5 p-5" id="content">

    <?php

    // Write a function that sanitizes email input and validates it before sending.

    echo "<h4>Write a function that sanitizes email input and validates it before sending.</h4>";

    function sendSafeEmail($email, $subject, $message)
    {
        // Step 1: Sanitize email input
        $email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);

        // Step 2: Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format.";
        }

        // Step 3: Prevent Header Injection
        if (preg_match("/(\r|\n)/", $email) || preg_match("/(\r|\n)/", $subject)) {
            return "Email headers contain invalid characters.";
        }

        // Step 4: Prepare email headers
        $headers = "From: no-reply@example.com\r\n";
        $headers .= "Reply-To: no-reply@example.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Step 5: Send email securely
        if (mail($email, $subject, $message, $headers)) {
            return "Email sent successfully to $email.";
        } else {
            return "Failed to send email.";
        }
    }

    ?>

    <div class="row">
        <div class="col-6 text-center">
            <p><?php echo sendSafeEmail("test@example.com", "Welcome!", "Hello, welcome to our platform!"); ?></p>
        </div>
    </div>

</div>

</main>
<footer>
    <!-- place footer here -->
    <?php include 'footer.php'; ?>