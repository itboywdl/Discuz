<?php
//退出  清cookie值
setcookie('uid', '', time()-1);
setcookie('pic', '', time()-1);
echo '<script>alert("恭喜您退出成功,欢迎下次再来！");window.location.href="login.html";</script>';


?>