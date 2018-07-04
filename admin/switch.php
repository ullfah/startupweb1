<?php
if (!empty($_GET['act'])) {
    switch ($_GET['act']) {
        case 'dashboard':
        if ($_SESSION['id_group'] == 2) {
            include 'home_investor.php';
        } elseif ($_SESSION['id_group'] == 3) {
            include 'home.php';
        } else {
            include 'dashboard.php';
        }
        break;

        case 'create-proposal':
        include 'create_proposal.php';
        break;

        case 'daftar-proposal':
        include 'daftar_proposal.php';
        break;

        default:
        if ($_SESSION['id_group'] == 2) {
            include 'home_investor.php';
        } elseif ($_SESSION['id_group'] == 3) {
            include 'home.php';
        } else {
            include 'dashboard.php';
        }
        break;

    }

} else {
    if ($_SESSION['id_group'] == 2) {
        include 'home_investor.php';
    } elseif ($_SESSION['id_group'] == 3) {
        include 'home.php';
    } else {
        include 'dashboard.php';
    }
}
?>