<?php include 'header.php'; ?>

<div class="container m-5 p-5" id="content">

    <?php

    // Instantiate multiple objects of the "Car" class and demonstrate how to access their properties and methods.

    echo "<h4>Instantiate multiple objects of the Car class and demonstrate how to access their properties and methods.</h4>";

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

    $car2 = new Car("Honda", "Civic", 2019);

    $car2->displayDetails();

    $car3 = new Car("Suzuki", "Swift", 2020);

    $car3->displayDetails();

    $car4 = new Car("Hyundai", "Accent", 2021);

    $car4->displayDetails();

    ?>

</div>

</main>
<footer>
    <!-- place footer here -->
    <?php include 'footer.php'; ?>