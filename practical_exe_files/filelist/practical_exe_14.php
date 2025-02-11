<?php include 'header.php'; ?>

<div class="container m-5 p-5" id="content">


    <?php

    // Create a class marked as final and attempt to extend it to show the restriction.

    echo "<h4>Create a class marked as final and attempt to extend it to show the restriction.</h4>";

    final class RestClass
    {
        function message()
        {
            echo "This is a method from final class";
        }
    }

    class DerClass
    // extends RestClass
    {
        function message()
        {
            echo "changes with child class of a final class";
        }
    }

    $obj = new RestClass();

    $obj1 = new DerClass();

    ?>

    <p><?php echo $obj->message(); ?></p>

    <p><?php echo $obj1->message(); ?></p>

</div>

</main>
<footer>
    <!-- place footer here -->
    <?php include 'footer.php'; ?>