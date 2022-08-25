<?php
require_once('register.config.php');
$record = new registerConfig();
if (isset($_GET['uid']) && $_GET['req']) {
    if ($_GET['req'] == "delete") {
        $record->setUid($_GET['uid']);
        $record->delete();
        echo "<script>alert('data successfully deleted'); document.location='allData.php'</script>";
    }
}
