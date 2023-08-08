<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();
// Delete session and logout

header('location: index.php');
    // redirect to index.php