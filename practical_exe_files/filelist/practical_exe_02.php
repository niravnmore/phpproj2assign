<?php include 'header.php'; ?>

<div class="container m-5 p-5" id="content">

    <?php

    // Write a PHP script to create a class representing a "Car" with properties like make, model, and year, and a method to display the car details.

    echo "<h4>Write a PHP script to create a class representing a Car with properties like make, model, and year, and a method to display the car details.</h4>";

    class Car
    {
        private $make;
        private $model;
        private $year;

        public function __construct($make, $model, $year)
        {
            $this->make = $make;
            $this->model = $model;
            $this->year = $year;
        }

        public function displayDetails()
        {
            echo "<p>Car Details: $this->year $this->make $this->model</p>";
        }
    }

    // Example usage

    $car1 = new Car("Toyota", "Corolla", 2018);

    $car1->displayDetails();



    ?>

</div>

</main>
<footer>
    <!-- place footer here -->
    <?php include 'footer.php'; ?>