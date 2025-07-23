<?php 
// FUNÇÃO PARA CRIAR DIRETÓRIOS
function create_directory($directory){
    if(!is_dir($directory)){
        if(mkdir($directory, 0777, true)){
            echo "Diretório '$directory' criado com sucesso!" . PHP_EOL;
        }else{
            echo "Erro ao tentar criar o diretório '$directory'" . PHP_EOL;
        }
    }else{ 
        echo 'Diretório já está criado.' . PHP_EOL;
    }
}

$paths = array(
        'src',
        'src/assets',
        'src/assets/css',
        'src/assets/img',
        'src/data',
        'src/pages',
        'src/scripts',
        'src/classes'
    );

foreach($paths as $path){
    create_directory($path);
}

//ARQUIVO QUE SERÃO CRIADOS NOS DIRETÓRIOS
$cssContent = 
<<<CSS
*{ 
margin:0;
padding:0; 
box-sizing:border-box;
}
CSS;
$dbConfigContent = 
<<<DBCONFIG
<?php 
\$db_host='';
\$db_name='';
\$db_user='';
\$db_passwd='';

if(\$_SERVER['REQUEST_METHOD'] === 'POST'){
    try{
        \$pdo = new PDO("mysqli:host=\$db_host;dbname=\$db_name;charset=utf8", \$db_user, \$db_passwd);
        \$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOException \$erro){
        echo "Erro ao tentar conectar com o banco de dados" . \$erro->getMessage();
    }
}
?>
DBCONFIG;
$autoloadContenT = 
<<<AUTOLOAD
<?php
spl_autoload_register(function (\$className) {
    \$file = 'classes/' . \$className . '.class.php';
    
    if (file_exists(\$file)) {
        include \$file;
    } else {
        throw new Exception("Arquivo para a classe \$className não encontrado em \$file");
    }
});
?>

AUTOLOAD;
$files = array(
 'src/assets/css/Index.css' => "$cssContent",
 'src/data/DB_Config.php' => "$dbConfigContent",
 'src/classes/Autoload.php' => "$autoloadContenT"
);

foreach($files as $file => $content){
    if(!file_exists($file)){
        if(file_put_contents($file, $content) !== false){
            echo "Arquivo '$file' criado com sucesso!" . PHP_EOL;
        }else{
            echo "Erro ao tentar criar '$file'" . PHP_EOL;
        }
    }else{
        echo "Arquivo {$file} já foi criado." . PHP_EOL;
    }        
    
}

//ARQUIVOS QUE SERÃO CRIADOS NA RAIZ DO PROJETO
$indexContent = 
<<<HTML
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- LINK CSS  -->
    <link rel="stylesheet" href="./src/assets/css/Index.css"> 
    </head>
    <body>
            
    </body>
</html>
HTML;

$envContent = 
<<<ENV
#CONFIG DATABASE
DB_HOST=
DB_NAME=
DB_USER=
DB_PASSWD=
DB_PORT=

#SECRET KEY
API_KEY=
JWT_KEY=
ENV;

$gitignoreContent = 
<<<GITIGNORE
/node_modules/
/vendor/
.env
*.log
*.tmp
*.cache
GITIGNORE;
$files = array(
    'index.php' => "$indexContent",
    '.env' => "$envContent",
    '.gitignore' => "$gitignoreContent",

);

foreach($files as $file => $content){
    if(!file_exists($file)){
        if(file_put_contents($file, $content) !== false){
            echo "Arquivo '$file' criado." . PHP_EOL;
        }else{
            echo "Erro ao tentar criar o arquivo '$file' " . PHP_EOL;
        }
    }else{
        echo "Arquivo '$file' já está criado!" . PHP_EOL;
    }
}
        