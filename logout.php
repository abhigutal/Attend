<?php
session_start();

// Destroy all sessions
session_unset();
session_destroy();

// Redirect to home page
header('Location: ../index.php');
exit();
?>
