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
                <button class="btn btn-primary" id="check">Submit</button>
            </div>
        </form>
    </div>
</div>

<script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
<script type="text/javascript" language="javascript">
    $(function () {
        $("#check").click(function (e) {

            var email = document.getElementById('email').value;
            var first_name = document.getElementById('first_name').value;
            var last_name = document.getElementById('last_name').value;
            var password = document.getElementById('password').value;

            if (!email || !first_name  || !last_name || !password ) {
                alert('Hãy nhập lại thông tin của bạn !');
                return false;
            } else {
                $.ajax({
                    url: "app.yoyo.de/dangki.php",
                    type: "post",
                    data: {
                        email: email,
                        first_name: first_name,
                        last_name: last_name,
                        password: password
                    },
                    dataType:"json",
                    success: function (data) {
                        alert(data);
                    }
                });
            }
            e.preventDefault();

        });
    });
</script>

<?php
include 'footer.php';
?>

<!--Code handing-->

