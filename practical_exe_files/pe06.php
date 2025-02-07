<?php include 'header.php'; ?>

<div class="container m-5 p-5" id="content">


    <?php

    // Define an interface named `VehicleInterface` with methods like `start()`, `stop()`, and implement this interface in multiple classes. 

    echo "<h4>Define an interface named `VehicleInterface` with methods like `start()`, `stop()`, and implement this interface in multiple classes.</h4>";

    interface Vehicle
    {
        public function start();
        public function stop();
    }

    class Car implements Vehicle
    {
        public $brand;
        public $model;

        public function __construct($brand, $model){
            $this->brand = $brand;
            $this->model = $model;
        }
        public function start()
        {
            return "Car is starting...";
        }

        public function stop()
        {
            return "Car is stopping...";
        }
    }

    $myCar = new Car();
    echo $myCar->start(); // Output: Car is starting...
    echo $myCar->stop();  // Output: Car is stopping...

    ?>

</div>

</main>
<footer>
    <!-- place footer here -->
    <?php include 'footer.php'; ?>