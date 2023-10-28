<div class="container">
    <?php
    // Include the navigation menu
    include('TempMenu.php');
    ?>

    <div class="content">
        <?php
        // Check if the 'load' parameter is set
            // Include the selected content based on the 'load' parameter
            if ($_GET['load'] === '4') {
                include('CelciusToFarenheit.php');
            }
            elseif ($_GET['load'] === '5'){
                include('FarenheitToCelcius.php');
            }
        
        ?>
    </div>
</div>