<?php
session_start();
if(empty($_SESSION['customer_id'])){
    header("Location: index.php");
}
include 'header.php';
?>

<div class="container">
    <h1>Lists</h1>
    <div class="row">
        <div class="col">
            <button class="btn btn-primary" id="create-lists">Create</button>
        </div>

    </div>
    <br>
    <table class="table">
        <thead>
        </thead>
        <tbody>
        <?php
        include "../core/connectMySQL.php";
        $customer_id = $_SESSION['customer_id'];
        $sql = "SELECT * FROM lists WHERE customer_id= $customer_id";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td>
                    <a href="subscribers.php?lists_id=<?php echo $row['id']; ?>" id="add-sub" class="btn "><i class="fas fa-plus"></i> </a>
                </td>
                <td>
                    <a href="../core/deleteLists.php?lists_id=<?php echo $row['id']; ?>" id="del-lists" class="btn "><i class="fas fa-trash"></i> </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
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
        $("#create-lists").click(function (e) {
            e.preventDefault();
            window.location.href = "createLists.php";
        })
    })
</script>