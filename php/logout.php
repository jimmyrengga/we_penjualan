<?php

    session_start();
    
    unset($_SESSION['user']);
    
    $_SESSION['rc'] = 'sukses';
    header('Location: index.php');

?>