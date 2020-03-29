<?php
session_start();
if(empty($_SESSION['customer_id'])){
    header("Location: index.php");
}

include 'header.php';

?>

<div class="container">
    <h1> Send Mail</h1>
    <div class="row">
        
            <button class="btn btn-primary" id="send-mail">Send</button>
        


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
        $("#send-mail").click(function (e) {
            
                $.ajax({
                    url:"../core/sendMail.php",
                    type:"post",
                    data : {
                        'status' : 'send',
                    },
                    dataType: "json",
                    success: function (data) {
                        if (data) {
                            alert('Gửi Mail thành công!');
                            window.location.href = "Campaigns.php"
                        }
                    }
                });
            
            e.preventDefault();
        });
    });
</script>