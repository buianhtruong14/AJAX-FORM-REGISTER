<?php
session_start();
if(empty($_SESSION['customer_id'])){
    header("Location: index.php");
}

include 'header.php';

?>

<div class="container">
    <h1> Create Campaigns</h1>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="name">Name Campaigns*:</label>
                <input type="text" class="form-control" id="name"
                       placeholder="Enter name" name="name">
            </div>
            <div class="form-group">
                <label for="from_to">From To* :</label>
                <input type="email" class="form-control" id="from_to"
                       placeholder="Enter from to" name="from_to">
            </div>
            <div class="form-group">
                <label for="from_name">From Name* :</label>
                <input type="text" class="form-control" id="from_name"
                       placeholder="Enter from name" name="from_name">
            </div>
            <div class="form-group">
                <label for="subject">Subject* :</label>
                <input type="text" class="form-control" id="subject"
                       placeholder="Enter subject" name="subject">
            </div>
            <div class="form-group">
                <label for="reply_to">Reply To* :</label>
                <input type="email" class="form-control" id="reply_to"
                       placeholder="Enter account" name="reply_to">
            </div>
            <button class="btn btn-primary" id="create-campaign-info">Submit</button>
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
        $("#create-campaign-info").click(function (e) {
            var name = $("#name").val();
            var reply_to = $("#reply_to").val();
            var subject = $("#subject").val();
            var from_to = $("#from_to").val();
            var from_name = $("#from_name").val();
            if (!name || !reply_to || !subject || !from_to) {
                alert('Các ô không được để trống !');
                return false;
            } else {
                $.ajax({
                    url:"../core/createCampaigns.php",
                    type:"post",
                    data : {
                        name : name,
                        reply_to : reply_to,
                        subject : subject,
                       from_name : from_name,
                       from_to : from_to
                    },
                    dataType: "json",
                    success: function (data) {
                        if (data) {
                            window.location.href = "createListCampaigns.php"
                        }
                    }
                });
            }
            e.preventDefault();
        });
    });
</script>