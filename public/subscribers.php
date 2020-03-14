<?php
session_start();
if(empty($_SESSION['customer_id'])){
    header("Location: index.php");
}

include 'header.php';

?>

<div class="container">
    <h1>Subscribers</h1>
    <div class="row">
        <div class="col">
            <button class="btn btn-primary" id="create-subscribers">Create</button>
        </div>
        <div class="col">
            <button class="btn btn-primary" id="import-subscribers">Import</button>
        </div>

    </div>
    <br>
    <table class="table">
        <thead>
        </thead>
        <tbody>
        <?php
        include "../core/connectMySQL.php";
        include "../core/pr.php";

        if (isset($_GET['lists_id'])){
            $_SESSION['lists_id'] = $_GET['lists_id'];
        }
        $lists_id = $_SESSION['lists_id'];
        $sql = "SELECT * FROM subscribers WHERE lists_id= $lists_id";
        $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
            ?>


            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
                    <a href="editSubscribers.php?id=<?php echo $row['id']; ?>" id="add-sub" class="btn " ><i class="fas fa-edit"></i> </a>
                </td>
                <td>
                    <a href="../core/deleteSubscribers.php?id=<?php echo $row['id']; ?>" id="delete-sub" class="btn " ><i class="fas fa-trash"></i> </a>
                </td>
            </tr>
        <?php }  ?>
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
        $("#create-subscribers").click(function (e) {
            e.preventDefault();
            window.location.href = "createSubscribers.php"
        });
    });
</script>