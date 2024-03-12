
<div class="container-fluid white">
    <?php 
    if(isset($_GET['controller'])){
        $main = $_GET['controller'];
        if(isset($_GET['action'])){
            $action = $_GET['action'];
        }else{
            $action = 'index';
        }
    }else{
        $main = '';
    }
    if($main == '' || $main == 'index'){
        include_once('admin.php');
    }elseif($main == 'product' && $action=='index'){
        include_once('../../view/admin/product.php');
    }elseif($main == 'product' && $action == 'update'){
        include_once('../../view/admin/upproduct.php');
    }elseif($main == 'product' && $action == 'add'){
        include_once('../../view/admin/addproduct.php');
    }elseif($main == 'category' && $action == 'index'){
        include_once('../../view/admin/category.php');
    }elseif($main == 'category' && $action == 'add'){
        include_once('../../view/admin/addcategory.php');
    }elseif($main == 'category' && $action == 'update'){
        include_once('../../view/admin/upcategory.php');
    }elseif($main == 'account' && $action == 'index'){
        include_once('../../view/admin/account.php');
    }elseif($main == 'order' && $action == 'index'){
        include_once('../../view/admin/order.php');
    }elseif($main == 'order' && $action == 'detail'){
        include_once('../../view/admin/detailorder.php');
    }elseif($main == 'static' ){
        include_once('../../view/admin/statistics.php');
    }
    ?>
</div>