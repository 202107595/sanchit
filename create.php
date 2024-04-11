<?php
require_once "config.php";

$name = $address = $salary = "";
$name_err = $address_err = $salary_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } else {
        $name = $input_name;
    }

    $input_address = trim($_POST["address"]);
    if (empty($input_address)) {
        $address_err = "Please enter an address.";
    } else {
        $address = $input_address;
    }

    $input_salary = trim($_POST["salary"]);
    if (empty($input_salary)) {
        $salary_err = "Please enter the salary amount.";
    } else {
        $salary = $input_salary;
    }

    if (empty($name_err) && empty($address_err) && empty($salary_err)) {
        $sql = "INSERT INTO employees (name, address, salary) VALUES (?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_address, $param_salary);

            $param_name = $name;
            $param_address = $address;
            $param_salary = $salary;

            if (mysqli_stmt_execute($stmt)) {
                header("location: employees.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Employee Record</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="create.css">

</head>
<body>
    <header>
    </header>

    <section id="main">
        <div class="container">
            <h2>Create New Employee Record</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                    <span class="invalid-feedback"><?php echo $name_err; ?></span>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea id="address" name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>"><?php echo $address; ?></textarea>
                    <span class="invalid-feedback"><?php echo $address_err; ?></span>
                </div>
                <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="text" id="salary" name="salary" class="form-control <?php echo (!empty($salary_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $salary; ?>">
                    <span class="invalid-feedback"><?php echo $salary_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="employees.php" class="btn btn-secondary ml-2">Cancel</a>
                </div>
            </form>
        </div>
    </section>


    <?php
require_once "config.php";

$name = $description = $price = $image_url = "";
$name_err = $description_err = $price_err = $image_url_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        $sql = "INSERT INTO chips (name, description, price, image_url) VALUES (?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssds", $param_name, $param_description, $param_price, $param_image_url);

            $param_name = $name;
            $param_description = $description;
            $param_price = $price;
            $param_image_url = $image_url;

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
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Chip Record</title>
    <link rel="stylesheet" href="create.css">
</head>
<body>
    <section id="main">
        <div class="container">
            <h2>Create New Chip Record</h2>
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
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="inventory.php" class="btn btn-secondary ml-2">Cancel</a>
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

