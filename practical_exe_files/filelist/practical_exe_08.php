<?php include 'header.php'; ?>

<div class="container m-5 p-5" id="content">


    <?php

    // Write a class that implements a destructor to perform cleanup tasks when an object is destroyed.  

    echo "<h4>Write a class that implements a destructor to perform cleanup tasks when an object is destroyed.</h4>";

    class DatabaseConnection
    {
        public function __construct()
        {
            echo "Database connection established.\n";
        }

        public function __destruct()
        {
            echo "Database connection closed.\n";
        }
    }

    class Cache
    {
        public function __construct()
        {
            echo "Cache initialized.\n";
        }

        public function __destruct()
        {
            echo "Cache cleared.\n";
        }
    }

    $db = new DatabaseConnection();
    echo "<br>";
    unset($db);

    echo "<br>";

    $cache = new Cache();
    echo "<br>";
    unset($cache);

    ?>

</div>

</main>
<footer>
    <!-- place footer here -->
    <?php include 'footer.php'; ?>