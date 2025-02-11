<?php include 'header.php'; ?>

<div class="container m-5 p-5" id="content">

    <?php

    // Write a method in a class that accepts type-hinted parameters and demonstrate howit works with different data types.

    echo "<h4>Write a method in a class that accepts type-hinted parameters and demonstrate howit works with different data types.</h4>";

    class UserM
    {
        public int $id;
        public string $name;
        public string $email;
        public int $phone;
        public float $weight;
        public float $height;

        public function __construct(int $id, string $name, string $email, int $phone, float $weight, float $height)
        {
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->phone = $phone;
            $this->weight = $weight;
            $this->height = $height;
        }
    }

    $user = new UserM(1, "Tom", "tom@email.com", 9998887777, 65.84, 143.29);

    ?>

    <h3>User Details</h3>

    <p> No_ : <?php echo $user->id ?></p>

    <p> Name : <?php echo $user->name ?></p>

    <p> Email Address : <?php echo $user->email ?></p>

    <p> Phone Number : <?php echo $user->phone ?></p>

    <p> Weight : <?php echo $user->weight ?> kg</p>

    <p> Height : <?php echo $user->height ?> cms</p>


</div>

</main>
<footer>
    <!-- place footer here -->
    <?php include 'footer.php'; ?>