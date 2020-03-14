<?php
session_start();
if(empty($_SESSION['customer_id'])){
    header("Location: index.php");
}
include 'header.php';
?>
<div class="container">
    <h1>Create</h1>
    <form>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name"> Name :</label>
                    <input type="text" class="form-control" id="name"
                           placeholder="Enter first name" name="name">
                </div>
                <button class="btn btn-primary" id="create-lists-one">Create</button>
            </div>

        </div>
    </form>
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
        $("#create-lists-one").click(function (e) {
            var name = $("#name").val();
            if (!name) {
                alert('Tên danh sách không được để trống !');
                return false;
            } else {
                $.ajax({
                    url: "../core/createLists.php",
                    type: "post",
                    data : {
                        name : name
                    },
                    dataType: "json",
                    success: function (data) {
                        if(data){
                            alert('Thêm vào danh sách thành công');
                            window.location.href = "lists.php";
                        }
                    }
                });
            }
            e.preventDefault();
        });
    });
</script>