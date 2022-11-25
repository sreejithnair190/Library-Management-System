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
        <div class="col-md-4">
            <div class="card mb-3 ms-3 mt-4" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="../images/users.png" class="img-fluid rounded-start mt-2 ms-2" width="80%" alt="book">
                    </div>
                    <div class="col-md-8">
                        <div class="card-header">
                            <h3 class="fs-2"><strong>Users</strong></h3>
                        </div>
                        <div class="card-body">
                            <p>Total Users : <?php echo get_count('users'); ?></p>
                            <a href="registered_users.php" target="blank" class="btn btn-primary">View Registered Users</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3 ms-3 mt-4" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="../images/book.png" class="img-fluid rounded-start mt-3" alt="book">
                    </div>
                    <div class="col-md-8">
                        <div class="card-header">
                            <h3 class="fs-2"><strong>Books</strong></h3>
                        </div>
                        <div class="card-body">
                            <p>Available books : <?php echo get_count('books'); ?></p>
                            <a href="registered_books.php" target="blank" class="btn btn-primary">View Registered Books</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3 ms-3 mt-4" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="../images/book-category.png" class="img-fluid rounded-start mt-3 ms-1" width="95%" alt="book">
                    </div>
                    <div class="col-md-8">
                        <div class="card-header">
                            <h3 class="fs-2"><strong>Category</strong></h3>
                        </div>
                        <div class="card-body">
                            <p>Total book categories : <?php echo get_count('category'); ?></p>
                            <a href="registered_category.php" target="blank" class="btn btn-primary">View Categories</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3 ms-3 mt-4" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="../images/author.png" class="img-fluid rounded-start mt-2 ms-1" alt="book">
                    </div>
                    <div class="col-md-8">
                        <div class="card-header">
                            <h3 class="fs-2"><strong>Authors</strong></h3>
                        </div>
                        <div class="card-body">
                            <p>Available authors : <?php echo get_count('authors'); ?></p>
                            <a href="registered_authors.php" target="blank" class="btn btn-primary">View All Authors</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3 ms-3 mt-4" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="../images/issued-books.png" class="img-fluid rounded-start mt-3" alt="book">
                    </div>
                    <div class="col-md-8">
                        <div class="card-header">
                            <h3 class="fs-2"><strong>Issued Books</strong></h3>
                        </div>
                        <div class="card-body">
                            <p>Total Books Issued : <?php echo get_count('issued_books'); ?></p>
                            <a href="view_issued_books.php" target="blank" class="btn btn-primary">View Issued Books</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>