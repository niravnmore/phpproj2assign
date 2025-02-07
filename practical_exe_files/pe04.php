<?php include 'header.php'; ?>

<div class="container m-5 p-5" id="content">

    <?php

    // Create a "Vehicle" class and extend it with a "Car" class. Include properties and methods inboth classes, demonstrating inherited behavior.  

    echo "<h4>Create a Vehicle class and extend it with a Car class. Include properties and methods in both classes, demonstrating inherited behavior.</h4>";

    class Vehicle
    {
        protected $make;
        protected $model;
        protected $year;

        public function __construct($make, $model, $year)
        {
            $this->make = $make;
            $this->model = $model;
            $this->year = $year;
        }

        public function displayDetails()
        {
            echo "<p>Vehicle Details: $this->year $this->make $this->model</p>";
        }
    }

    class Car extends Vehicle
    {
        private $color;

        public function __construct($make, $model, $year, $color)
        {
            parent::__construct($make, $model, $year);
            $this->color = $color;
        }

        public function displayDetails()
        {
            echo "<p>Car Details: $this->year $this->make $this->model $this->color</p>";
        }
    }

    // Example usage

    $car1 = new Car("Toyota", "Corolla", 2018, "Red");

    $car1->displayDetails();

    $car2 = new Car("Honda", "Civic", 2019, "Blue");

    $car2->displayDetails();

    $vehicle1 = new Vehicle("Toyota", "Corolla", 2018);

    $vehicle1->displayDetails();

    $vehicle2 = new Vehicle("Honda", "Civic", 2019);

    $vehicle2->displayDetails();

    ?>

</div>

</main>
<footer>
    <!-- place footer here -->
    <?php include 'footer.php'; ?>