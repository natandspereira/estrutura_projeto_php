<?php
spl_autoload_register(function ($className) {
    $file = 'classes/' . $className . '.class.php';
    
    if (file_exists($file)) {
        include $file;
    } else {
        throw new Exception("Arquivo para a classe $className não encontrado em $file");
    }
});
?>
