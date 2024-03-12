<div class="container">

    <?php
    session_start();
    require_once("../../connect.php");
    if (!isset($_GET['controller'])) {
        include_once("partials/header.php");
        include_once("partials/nav.php");
        echo "<h1 class='text-center text-white mt-5 pt-5' style='text-shadow: #8FEBDE 4px -10px 3px, #000 -3px 10px 4px; ' >Xin chào Admin</h1>";
        include_once("partials/main.php");
    } else {
        include_once("partials/header.php");
        include_once("partials/nav.php");
        include_once("partials/main.php");
    }

    ?>

</div>