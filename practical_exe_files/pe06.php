<?php include 'header.php'; ?>

<div class="container m-5 p-5" id="content">


    <?php

    // Define an interface named `VehicleInterface` with methods like `start()`, `stop()`, and implement this interface in multiple classes. 

    echo "<h4>Define an interface named `VehicleInterface` with methods like `start()`, `stop()`, and implement this interface in multiple classes.</h4>";

    interface Vehicle1
    {
        public function start();
        public function stop();
    }

    class Car implements Vehicle1
    {
        public $brand;
        public $model;

        public function __construct($brand, $model)
        {
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

    class HeavyVehicle implements Vehicle1
    {
        public $brand;
        public $model;
        public $loadcapacity;

        public function __construct($brand, $model, $loadcapacity)
        {
            $this->brand = $brand;
            $this->model = $model;
            $this->loadcapacity = $loadcapacity;
        }
        public function start()
        {
            return "Heavy vehicle starting ...";
        }
        public function stop()
        {
            return "Heavy vehicle stopping ...";
        }
    }

    $myCar = new Car("Maruti", "Swift");
    echo "<p>" . $myCar->start() . "</p>"; // Output: Car is starting...
    echo "<p>" . $myCar->stop() . "</p>";  // Output: Car is stopping...

    $myTruck = new HeavyVehicle("Tata", "4025", "40000");
    echo "<p>" . $myTruck->start() . "</p>"; // Output: Heavy vehicle starting ...
    echo "<p>" . $myTruck->stop() . "</p>"; // Output: Heavy vehicle stopping ...
    ?>

</div>

</main>
<footer>
    <!-- place footer here -->
    <?php include 'footer.php'; ?>