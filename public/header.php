<!DOCTYPE html>
<html lang="vi">
<head>
    <title>YoYo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src='ckeditor/ckeditor/ckeditor.js'></script>
</head>
<body>
<header>
    <?php
    if (isset($_SESSION['customer_id'])) {
    ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-10">
                    <div class="navbar navbar-expand-sm ">
                        <a class="navbar-brand logo-header2" href="#">YoYo</a>
                        <ul class="navbar-nav navbar-header2 ">
                            <li class="nav-item ">
                                <a class="nav-link nav-link-header2 " href="dashboard.php">Dashboard</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link nav-link-header2" href="campaigns.php">Campaigns</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-header2 " href="lists.php">Lists</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-header2" href="templates.php">Templates</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-header2" href="serverSendings.php">Server Sending</a>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="col-2 account-header">
                    <div class="dropdown dropdown-account-header">
                        <p class="dropdown-toggle"
                           data-toggle="dropdown">
                            Chào <?php echo $_SESSION['name']; ?>
                        </p>
                        <div class="dropdown-menu dropdown-accout-db">
                            <a class="dropdown-item" href="../core/signout.php">Đăng Xuất</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } else {?>
    <div class="container-fluid " >
        <div class="container">
            <div class="row">
                <div class="col-3 logo">
                    <h1>YoYo</h1>
                </div>
                <div class="col-6 logo-quote">
                    <p>Ứng Dụng Gửi Mail Marketing Hàng Đầu Việt Nam </p>
                </div>
                <div class="col-3 btn-login-header">


                    <a href="login.php" class="link-login-header">Đăng Nhập</a>

                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</header>
