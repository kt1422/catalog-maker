<?php
    include "./views/modal_logout.php";
?>
<nav class="navbar navbar-expand-lg sticky-top border-bottom bg-danger" data-bs-theme="dark">
    <div class="container-fluid px-5">
        <a class="navbar-brand brand-logo fw-bold pb-0 text-white" href="./index.php?page=home">CATALOG MAKER</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>
            <div id="tokenName" class="navbar-nav">
                <div class="nav-item">
                    <a class="nav-link nav-menu text-white <?php echo $_GET['page']=="home"?"active":""; ?>" aria-current="page" href="./index.php?page=home">Home</a>
                </div>
                <div class="nav-item">
                    <a class="nav-link nav-menu text-white <?php echo $_GET['page']=="catalog"?"active":""; ?>" aria-current="page" href="./index.php?page=catalog">Catalog</a>
                </div>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-menu text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="rounded-circle border border-dark mx-1" src="./assets/img/pfp.jpg" alt="" style="width: 25px; height: 25px;">
                        Hello <?php echo $_SESSION['user']; ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item nav-menu" href="./index.php?page=profile">Profile</a></li>
                        <!-- <li><a class="dropdown-item nav-menu" href="#">Settings</a></li> -->
                        <li><a class="dropdown-item nav-menu" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal4">Log out</a></li>
                    </ul>
                </li>
            </div>
        </div>
    </div>
</nav>