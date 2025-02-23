<?php include 'header.php'; ?>

<div class="container m-5 p-5" id="content">

    <?php

    //Create a class that demonstrates method overloading by defining multiple methods with the same name but different parameters.

    echo "<h4>Create a class that demonstrates method overloading by defining multiple methods with the same name but different parameters.</h4>";

    class AddNumbers
    {
        public function __call($methodname, $args)
        {
            if ($methodname == 'add') {
                switch (count($args)) {
                    case 2:
                        return $args[0] + $args[1];
                    case 3:
                        return $args[0] + $args[1] + $args[2];
                    case 4:
                        return $args[0] + $args[1] + $args[2] + $args[3];
                    default:
                        return "Invalid number of arguments";
                }
            } else {
                echo "<p>Method does not exist</p>";
            }
        }
    }

    // Examples
    $newadd = new AddNumbers();
    echo "<p>" . $newadd->add(2) . "</p>";
    echo "<p>" . $newadd->add(25, 35) . "</p>";
    echo "<p>" . $newadd->add(10, 20, 30) . "</p>";
    echo "<p>" . $newadd->add(20, 40, 60, 80) . "</p>";
    echo "<p>" . $newadd->add(15, 25, 35, 45, 55) . "</p>";
    ?>

</div>

</main>
<footer>
    <!-- place footer here -->
    <?php include 'footer.php'; ?>