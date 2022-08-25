<?php
if (isset($_POST['btnRegister'])) {
    // Instantiated  the registerConfig
    require_once('register.config.php');
    $regConfig = new registerConfig();
    $regConfig->setName($_POST['name']);
    $regConfig->setEmail($_POST['email']);
    $regConfig->setPassword($_POST['password']);
    $regConfig->insertData();
}
