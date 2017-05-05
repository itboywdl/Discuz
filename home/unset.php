<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['id']);
unset($_SESSION['pic']);
unset($_SESSION['rtime']);	
echo '<script>alert("退出成功");window.location.href="./index.php"</script>';
exit;