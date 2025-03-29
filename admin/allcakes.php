<?php
include('../includes/config.php');

// Delete cake
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete_query = mysqli_query($conn, "DELETE FROM cakes WHERE id = $id");
    if($delete_query){
        $message[] = 'Cake deleted successfully!';
    }else{
        $message[] = 'Could not delete the cake.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Cakes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="main-content">
        <div class="container">
            <h2>All Cakes</h2>
            
            <?php
            if(isset($message)){
                foreach($message as $message){
                    echo '<div class="alert alert-success">'.$message.'</div>';
                }
            }
            ?>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price per kg</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $select_cakes = mysqli_query($conn, "SELECT * FROM cakes");
                                if(mysqli_num_rows($select_cakes) > 0){
                                    while($row = mysqli_fetch_assoc($select_cakes)){
                                ?>
                                <tr>
                                    <td><img src="../uploads/<?php echo $row['image']; ?>" height="100"></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td>₹<?php echo $row['price']; ?></td>
                                    <td><?php echo $row['category']; ?></td>
                                    <td><?php echo $row['description']; ?></td>
                                    <td>
                                        <a href="update_cake.php?edit=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Update</a>
                                        <a href="allcakes.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this cake?')">Delete</a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                }else{
                                    echo '<tr><td colspan="6" class="text-center">No cakes found</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .main-content {
            margin-left: 30px;
            padding: 80px;
        }
        .card {
            border: 1px solid #fbb9b9;
            border-radius: 10px;
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
        .btn-danger {
            background-color: #ff9999;
            border-color: #ff9999;
            color: #000;
        }
        .btn-danger:hover {
            background-color: #ff8080;
            border-color: #ff8080;
            color: #000;
        }
        .table img {
            border-radius: 5px;
            object-fit: cover;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>