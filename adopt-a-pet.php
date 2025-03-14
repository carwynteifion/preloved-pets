<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preloved Pets | Adopt A Pet</title>
    <!--Call the server to update css styling-->
    <link rel="stylesheet" href="./assets/style.css?<?php echo time(); ?>">
    <!--Add Google Fonts and favicon-->
    <link
        href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

<body>
    <header>
        <h1><a href="index.html">Preloved Pets</a></h1>
        <!--Hamburger menu for mobile-->
        <input type="checkbox" id="menu-toggle" aria-label="Toggle navigation menu">
        <label for="menu-toggle" class="menu-icon" aria-label="Menu">&#9776;</label>
        <nav id="navbar" aria-label="Main navigation">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="our-work.html">Our Work</a></li>
                <li><a href="adopt-a-pet.php"><strong>Adopt A Pet</strong></a></li>
                <li><a href="campaigns.html">Campaigns</a></li>
                <li><a href="donate.html">Donate</a></li>
                <li><a href="contact-us.html">Contact Us</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div id="hero" aria-labelledby="hero-heading">
            <div class="overlay"></div>
            <h1 id="hero-heading">Adopt A Pet</h1>
            <p>Find your new best friend and give a pet a loving home.</p>
        </div>
        <div class="content">
            <!--Available Pets-->
            <section class="card">
                <div class="card-text">
                    <h2>Available Pets</h2>
                    <p>
                        We have many wonderful pets waiting for their forever homes. Browse
                        through our list of available pets and find the perfect companion
                        for you. Each pet has been vaccinated, spayed or neutered, and is
                        ready to join your family.
                    </p>
                    <!--Table to display available pets-->
                    <?php
                    include("dbinfo.inc.php");
                    $conn = mysqli_connect($servername, $username, $password, $database);

                    // Check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    $sql = "SELECT * FROM pets ORDER BY arrived";
                    $result = $conn->query($sql);
                    ?>
                    <table class="pets desktop" aria-label="Available Pets Table">
                        <thead>
                            <tr>
                                <td><strong>Name</strong></td>
                                <td><strong>Image</strong></td>
                                <td><strong>Description</strong></td>
                                <td><strong>Type</strong></td>
                                <td><strong>Colour</strong></td>
                                <td><strong>Arrived</strong></td>
                                <td><strong>Previous Owners</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $pets = [];
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    $pets[] = $row;
                                    echo "<tr>";
                                    echo "<td>" . $row["name"] . "</td>";
                                    echo "<td>" . $row["image"] . "</td>";
                                    echo "<td>" . $row["description"] . "</td>";
                                    echo "<td>" . $row["type"] . "</td>";
                                    echo "<td>" . $row["colour"] . "</td>";
                                    echo "<td>" . $row["arrived"] . "</td>";
                                    echo "<td>" . $row["owners"] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>No pets available</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <!--Table to display available pets on mobile-->
                    <table class="pets mobile" aria-label="Available Pets Table Mobile">
                        <tbody>
                            <?php
                            if (count($pets) > 0) {
                                foreach ($pets as $row) {
                                    echo "<tr>";
                                    echo "<td><strong>Name:</strong> " . $row["name"] . "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td>" . $row["image"] . "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td><strong>Description:</strong> " . $row["description"] . "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td><strong>Type:</strong> " . $row["type"] . "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td><strong>Colour:</strong> " . $row["colour"] . "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td><strong>Arrived:</strong> " . $row["arrived"] . "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td><strong>Previous Owners:</strong> " . $row["owners"] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td>No pets available</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </main>
    <footer>
        <p>&copy; 2023 Preloved Pets. All rights reserved.</p>
    </footer>
</body>

</html>