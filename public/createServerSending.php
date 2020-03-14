<?php
session_start();
if(empty($_SESSION['customer_id'])){
    header("Location: index.php");
}

include 'header.php';

?>

<div class="container">
    <h1> Create Server Sendings</h1>
    <div class="row">
        <div class="col-3">
            <div class="form-group">
                <label for="name">Name Server Sending:</label>
                <input type="text" class="form-control" id="name"
                       placeholder="Enter name" name="name">
            </div>
            <div class="form-group">
                <label for="account">Account :</label>
                <input type="text" class="form-control" id="account"
                       placeholder="Enter account" name="account">
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="password">Password :</label>
                <input type="text" class="form-control" id="password"
                       placeholder="Enter password" name="password">
            </div>
            <button class="btn btn-primary" id="create-temp">Submit</button>
        </div>

    </div>
</div>

<?php
include 'footer.php';
?>
<script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
<script type="text/javascript" language="javascript">
    $(function () {
        $("#create-temp").click(function (e) {
            var name = $("#name").val();
            var account = $("#account").val();
            var password = $("#password").val();
            if (!name || !account || !password){
                alert('Các ô không được để trống !');
                return false;
            } else {
                $.ajax({
                    url:"../core/createServerSendings.php",
                    type:"post",
                    data : {
                        name : name,
                        account : account,
                        password : password
                    },
                    dataType: "json",
                    success: function (data) {
                        if (data) {
                            alert('Thêm danh sách thành công!');
                            window.location.href = "serverSendings.php"
                        }
                    }
                });
            }
            e.preventDefault();
        });
    });
</script>