<?php 
$db_host='';
$db_name='';
$db_user='';
$db_passwd='';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    try{
        $pdo = new PDO("mysqli:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_passwd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $erro){
        echo "Erro ao tentar conectar com o banco de dados" . $erro->getMessage();
    }
}
?>