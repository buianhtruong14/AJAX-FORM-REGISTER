<?php
session_start();
if(empty($_SESSION['customer_id'])){
    header("Location: index.php");
}

include 'header.php';
include '../core/connectMySQL.php';
include '../core/pr.php';

$id = $_GET['id'];

$sql = "SELECT * FROM server_sendings WHERE id=$id";
$result = $conn->query($sql)->fetch_assoc();

?>
?>

<div class="container">
    <h1> Edit Subscribers</h1>
    <div class="row">
        <div class="col-3">
            <div class="form-group">
                <label for="name">Name Server Sending:</label>
                <input type="text" class="form-control" id="name"
                       placeholder="Enter name" name="name"
                       value="<?php echo $result['name']; ?>">
            </div>
            <div class="form-group">
                <label for="account">Account :</label>
                <input type="text" class="form-control" id="account"
                       placeholder="Enter account" name="account"
                       value="<?php echo $result['account']; ?>">
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="password">Password :</label>
                <input type="text" class="form-control" id="password"
                       placeholder="Enter password" name="password"
                       value="<?php echo $result['password']; ?>">
            </div>
            <div class="form-group">
                <input type="hidden"  id="id" name="id"
                       value="<?php echo $result['id']; ?>">
            </div>
            <button class="btn btn-primary" id="edit-temp">Submit</button>
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
        $("#edit-temp").click(function (e) {
            var name = $("#name").val();
            var account = $("#account").val();
            var password = $("#password").val();
            var id = $("#id").val();
            if (!name || !account || !password){
                alert('Các ô không được để trống !');
                return false;
            } else {
                $.ajax({
                    url:"../core/editServerSendings.php",
                    type:"post",
                    data : {
                        name:name,
                        account:account,
                        password:password,
                        id:id
                    },
                    dataType: "json",
                    success: function (data) {
                        if (data) {
                            alert('Chỉnh sửa thành công!');
                            window.location.href = "serverSendings.php"
                        }
                    }
                });
            }
            e.preventDefault();
        });
    });
</script>