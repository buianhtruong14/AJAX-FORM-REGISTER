<?php
include 'header.php';
?>

<div class="login">
    <div class="container">
        <form method="post" action="dashboard.php">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password :</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <div class="col-4"></div>
            </div>
        </form>
    </div>
</div>

<?php
include 'footer.php';
?>
