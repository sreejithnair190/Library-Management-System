<?php
// error_reporting(E_ERROR | E_PARSE);
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
                <h3>Add New Book</h3>
            </center>
            <form action="add_book.php" method="post">
                <div class="form-group top">
                    <label for="book_name">Book Name</label>
                    <input type="text" name="book_name" id="book_name" class="form-control" required>
                </div>

                <div class="form-group top">
                    <label for="author_name">Book Author</label>
                    <select class="form-control" name="author_name" required>
                        <?php 
                            $connection = mysqli_connect("localhost", "root", "");
                            $db = mysqli_select_db($connection, "lms");
                            $query = "SELECT * FROM authors";
                            $query_run = mysqli_query($connection, $query);
                    
                            while ($author = mysqli_fetch_assoc($query_run)) { ?>
                                 <option><?php echo $author["author_name"]; ?></option>
                        <?php  
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group top">
                    <label for="cat_name">Category</label>
                    <select class="form-control" name="cat_name" required>
                        <?php 
                            $connection = mysqli_connect("localhost", "root", "");
                            $db = mysqli_select_db($connection, "lms");
                            $query = "SELECT * FROM category";
                            $query_run = mysqli_query($connection, $query);
                    
                            while ($category = mysqli_fetch_assoc($query_run)) { ?>
                                 <option><?php echo $category["cat_name"]; ?></option>
                        <?php  
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group top">
                    <label for="book_no">Book Number</label>
                    <input type="number" name="book_no" id="book_no" class="form-control" required>
                </div>

                <div class="form-group top">
                    <label for="book_price">Book Price</label>
                    <input type="number" name="book_price" id="book_price" class="form-control" required>
                </div>

                <button type="submit" name="add_book" class="btn btn-primary top">Add Book</button>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>

</html>

<?php
    if (isset($_POST['add_book'])) {
        $connection = mysqli_connect("localhost", "root", "", "lms");
        $query = "INSERT INTO books VALUES('','$_POST[book_name]','$_POST[author_name]','$_POST[cat_name]',$_POST[book_no],$_POST[book_price])";
        $query_run = mysqli_query($connection, $query);
    }
?>