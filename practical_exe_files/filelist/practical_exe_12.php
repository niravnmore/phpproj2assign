<?php include 'header.php'; ?>

<div class="container m-5 p-5" id="content">


    <?php

    // Write a class that shows examples of each visibility type and how they restrict access to properties and methods.

    echo "<h4>Write a class that shows examples of each visibility type and how they restrict access to properties and methods.</h4>";

    class MyClass
    {
        public $propPublic = "This is a public property";
        protected $propProtected = "This is a protected property";
        private $propPrivate = "This is a private property";
        public function metPublic()
        {
            return "This is a public method";
        }
        protected function metProtected()
        {
            return "This is a protected method";
        }
        private function metPrivate()
        {
            return "This is a private method";
        }
        public function getPropProtected()
        {
            return $this->propProtected;
        }
        public function getPropPrivate()
        {
            return $this->propPrivate;
        }
        public function runMetProtected()
        {
            return $this->metProtected();
        }
        public function runMetPrivate()
        {
            return $this->metPrivate();
        }
    }

    class MyChildClass extends MyClass {}
    $obj = new MyClass();
    $obj2 = new MyChildClass();

    ?>

    <div class="row">
        <div class="col-6">
            <h5>Parent Class</h5>
            <h6>Properties</h6>
            <p> <?php echo $obj->propPublic; ?></p>
            <p> <?php
                // echo $obj->propProtected; Fatal Error
                echo $obj->getPropProtected();
                ?></p>
            <p> <?php
                // echo $obj->propPrivate; Fatal Error
                echo $obj->getPropPrivate();
                ?></p>
            <h6>Methods</h6>
            <p> <?php echo $obj->metPublic(); ?></p>
            <p> <?php
                // echo $obj->metProtected(); Fatal Error
                echo $obj->runMetProtected();
                ?></p>
            <p> <?php
                // echo $obj->metPrivate(); Fatal Error
                echo $obj->runMetPrivate();
                ?></p>
        </div>
        <div class="col-6">
            <h5>Child Class</h5>
            <h6>Properties</h6>
            <p> <?php echo $obj2->propPublic; ?></p>
            <p> <?php echo $obj2->getPropProtected(); ?></p>
            <p> <?php echo $obj2->getPropPrivate(); ?></p>
            <h6>Methods</h6>
            <p> <?php echo $obj2->metPublic(); ?></p>
            <p> <?php echo $obj2->runMetProtected(); ?></p>
            <p> <?php echo $obj2->runMetPrivate(); ?></p>
        </div>
    </div>
</div>

</main>
<footer>
    <!-- place footer here -->
    <?php include 'footer.php'; ?>