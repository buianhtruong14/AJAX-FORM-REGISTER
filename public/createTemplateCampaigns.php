<?php
session_start();
if(empty($_SESSION['customer_id'])){
    header("Location: index.php");
}

include 'header.php';

?>

<div class="container">
    <h1> Select Templates</h1>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="sel-templates">List Templates: </label>
                <select class="form-control" id="sel-templates">
                    <?php
                    include "../core/connectMySQL.php";
                    $customer_id = $_SESSION['customer_id'];
                    $sql = "SELECT * FROM templates WHERE customer_id= $customer_id";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <button class="btn btn-primary" id="create-campaign-template">Next</button>
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
        $("#create-campaign-template").click(function (e) {
            var template_id = $("#sel-templates").val();
            if (!template_id) {
                alert('Các ô không được để trống !');
                return false;
            } else {
                $.ajax({
                    url:"../core/createCampaigns.php",
                    type:"post",
                    data : {
                        template_id : template_id,
                    },
                    dataType: "json",
                    success: function (data) {
                        if (data) {
                            alert('Thêm danh sách thành công!');
                            window.location.href = "createServerCampaigns.php"
                        }
                    }
                });
            }
            e.preventDefault();
        });
    });
</script>