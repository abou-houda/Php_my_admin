<?php
session_start();

if ($_SESSION['mode'] == 'dark'){
    $_SESSION['mode'] = 'light';
}
else{
    $_SESSION['mode'] = 'dark';
}
?>
<script>
    window.location = '../index.php';
</script>
