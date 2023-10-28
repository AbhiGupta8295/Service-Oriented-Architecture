<div class="container">
    <?php
    // Include the navigation menu
    include('CalMenu.php');
    ?>

    <div class="content">
        <?php
        // Check if the 'load' parameter is set
        if (isset($_GET['load'])) {
            // Include the selected content based on the 'load' parameter
            if ($_GET['load'] === '6') {
                include('Add.php');
            }
            elseif ($_GET['load'] === '7') {
                include('Subtract.php');
            }
            elseif ($_GET['load'] === '8') {
                include('Multiply.php');
            }
            elseif ($_GET['load'] === '9') {
                include('Divide.php');
            }
        } 
        
        ?>
    </div>
</div>