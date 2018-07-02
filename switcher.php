<?php
if (!empty($_GET['page'])) {

    switch ($_GET['page']) {
        case 'register':
        include 'register.php';
            break;
        
        default:
            include 'home.php';
            break;
    }

} else {
    include 'home.php';
}
?>