<?php

include('../includes/config.php');

if(isset($_POST['add_cake'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = $_POST['price'];
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../uploads/'.$image;

    $insert_query = mysqli_query($conn, "INSERT INTO cakes (name, price, category, description, image) 
        VALUES('$name', '$price', '$category', '$description', '$image')") or die('query failed');

    if($insert_query){
        move_uploaded_file($image_tmp_name, $image_folder);
        $message[] = 'Cake added successfully!';
    }else{
        $message[] = 'Could not add the cake!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Cake</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="main-content">
        <div class="container">
            <h2>Add New Cake</h2>
            
            <?php
            if(isset($message)){
                foreach($message as $message){
                    echo '<div class="alert alert-success">'.$message.'</div>';
                }
            }
            ?>

            <div class="card">
                <div class="card-header bg-light">
                    <h4 class="mb-0">Cake Details</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Cake Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter cake name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Price per kg (₹)</label>
                                    <input type="number" name="price" class="form-control" placeholder="0.00" step="0.01" required>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Category</label>
                                    <select name="category" class="form-control" required>
                                        <option value="">Select Category</option>
                                        <option value="Cakes">Cakes</option>
                                        <option value="Pastries">Pastries</option>
                                        <option value="Layer Cake">Layer Cake</option>
                                        <option value="Cupcake">Cupcake</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Cake Image</label>
                                    <input type="file" name="image" class="form-control" accept="image/jpg, image/jpeg, image/png" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="description" class="form-control" rows="4" placeholder="Enter cake description" required></textarea>
                        </div>

                        <div class="text-end">
                            <button type="reset" class="btn btn-light me-2">Reset</button>
                            <button type="submit" name="add_cake" class="btn btn-primary px-4">Add Cake</button>
                        </div>
                    </form>
                </div>
            </div>

            <style>
                .card {
                    border: 1px solid #fbb9b9;
                    border-radius: 10px;
                }
                .card-header {
                    border-bottom: 1px solid #fbb9b9;
                }
                .form-label {
                    color: #666;
                }
                .form-control {
                    border: 1px solid #ddd;
                    padding: 10px 15px;
                }
                .form-control:focus {
                    border-color: #fbb9b9;
                    box-shadow: 0 0 0 0.25rem rgba(251, 185, 185, 0.25);
                }
                .btn-light {
                    border: 1px solid #ddd;
                }
            </style>
        </div>
    </div>

    <style>
        .main-content {
            margin-left: 30px;
            padding: 80px;
        }
        .card {
            border: none;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .btn-primary {
            background-color: #fbb9b9;
            border-color: #fbb9b9;
            color: #000;
        }
        .btn-primary:hover {
            background-color: #f99b9b;
            border-color: #f99b9b;
            color: #000;
        }
        .form-control:focus {
            border-color: #fbb9b9;
            box-shadow: 0 0 0 0.25rem rgba(251, 185, 185, 0.25);
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>