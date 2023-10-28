<!-- 

Main content of the page -->
<div class="container">
    <?php
    // Include the navigation menu
    include('menu.php');
    ?>

    <div class="content">
        <?php
        // Check if the 'load' parameter is set
        if (isset($_GET['load'])) {
            // Include the selected content based on the 'load' parameter
            if ($_GET['load'] === '1') {
                include('Temperature.php');
            } 
            elseif ($_GET['load'] === '2') {
                include('Calculator.php');
            }
            elseif ($_GET['load'] === '3') {
                include('NumToWords.php');
            }
        } 
        ?>
    </div>
</div>

 <!DOCTYPE html>
<html>
<head>
    
    <title>My Simple Homepage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        nav ul {
            background-color: #333;
            list-style: none;
            padding: 0;
            text-align: center;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        main {
            padding: 20px;
        }

        section {
            background-color: #fff;
            padding: 20px;
            margin: 20px;
            border-radius: 5px;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>SOA Project</h1>
    </header>

    <main>
        <section>
            <h2>About Us</h2>
            <p>This project aims to create a cloud-hosted SOAP (Simple Object Access Protocol) 
                service API using PHP. SOAP is a protocol for exchanging structured information in 
                the implementation of web services. By deploying this service in the cloud, it becomes 
                accessible to clients worldwide, providing a scalable and reliable solution for various </p>
        </section>

        <section>
            <h2>Member details:</h2>
            <p>Registration Numbers:
                RA2011003010113
            </p>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> My Simple Homepage</p>
    </footer>
</body>
</html>
