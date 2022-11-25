<?php
$id = $_GET['isbid'];
$connection = mysqli_connect("localhost", "root", "", "lms");
$query = "DELETE FROM issued_books WHERE s_no=$id";
$query_run = mysqli_query($connection, $query);
?>

?>
<script>
    alert("Book Submitted")
    window.location.href = "view_issued_books.php"
</script>