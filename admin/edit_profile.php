<?php 
    error_reporting(E_ERROR | E_PARSE);
    session_start();
    
    $connection = mysqli_connect("localhost", "root", "","lms");
    $query = "select * from admins where email = '$_SESSION[email]'";
    $query_run = mysqli_query($connection, $query);

    $name = "";
    $email = "";
    $mobile = "";
    $address = "";

    while ($row = mysqli_fetch_assoc($query_run)) {
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $address = $row['address'];
    }
?>

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
                <a href="admin_dashboard.php" class="navbar-brand">Library Management System</a>
            </div>
            <span><strong class="text-white">Welcome <?php  echo $_SESSION["name"]; ?>!</strong></span>
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
    <div class="row">
    <div class="col-md-4"></div>
		<div class="col-md-4">
			<form action="update.php" method="post">
				<div class="form-group top">
					<label>Name:</label>
					<input type="text" class="form-control" value="<?php echo $name;?> " name="name">
				</div>
				<div class="form-group top">
					<label>Email:</label>
					<input type="text" class="form-control" value="<?php echo $email;?>"name="email">
				</div>
				<div class="form-group top">
					<label>Mobile:</label>
					<input type="text" class="form-control" value="<?php echo $mobile;?>" name="mobile">
				</div>
				<div class="form-group top">
					<label>Address:</label>
					<textarea rows="3" cols="40" class="form-control" name="address"><?php echo $address;?></textarea>
				</div>
                <center><button type="submit" class="btn btn-success top" name="update">Update</button></center>
			</form>
		</div>
		<div class="col-md-4"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>