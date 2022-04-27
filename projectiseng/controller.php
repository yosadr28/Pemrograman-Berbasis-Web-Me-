<?php
require_once('matkul.php');
if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
    if (isset($_POST['_method']) == 'PUT') {
        if ($_POST['_method'] == 'PUT') {
            ubahData($_POST);
        }
        if ($_POST['_method'] == 'DELETE') {
            removeData($_POST['kodematkul']);
        }
    } else {
        addData($_POST);
    }
    header('Location: home.php');
}
