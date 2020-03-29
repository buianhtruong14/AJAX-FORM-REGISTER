<?php
session_start();
if(empty($_SESSION['customer_id'])){
    header("Location: index.php");
}

include 'header.php';

?>

<div class="container">
    <h1> Select Server Sending</h1>
    <div class="row">
        <div class="col-6">
            <form >
                <div class="form-group">
                    <label for="sel-server">List Server Sending: </label>
                    <select class="form-control" id="sel-server" name="server_sending_id">
                        <?php
                        include "../core/connectMySQL.php";
                        $customer_id = $_SESSION['customer_id'];
                        $sql = "SELECT * FROM server_sendings WHERE customer_id= $customer_id";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button class="btn btn-primary"  id="create-campaign-server">Send</button>
            </form>

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
        $("#create-campaign-server").click(function (e) {
            var server_sending_id = $("#sel-server").val();
            if (!server_sending_id) {
                alert('Các ô không được để trống !');
                return false;
            } else {
                $.ajax({
                    url:"../core/createCampaigns.php",
                    type:"post",
                    data : {
                        server_sending_id : server_sending_id,
                    },
                    dataType: "json",
                    success: function (data) {
                        if (data) {
                            alert('Tạo Chiến dịch thành công!');
                            window.location.href = "sendMail.php"
                        }
                    }
                });
            }
            e.preventDefault();
        });
    });
</script>