<?php
$id = $_GET['aid'];
$connection = mysqli_connect("localhost", "root", "", "lms");
$query = "DELETE FROM authors WHERE author_id=$id";
$query_run = mysqli_query($connection, $query);
?>

?>
<script>
    alert("Author Deleted successfully")
    window.location.href = "manage_author.php"
</script>