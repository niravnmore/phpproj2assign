<?php include './header.php'; ?>

<div class="container m-5 p-5" id="content">
    <?php

    // Create a simple class in PHP that demonstrates encapsulation by using private and public properties and methods.

    echo "<h4>Create a simple class in PHP that demonstrates encapsulation by using private and public properties and methods.</h4>";

    class BankAccount
    {
        private $accountNumber;
        private $balance;

        public function __construct($accountNumber, $initialBalance)
        {
            $this->accountNumber = $accountNumber;
            $this->balance = $initialBalance;
        }

        public function deposit($amount)
        {
            if ($amount > 0) {
                $this->balance += $amount;
                echo "<p>Deposited: $amount. New Balance: $this->balance</p>";
            } else {
                echo "<p>Invalid deposit amount.</p>";
            }
        }

        public function withdraw($amount)
        {
            if ($amount > 0 && $amount <= $this->balance) {
                $this->balance -= $amount;
                echo "<p>Withdrawn: $amount. Remaining Balance: $this->balance</p>";
            } else {
                echo "<p>Invalid withdrawal amount or insufficient balance.</p>";
            }
        }

        public function getBalance()
        {
            return $this->balance;
        }
    }

    // Example usage
    $account = new BankAccount("123456789", 1000);
    echo "<p> New Account created wih Initial Balance: " . $account->getBalance() . "</p>";
    $account->deposit(500);
    $account->withdraw(200);
    echo "<p>Final Balance: " . $account->getBalance() . "</p>";
    ?>


</div>

</main>
<footer>
    <!-- place footer here -->
    <?php include './footer.php'; ?>