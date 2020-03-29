<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
    <input type="radio" name="gender" id="male" value="Male">Male </br>
    <div id="text"></div>
    <input type="radio" name="gender" id="female" value="Female">Female </br>
    <input type="button" id="btn" value="Send">
    <script>
        $(function() {
            var file = document.getElementById('text');
            $("#male").click(function(){
                
                file.innerHTML = "<p>kaka tao là nam đây</p>";
            });
            $("#female").click(function(){
                
                file.innerHTML = "";
            });
        });
    </script>
</body>
</html>
