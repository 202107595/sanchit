<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Chips Inventory</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <nav>
        <!-- Navigation Bar -->
        <ul>
            <li><a href="../home.html">Home</a></li>
            <li><a href="../about.html">About Me</a></li>
            <li><a href="inventory.php">Inventory</a></li>
        </ul>
    </nav>

    <section id="Inventory">
        <h2>Chips Inventory</h2>
        <div class="chip-container">
            <?php
            // Database connection
            require_once "config.php";

            // Fetch chips data
            $query = "SELECT * FROM chips";
            $result = mysqli_query($link, $query);

            // Display chips
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="chip">';
                    echo '<img src="' . $row['image_url'] . '" alt="' . $row['name'] . '">';
                    echo '<h3>' . $row['name'] . '</h3>';
                    echo '<p>' . $row['description'] . '</p>';
                    echo '<p>Price: $' . $row['price'] . '</p>';
                    echo '<p>';
                    echo '<a href="read.php?id=' . $row['id'] . '" title="View Record">View</a>';
                    echo '<a href="update.php?id=' . $row['id'] . '" title="Update Record">Update</a>';
                    echo '<a href="delete.php?id=' . $row['id'] . '" title="Delete Record">Delete</a>';
                    echo '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>No chips available.</p>';
            }
            ?>
        </div>
    </section>

    <section id="contact-info">
        <!-- Contact Information -->
        <h2>Contact Information</h2>
        <p>Feel free to reach out to us:</p>
        <address>
            Email: <a href="mailto:Deliciouslays@gmail.com">Deliciouslays@gmail.com</a>
        </address>
        <p>Phone: <a href="tel:+19655559999">+1 (965)-555-9999</a></p>
    </section>

    <footer>
    <p>&copy; 2024 Sanchit Raina(202105756). All rights reserved.</p>
</footer>
</body>
</html>
<!-- Sanchit Raina(202105756) -->
