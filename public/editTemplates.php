<?php
session_start();
if(empty($_SESSION['customer_id'])){
    header("Location: index.php");
}

include 'header.php';
include '../core/connectMySQL.php';
include '../core/pr.php';


$templates_id = $_GET['templates_id'];
$sql = "SELECT * FROM templates WHERE id=$templates_id";
$result = $conn->query($sql)->fetch_assoc();
?>

<div class="container">
    <h1> Create Subscribers</h1>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="name"> Name :</label>
                <input type="text" class="form-control" id="name"
                       placeholder="Enter first name" name="name"
                       value="<?php echo $result['name']; ?>">
            </div>
            <div class="form-group">
                <label > Content :</label>
                <textarea class="form-control" rows="10"
                          id="content" >
                    <?php echo $result['content']; ?></textarea>
            </div>
            <div class="form-group">
                <input type="hidden"  id="id" name="id"
                       value=" <?php echo $result['id']; ?>">
            </div>
            <button class="btn btn-primary" id="edit-temp">Create</button>
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
            var content = $("#content").val();
            var id = $("#id").val();
            if (!name || !content){
                alert('Email không được để trống !');
                return false;
            } else {
                $.ajax({
                    url:"../core/editTemplates.php",
                    type:"post",
                    data : {
                        name : name,
                        content : content,
                        id : id
                    },
                    dataType: "json",
                    success: function (data) {
                        if (data) {
                            alert('Chỉnh sửa thành công!');
                            window.location.href = "templates.php"
                        }
                    }
                });
            }
            e.preventDefault();
        });
    });
</script>