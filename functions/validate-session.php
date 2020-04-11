<?php 
    function validateSession() {
        if ( !isset($_SESSION['user']) ) {
            echo "<script type='text/javascript'> document.location = '../../index.php?error=1'; </script>";
        }
    }
?> 