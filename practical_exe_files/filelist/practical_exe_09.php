<?php include 'header.php'; ?>

<div class="container m-5 p-5" id="content">

    <?php

    class User
    {
        public $fname;
        public $lname;
        public $email;
        private $pwd;
        public $dob;

        public function __construct($fname, $lname, $email, $pwd, $dob)
        {
            $this->fname = $fname;
            $this->lname = $lname;
            $this->email = $email;
            $this->pwd = $pwd;
            $this->dob = $dob;
        }

        public function __call($name, $args)
        {
            if ($name == 'save') {
                return "Method not found";
            }
            return "Method not found";
        }

        public function create()
        {
            /*
            $dbquery = "INSERT INTO users ('fname', 'lname', 'email', 'pwd', 'dob') 
            VALUES ($this->fname, $this->lname, $this->email, $this->pwd, $this->dob);";

            return $dbquery;

            */
            print("User account created...");
        }

        public function display()
        {
            print_r(array(
                'fname' => $this->fname,
                'lname' => $this->lname,
                'email' => $this->email,
                'dob' => $this->dob
            ));
        }
    }

    ?>

    <form action="" method="post">
        <table class="table table-bordered border-dark text-center">
            <tr>
                <td>
                    <label for="fname" class="form-control">First Name</label>
                </td>
                <td>
                    <input type="text" name="fname" class="form-control" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="lname" class="form-control">Last Name</label>
                </td>
                <td>
                    <input type="text" name="lname" class="form-control" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email" class="form-control">Email Address</label>
                </td>
                <td>
                    <input type="email" name="email" class="form-control" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pwd" class="form-control">Password</label>
                </td>
                <td>
                    <input type="password" name="pwd" class="form-control" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="con-pwd" class="form-control">Confirm Password</label>
                </td>
                <td>
                    <input type="password" name="con-pwd" class="form-control" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="dob" class="form-control">Date of Birth</label>
                </td>
                <td>
                    <input type="date" name="dob" class="form-control" required>
                </td>
            </tr>
            <tr>
                <td colspan="2">

                    <input name="submit" class="btn btn-primary" type="submit" value="submit" />
                </td>
            </tr>
        </table>
    </form>

    <?php

    if (isset($_REQUEST['submit'])) {
        $fname = $_REQUEST['fname'];
        $lname = $_REQUEST['lname'];
        $email = $_REQUEST['email'];
        $pwd = $_REQUEST['pwd'];
        $dob = $_REQUEST['dob'];

        $user = new User($fname, $lname, $email, $pwd, $dob);

        $user->create();
        echo "<br>";
        echo $user->saved();
        echo "<br>";
        $user->display();
    }

    ?>

</div>

</main>
<footer>
    <!-- place footer here -->
    <?php include 'footer.php'; ?>