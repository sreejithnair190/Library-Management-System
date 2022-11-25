<?php
$id = $_GET['bid'];
$connection = mysqli_connect("localhost", "root", "", "lms");
$query = "DELETE FROM books WHERE book_id=$id";
$query_run = mysqli_query($connection, $query);
?>

?>
<script>
    alert("Book Deleted successfully")
    window.location.href = "manage_book.php"
</script>