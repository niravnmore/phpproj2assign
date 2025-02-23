<?php include 'header.php'; ?>

<div class="container m-5 p-5" id="content">

    <?php

    // Create a script that reads from a text file and displays its content on a web page.

    echo "<h4>Create a script that reads from a text file and displays its content on a web page.</h4>";


    // Define the file path
    $file = 'index.php';

    // Check if the file exists
    if (file_exists($file)) {
        // Read the file content
        $content = file_get_contents($file);
    } else {
        $content = "File not found.";
    }
    ?>

    <h1>File Content</h1>
    <pre><?php echo htmlspecialchars($content); ?></pre>

</div>

</main>
<footer>
    <!-- place footer here -->
    <?php include 'footer.php'; ?>