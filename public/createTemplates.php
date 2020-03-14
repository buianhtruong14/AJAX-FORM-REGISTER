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
                <div class="form-group">
                    <label > Content :</label>
                    <textarea class="form-control" rows="10"
                              id="content"></textarea>
                </div>
                <button class="btn btn-primary" id="create-temp">Create</button>
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
        $("#create-temp").click(function (e) {
            var name = $("#name").val();
            var content = $("#content").val();
            if (!name || !content) {
                alert('Các ô không được để trống !');
                return false;
            } else {
                $.ajax({
                    url: "../core/createTemplates.php",
                    type: "post",
                    data : {
                        name : name,
                        content : content,
                    },
                    dataType: "json",
                    success: function (data) {
                        if(data){
                            alert('Tạo nội dung mẫu thành công');
                            window.location.href = "templates.php";
                        }
                    }
                });
            }
            e.preventDefault();
        });
    });
</script>