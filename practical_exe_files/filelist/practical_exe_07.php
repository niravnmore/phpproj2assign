<?php include 'header.php'; ?>

<div class="container m-5 p-5" id="content">

    <?php

    // Create a class with a constructor that initializes properties when an object is created.

    echo "<h4>Create a class with a constructor that initializes properties when an object is created.</h4>";

    class Car
    {
        public $make;
        public $model;

        // Constructor with parameters
        public function __construct($make = "Maruti", $model = "Swift")
        {
            $this->make = $make;
            $this->model = $model;
        }
    }

    // Creating an object with parameters
    $myCar = new Car("Toyota", "Corolla");
    echo "<p>" . $myCar->make . "</p>"; // Output: Toyota
    echo "<p>" . $myCar->model . "</p>"; // Output: Corolla

    $myDefaultCar = new Car();
    echo "<p>" . $myDefaultCar->make . "</p>"; // Output: Maruti
    echo "<p>" . $myDefaultCar->model . "</p>"; // Output: Swift

    ?>

</div>

</main>
<footer>
    <!-- place footer here -->
    <?php include 'footer.php'; ?>