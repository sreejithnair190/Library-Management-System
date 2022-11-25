<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Mangement System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="../index.php" class="navbar-brand">Library Management System</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a href="./admin.php" class="nav-link">Admin</a>
                </li>
                <li class="nav-item">
                    <a href="../index.php" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                    <a href="../register.php" class="nav-link">Register</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="row">
        <div class="col-md-4 side-bar">
            <h5>Library Timing</h5>
            <ul>
                <li>Opening Time : 8:00 AM</li>
                <li>Closing time : 6:00 PM</li>
                <li>Sunday Off</li>
            </ul>

            <h5>What we provide</h5>
            <ul>
                <li>Full Furniture</li>
                <li>Free Wifi</li>
                <li>News Papers</li>
                <li>Discussion Room</li>
                <li>Peaceful Environment</li>
            </ul>
        </div>
        <div class="col-md-8 main-content">
            <center>
                <h3>Admin Login</h3>
            </center>
            <form action="admin.php" method="post">
                <div class="form-group top">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" required>
                </div>

                <div class="form-group top">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <button type="submit" name="admin_login" class="btn btn-primary top">Login</button>
            </form>
        </div>
    </div>
    <?php
    error_reporting(E_ERROR | E_PARSE);
    session_start();
    if (isset($_POST['admin_login'])) {
        $connection = mysqli_connect("localhost", "root", "","lms");
        // $db = mysqli_select_db($connection, "lms");
        $query = "select * from admins where email = '$_POST[email]'";
        $query_run = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($query_run)) {
            if ($row['email'] == $_POST['email']) {
                if ($row['password'] == $_POST['password']) {
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['id'] = $row['id'];
                    header("Location:admin_dashboard.php");
                } else {
                    echo '<br><br><center><span class="badge bg-danger fs-5">Invalid Password</span></center>';
                }
            } else {
                echo '<br><br><center><span class="badge bg-danger fs-5">Invalid Email</span></center>';
            }
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>