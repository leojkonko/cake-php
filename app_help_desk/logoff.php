
<?php

session_start();
//remover índices do array -> unset()


//destruir a var de sessão -> session_destroy()

session_destroy();
header('Location: index.php');
?> 