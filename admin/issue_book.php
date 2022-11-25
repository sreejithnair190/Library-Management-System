<?php
error_reporting(E_ERROR | E_PARSE);
include('functions.php');
session_start();
$connection = mysqli_connect("localhost", "root", "", "lms");
$query = "select * from admins where email = '$_SESSION[email]'";
$query_run = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($query_run);
$_SESSION['name'] = $row['name'];

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Mangement System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="admin_dashboard.php" class="navbar-brand">Library Management System</a>
            </div>
            <span><strong class="text-white">Welcome <?php echo $_SESSION["name"]; ?>!</strong></span>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a href="view_profile.php" class="nav-link">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light fw-bolder" style="background-color: #e89d1f;">
        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-center">
                <li class="nav-item">
                    <a href="admin_dashboard.php" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle collapsed" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Books
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="add_book.php">Add new Book</a>
                        <a class="dropdown-item" href="manage_book.php">Manage Books</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle collapsed" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="add_category.php">Add new Category</a>
                        <a class="dropdown-item" href="manage_category.php">Manage Categories</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle collapsed" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Author
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="add_author.php">Add new Author</a>
                        <a class="dropdown-item" href="manage_author.php">Manage Authors</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="issue_book.php" class="nav-link">Issue Book</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 main-content">
            <center class="top">
                <h3>Issue Book</h3>
            </center>
            <form action="issue_book.php" method="post">
                <div class="form-group top">
                    <label for="book_name">Book Name</label>
                    <select class="form-control" name="book_name" required>
                        <?php 
                            $connection = mysqli_connect("localhost", "root", "");
                            $db = mysqli_select_db($connection, "lms");
                            $query = "SELECT book_name FROM books";
                            $query_run = mysqli_query($connection, $query);
                    
                            while ($row = mysqli_fetch_assoc($query_run)) { ?>
                                 <option><?php echo $row["book_name"]; ?></option>
                        <?php    
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group top">
                    <label for="book_author">Book Author</label>
                    <select class="form-control" name="book_author" required>
                        <?php 
                            $connection = mysqli_connect("localhost", "root", "");
                            $db = mysqli_select_db($connection, "lms");
                            $query = "SELECT author_name FROM authors";
                            $query_run = mysqli_query($connection, $query);
                    
                            while ($row = mysqli_fetch_assoc($query_run)) { ?>
                                 <option><?php echo $row["author_name"]; ?></option>
                        <?php    
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group top">
                    <label for="student_id">Student ID</label>
                    <select class="form-control" name="student_id" required>
                        <?php 
                            $connection = mysqli_connect("localhost", "root", "");
                            $db = mysqli_select_db($connection, "lms");
                            $query = "SELECT * FROM users";
                            $query_run = mysqli_query($connection, $query);
                    
                            while ($row = mysqli_fetch_assoc($query_run)) { ?>
                                 <option><?php echo $row["id"]; ?></option>
                        <?php    
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group top">
                    <label for="issue_date">Issue Date</label>
                    <input type="text" name="issue_date" id="issue_date" class="form-control" value=<?php echo date("d-m-y");?> required>
                </div>

                <button type="submit" name="issue_book" class="btn btn-primary top">Issue Book</button>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>

</html>

<?php
    if (isset($_POST['issue_book'])) {
        // $book_number = rand(1,10000);
        $student_id = (int)$_POST['student_id'];

        $connection = mysqli_connect("localhost", "root", "", "lms");

        $query = "SELECT * FROM books WHERE book_name = '$_POST[book_name]'";
        $query_run = mysqli_query($connection, $query);
        $book = mysqli_fetch_assoc($query_run);
        $book_number = (int)$book['book_no'];
        $book_author = $book['author_name'];

        $query = "INSERT INTO issued_books VALUES(null,$book_number,'$_POST[book_name]','$book_author',$student_id,1,'$_POST[issue_date]')";
        $query_run = mysqli_query($connection, $query);
        ?>
        <script src="../js/add.js"></script>
        <?php
    }
?>

                    