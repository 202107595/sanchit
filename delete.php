<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $sql = "DELETE FROM chips WHERE id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = $id;
        if (mysqli_stmt_execute($stmt)) {
            header("location: inventory.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
} else {
    if (!isset($_GET["id"]) || empty(trim($_GET["id"]))) {
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Chip Record</title>
    <link rel="stylesheet" href="create.css">

</head>
<body>
    <section id="main">
        <div class="container">
            <h2>Delete Chip Record</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="alert alert-danger">
                    <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>" />
                    <p>Are you sure you want to delete this chip record?</p>
                    <p>
                        <input type="submit" value="Yes" class="btn btn-danger">
                        <a href="inventory.php" class="btn btn-secondary">No</a>
                    </p>
                </div>
            </form>
        </div>
    </section>


    <footer>
    <p>&copy; 2024 Sanchit Raina(202105756). All rights reserved.</p>
</footer>
</body>
</html>
<!-- Sanchit Raina(202105756) -->
