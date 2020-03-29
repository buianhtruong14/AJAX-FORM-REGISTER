<?php
session_start();
if(empty($_SESSION['customer_id'])){
    header("Location: index.php");
}
include 'header.php';
?>
<div class="container">
    <h1>Create</h1>
    <form action="../core/createTemplates.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="name"> Name :</label>
                    <input type="text" class="form-control" id="name"
                           placeholder="Enter first name" name="name">
                </div>
                <div class="form-group">
                    <label > Content :</label>
                    <textarea class="form-control"
                              id="content" name="content"></textarea>
                </div>
                <div class="form-group">
                    <button   class="btn btn-primary" id="add-attachment">Add Attachment</button>
                    <!-- <label for="countfile"> Số file đính kèm :</label>
                    Event onchange
                    <input type="number" class="form-control" id="countfile"
                           name="countfile" min="0" onchange="countFile(this)"> -->
                    <!-- Test event other
                    <input type="number" class="form-control" id="countfile"
                           name="countfile" min="0" > -->
                </div>
               <!-- <div class="form-group">
                   <label for="file1"> File :</label>
                   <input type='file' class='form-control' id='file1' name="fileUpLoad[]">
              </div> -->

                <div id="showFileUpload"></div>
                <input  type="submit" class="btn btn-primary" id="create-temp" value="Send">
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
<script>
    // Thay thế <textarea id="post_content"> với CKEditor
    CKEDITOR.replace( "content" );// tham số là biến name của textarea
</script>
<!--************Test Event Other************-->
<!--<script type="text/javascript" language="JavaScript">-->
<!--    $(function () {-->
<!--        $("#countfile").mouseleave(function(){-->
<!--            var file = document.getElementById('showFileUpload');-->
<!--            var i;-->
<!--            var value = obj.value;-->
<!--             console.log(value);-->
<!--            if(value){-->
<!--                for (i = 0; i < value; i++)-->
<!--                {-->
<!--                    file.innerHTML += "<div class='form-group'>\n" +-->
<!--                        "                    <label for='file'> File number "+ (i+1) +" :</label>\n" +-->
<!--                        "                    <input type='file' class='form-control' id='file1' name='file1'>\n" +-->
<!--                        "                </div>";-->
<!--                }-->
<!---->
<!--            }-->
<!--        });-->
<!--    });-->
<!--</script>-->
<script type="text/javascript" language="JavaScript">
    $(function () {
        $("#add-attachment").click(function (e) {
            $("#showFileUpload").append("<input type='file' class='form-control' id='file1' name='fileUpLoad[]'>");
            e.preventDefault();
        });
    });
    function countFile(obj)
    {
        var file = document.getElementById('showFileUpload');
        var i;
        var value = obj.value;
        // console.log(value);
        if(value){
            for (i = 0; i < value; i++)
            {
                file.innerHTML += "<div class='form-group'>\n" +
                    "                    <label for='file'> File number "+ (i+1) +" :</label>\n" +
                    "                    <input type='file' class='form-control' id='file1' name='file"+ (i+1) +"'>\n" +
                    "                </div>";
            }

        }
    }
</script>

<!--*************Send data ajax***********-->
<!--<script type="text/javascript" language="javascript">-->
<!--    $(function () {-->
<!--        $("#create-temp").click(function (e) {-->
<!--            var name = $("#name").val();-->
<!--            var content = $("#content").val();-->
<!--            console.log(content);-->
<!--            if (!name) {-->
<!--                alert('Các ô không được để trống !');-->
<!--                return false;-->
<!--            } else {-->
<!--                $.ajax({-->
<!--                    url: "../core/createTemplates.php",-->
<!--                    type: "post",-->
<!--                    data : {-->
<!--                        name : name,-->
<!--                        content : content,-->
<!--                    },-->
<!--                    dataType: "json",-->
<!--                    success: function (data) {-->
<!--                        if(data){-->
<!--                            alert('Tạo nội dung mẫu thành công');-->
<!--                            window.location.href = "templates.php";-->
<!--                        }-->
<!--                    }-->
<!--                });-->
<!--            }-->
<!--            e.preventDefault();-->
<!--        });-->
<!--    });-->
<!--</script>-->