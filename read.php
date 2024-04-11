<?php
require_once "config.php";

$id = $_GET["id"] ?? null;

if (!isset($id) || empty($id)) {
    header("location: error.php");
    exit();
}

$sql = "SELECT * FROM chips WHERE id = ?";
if ($stmt = mysqli_prepare($link, $sql)) {
    mysqli_stmt_bind_param($stmt, "i", $param_id);
    $param_id = $id;
    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $name = $row["name"];
            $description = $row["description"];
            $price = $row["price"];
            $image_url = $row["image_url"];
        } else {
            header("location: error.php");
            exit();
        }
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
}
mysqli_stmt_close($stmt);
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Chip Record</title>
    <link rel="stylesheet" href="create.css">
</head>
<body>
    <section id="main">
        <div class="container">
            <h2>View Chip Record</h2>
            <div class="record">
                <div class="field">
                    <label>Name:</label>
                    <span><?php echo $name; ?></span>
                </div>
                <div class="field">
                    <label>Description:</label>
                    <span><?php echo $description; ?></span>
                </div>
                <div class="field">
                    <label>Price:</label>
                    <span><?php echo $price; ?></span>
                </div>
                <div class="field">
                    <label>Image:</label><br>
                    <img src="<?php echo $image_url; ?>" alt="<?php echo $name; ?>">
                </div>
            </div>
            <a href="inventory.php" class="btn btn-primary">Back</a>
        </div>
    </section>

    <footer>
    <p>&copy; 2024 Sanchit Raina(202105756). All rights reserved.</p>
</footer>
</body>
</html>
<!-- Sanchit Raina(202105756) -->
