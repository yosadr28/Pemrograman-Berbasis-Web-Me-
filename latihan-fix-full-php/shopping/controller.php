<?php
require_once('data.php');
if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
    if (isset($_POST['_method'])) {
        if ($_POST['_method'] == 'PUT') {
            updateProduct($_POST);
        }
        if ($_POST['_method'] == 'DELETE') {
            deleteProduct($_POST['id']);
        }
    } else {
        addNewProduct($_POST);
    }
    header('Location: index.php');
}
