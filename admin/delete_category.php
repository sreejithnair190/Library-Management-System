<?php
$id = $_GET['cid'];
$connection = mysqli_connect("localhost", "root", "", "lms");
$query = "DELETE FROM category WHERE cat_id=$id";
$query_run = mysqli_query($connection, $query);
?>

?>
<script>
    alert("Category Deleted successfully")
    window.location.href = "manage_category.php"
</script>