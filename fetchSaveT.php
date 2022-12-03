<?php
 include 'dtable.php';
 session_start();
 $table = new dtable();
 $table->fetchSave();
?>