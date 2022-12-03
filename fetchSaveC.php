<?php
 include 'dchair.php';
 session_start();
 $table = new chair();
 $table->fetchSave();
?>