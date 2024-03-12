<div class="container">
    <?php
    if(isset($_GET['controller'])){
        $main = $_GET['controller'];
    }else{
        $main = '';
    }

    if($main == '' || $main == 'index') {
        include_once('../view/user/home.php');
    }
    if($main == 'login'){
        include_once('../view/user/login.php');
    }elseif($main == 'signup'){
        include_once('../view/user/signup.php');
    }elseif($main == 'search'){
        include_once('../view/user/search.php');
    }elseif($main == 'category' && isset($_GET['category'])){
        include_once('../view/user/category.php');
    }elseif($main == 'category' && isset($_GET['trangthai'])){
        include_once('../view/user/trangthai.php');
    }elseif($main == 'detail'){
        include_once('../view/user/detail.php');
    }elseif($main == 'cart'){
        include_once('../view/user/cart.php');
    }elseif($main == 'account'){
        include_once('../view/user/account.php');
    }elseif($main == 'buy'){
        include_once('../view/user/buy.php');
    }elseif($main == 'thanks'){
        include_once('../view/user/thanks.php');
    }elseif($main == 'changepw'){
        include_once('../view/user/changepw.php');
    }
    ?>



</div>