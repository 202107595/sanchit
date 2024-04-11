<?php
require_once "config.php";

$name = $description = $price = $image_url = "";
$name_err = $description_err = $price_err = $image_url_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } else {
        $name = $input_name;
    }

    $input_description = trim($_POST["description"]);
    if (empty($input_description)) {
        $description_err = "Please enter a description.";
    } else {
        $description = $input_description;
    }

    $input_price = trim($_POST["price"]);
    if (empty($input_price)) {
        $price_err = "Please enter the price.";
    } else {
        $price = $input_price;
    }

    $input_image_url = trim($_POST["image_url"]);
    if (empty($input_image_url)) {
        $image_url_err = "Please enter the image URL.";
    } else {
        $image_url = $input_image_url;
    }

    if (empty($name_err) && empty($description_err) && empty($price_err) && empty($image_url_err)) {
        $sql = "UPDATE chips SET name=?, description=?, price=?, image_url=? WHERE id=?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssdsi", $param_name, $param_description, $param_price, $param_image_url, $param_id);

            $param_name = $name;
            $param_description = $description;
            $param_price = $price;
            $param_image_url = $image_url;
            $param_id = $id;

            if (mysqli_stmt_execute($stmt)) {
                header("location: inventory.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
} else {
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
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Chip Record</title>
    <link rel="stylesheet" href="create.css">
</head>
<body>
    <section id="main">
        <div class="container">
            <h2>Update Chip Record</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                    <span class="invalid-feedback"><?php echo $name_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control <?php echo (!empty($description_err)) ? 'is-invalid' : ''; ?>"><?php echo $description; ?></textarea>
                    <span class="invalid-feedback"><?php echo $description_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control <?php echo (!empty($price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $price; ?>">
                    <span class="invalid-feedback"><?php echo $price_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Image URL</label>
                    <input type="text" name="image_url" class="form-control <?php echo (!empty($image_url_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $image_url; ?>">
                    <span class="invalid-feedback"><?php echo $image_url_err; ?></span>
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a href="inventory.php" class="btn btn-secondary ml-2">Cancel</a>
            </form>
        </div>
    </section>

    <footer>
    <p>&copy; 2024 Sanchit Raina(202105756). All rights reserved.</p>
</footer>
</body>
</html>
<!-- Sanchit Raina(202105756) -->

