<?php

session_start();

if(isset($_SESSION["k"])){

    unset($_SESSION["k"]);

    ?>

    <script src="script.js"></script>
    <script>
        window.location="manageusers.php";
      
    </script>
    <?php
}

if(isset($_SESSION["p"])){

    unset($_SESSION["p"]);
    
    ?>

    <script src="script.js"></script>
    <script>
        window.location="manageproducts.php";
      
    </script>
    <?php
}


if(isset($_SESSION["seller"])){

    unset($_SESSION["seller"]);
    
    ?>

    <script src="script.js"></script>
    <script>
        window.location="manageseller.php";
      
    </script>
    <?php
}





