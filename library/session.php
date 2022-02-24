<?php
session_start();

if(time() > $_SESSION['expire'])

    {

        session_destroy();
        header("Location: ../login.php?error=Session timeout please login again.");
    }

?>