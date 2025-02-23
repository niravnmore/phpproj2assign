<?php include 'header.php'; ?>

<div class="container m-5 p-5" id="content">


    <?php

    // Create a class with static properties and methods, and demonstrate their access using the scope resolution operator.

    echo "<h4>Create a class with static properties and methods, and demonstrate their access using the scope resolution operator.</h4>";

    class MyClass
    {
        public static $greeting = "Hello";

        public static function greet()
        {
            echo self::$greeting . ", World!";
        }
    }

    ?>

    <p><?php echo MyClass::$greeting; ?></p>
    <p><?php MyClass::greet(); ?></p>

</div>

</main>
<footer>
    <!-- place footer here -->
    <?php include 'footer.php'; ?>