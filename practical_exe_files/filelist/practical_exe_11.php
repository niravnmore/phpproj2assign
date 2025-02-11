<?php include 'header.php'; ?>

<div class="container m-5 p-5" id="content">


    <?php

    // Create two traits and use them in a class to demonstrate how to include multiple behaviors.

    echo "<h4>Create two traits and use them in a class to demonstrate how to include multiple behaviors.</h4>";

    trait TraitA
    {
        public function greetA()
        {
            echo "Hello from Trait A\n";
        }
    }

    trait TraitB
    {
        public function greetB()
        {
            echo "Hello from Trait B\n";
        }
    }

    class MyClass
    {
        use TraitA, TraitB;
    }

    $obj1 = new MyClass();
    ?>

    <p><?php echo $obj1->greetA(); ?></p>
    <p><?php echo $obj1->greetB(); ?></p>

</div>

</main>
<footer>
    <!-- place footer here -->
    <?php include 'footer.php'; ?>