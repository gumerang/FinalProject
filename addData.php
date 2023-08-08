<?php
session_start();
// Jika tidak bisa login maka balik ke login.php
// jika masuk ke halaman ini melalui url, maka langsung menuju halaman login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

// Memanggil atau membutuhkan file function.php
require 'function.php';

// Jika fungsi tambah lebih dari 0/data tersimpan, maka munculkan alert dibawah
if (isset($_POST['simpan'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('Customer Data added successfully!');
                document.location.href = 'index.php';
            </script>";
    } else {
        // Jika fungsi tambah dari 0/data tidak tersimpan, maka munculkan alert dibawah
        echo "<script>
                alert('Failed to add customer data!');
            </script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Own CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>Add Data | Final Research | CRUD</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
        <div class="container">
            <a class="navbar-brand" href="index.php">Final Research | CRUD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Close Navbar -->

    <!-- Container -->
    <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="fw-bold text-uppercase"><i class="bi bi-person-plus-fill"></i>&nbsp;Add Customer Data</h3>
            </div>
            <hr>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="customer" class="form-label">Customer ID</label>
                        <input type="text" class="form-control w-50" id="customer" placeholder="Input Customer ID" name="customer" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Name</label>
                        <input type="text" class="form-control form-control-md w-50" id="nama" placeholder="Type your name" name="nama" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="credit" class="form-label">Credit Card Number</label>
                        <input type="text" class="form-control w-50" id="credit" placeholder="Input your credit card number" name="credit" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control w-50" id="phone" placeholder="Input your phone number" name="phone" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="company" class="form-label">Company Name</label>
                        <input type="text" class="form-control w-50" id="company" placeholder="Input your company number" name="company" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control w-50" id="country" placeholder="Input your country number" name="country" autocomplete="off" required>
                    </div>
                    <hr>
                    <a href="index.php" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary" name="simpan">Save Data</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Close Container -->



    <!-- Footer -->
    <div class="container-fluid">
        <div class="row bg-dark text-white">
            <div class="col-md-6 my-2">
                <h4 class="fw-bold text-uppercase">About</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae dolore sed porro modi mollitia quaerat? Nam, error fugit sed, maiores illum architecto, officiis voluptate nesciunt voluptatibus aut reprehenderit perspiciatis doloremque!</p>
            </div>
            <div class="col-md-6 my-2">
            <h4 class="fw-bold text-uppercase">Reference</h4>
                <p>PHP</p>
                <p>MYSQL</p>
                <p>HTML/CSS/BOOTSTRAP</p>
            </div>
        </div>
    </div>
    <footer class="bg-dark text-white text-center" style="padding: 5px;">
        <p>Created with <i class="bi bi-suit-heart-fill" style="color: red;"></i> by Dimas Gumerang Ryandika</p>
    </footer>
    <!-- Close Footer -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>