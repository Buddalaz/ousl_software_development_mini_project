<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css"> 
    <script src="https://kit.fontawesome.com/0996a09043.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="profile">
                <img src="https://1.bp.blogspot.com/-vhmWFWO2r8U/YLjr2A57toI/AAAAAAAACO4/0GBonlEZPmAiQW4uvkCTm5LvlJVd_-l_wCNcBGAsYHQ/s16000/team-1-2.jpg"
                    alt="profile_picture">
                <h3>Anamika Roy</h3>
                <p>Welcome Admin</p>
            </div>
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-desktop"></i></span>
                        <span class="item">My Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="customers.php">
                        <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="item">Customers</span>
                    </a>
                </li>
                <li>
                    <a href="bookings.php">
                        <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
                        <span class="item">Bookings</span>
                    </a>
                </li>
                <li>
                    <a href="admins.php">
                        <span class="icon"><i class="fas fa-user-shield"></i></span>
                        <span class="item">Admin</span>
                    </a>
                </li>
                <li>
                    <a href="contacts.php">
                        <span class="icon"><i class="fas fa-user-shield"></i></span>
                        <span class="item">Contact</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span class="icon"><i class="fas fa-cog"></i></span>
                        <span class="item">logOut</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="section">
            <div class="top_navbar">
                <div class="hamburger">
                    <a href="#">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
            </div>
            <div class="container">
                <h1>defult content</h1>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get all the navigation links
        var navLinks = document.querySelectorAll('ul li a');

        // Attach a click event handler to each link
        navLinks.forEach(function (link) {
            link.addEventListener('click', function (e) {
                e.preventDefault(); // Prevent the default link behavior

                // Get the URL of the content to load
                var contentURL = this.getAttribute('href');

                // Create a new XMLHttpRequest object
                var xhr = new XMLHttpRequest();

                // Set up the request
                xhr.open('GET', contentURL, true);

                // Define a callback function to handle the response
                xhr.onload = function () {
                    if (xhr.status >= 200 && xhr.status < 300) {
                        // Insert the fetched content into the "container" div
                        document.querySelector('.container').innerHTML = xhr.responseText;
                    } else {
                        alert('Failed to load content.');
                    }
                };

                // Send the request
                xhr.send();
            });
        });
    });
</script>
</body>
<script src="../assets/js/testfile.js"></script>
</html>