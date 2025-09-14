<?php
    session_start();

    $_SESSION = array(); // Tömmer sessionsarrayen    
    session_destroy();
    session_regenerate_id(true); // Förhindrar session fixation
    
    header("Location: ../index.php");