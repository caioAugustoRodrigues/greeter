<?php 
    function validateSession() {
        if ( !isset($_SESSION['user']) ) {
            header('Location: index.php?error=1');
        }
    }
?> 