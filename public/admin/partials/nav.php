
<div class=" container-fluid m-3">
    <nav class="navbar navbar-expand-lg bg-info rounded">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin.php"><img class="icons" src="../src/images/icons.png" alt="Shop MK"></a></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav justify-content-cennter ">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="admin.php?controller=category">
                            Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="admin.php?controller=product">
                            Product
                        </a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="admin.php?controller=order">Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="admin.php?controller=account">Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="admin.php?controller=static">Statistic</a>
                    </li>
                </ul>
            </div>
            <div>
                <button class="btn btn-warning " >
                    <a href="../model/accounts/handle.php?logout" class="text-decoration-none text-danger">Đăng xuất Admin: <?= $_SESSION['dangnhap']?></a>
                </button>
                
            </div>

        </div>
    </nav>
    <style>
        .icons {
            border-radius: 25px;
            width: 50px;
            height: 50px;
        }
    </style>
</div>