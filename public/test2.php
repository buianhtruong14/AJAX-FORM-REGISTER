<?php
include 'header.php';
?>

<div class="register">
    <div class="container">
        <h2>Đăng Ký</h2>
        <form method="post" >
            <div class="row">
                <div class="col-6 form-register">
                    <div class="form-group">
                        <label for="first_name">First Name :</label>
                        <input type="text" class="form-control" id="first_name"
                               placeholder="Enter first name" name="first_name">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name :</label>
                        <input type="text" class="form-control" id="last_name"
                               placeholder="Enter last name" name="last_name">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" class="form-control" id="email"
                               placeholder="Enter email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password :</label>
                        <input type="password" class="form-control" id="password"
                               placeholder="Enter password" name="password">
                    </div>
                </div>
            </div>
            <div class="row btn-register">
                <button  type="submit" class="btn btn-primary" id="check">Submit</button>
            </div>
        </form>
    </div>
</div>

<?php
include 'footer.php';
if (isset($_POST['email'])) {
    include '../core/connectMySQL.php';
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO customers (first_name, last_name, email, password)
        VALUE ('$first_name', '$last_name', '$email', '$password')";


    if ($conn->query($sql) === TRUE) {
        $check = true;
    }

    $conn->close();


}
?>
<script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>





