<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; min-height:80vh">
    <ul class="nav nav-pills flex-column mb-auto text-center">

        <?php

        $folder = './';
        $files = scandir($folder);

        if ($files === false) {
            die("Error: Unable to read directory.");
        }

        foreach ($files as $file) {
            $filename = pathinfo($file, PATHINFO_FILENAME);
            $disname = strtoupper(str_replace("_", " ", $filename));
            $disname = ($disname == "INDEX") ? "HOME" : $disname;
            if (is_file($file) && pathinfo($file, PATHINFO_EXTENSION) === "php") {
                if (!in_array($filename, array('header', 'footer', 'navbar', 'sidebar')))
                    echo "<li class='nav-item'>
                <a href='$file' class='nav-link text-white' aria-current='page'>
                    $disname
                </a>
            </li>";
            }
        }

        ?>

    </ul>

</div>