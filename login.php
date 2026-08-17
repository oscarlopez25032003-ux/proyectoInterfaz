<?php 
    $host= 'localhost';
    $db= 'disenoInterfaz';
    $user= 'root';
    $pass= '';

    try{
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8",$user,$pass);
        $email=$_POST['email'];
        $password=$_POST['password'];
        $stmt= $pdo->prepare("select * from usuarios where email = ? and password = ?");
        $stmt->execute([$email,$password]);
        $usuario= $stmt->fetch();
        if($usuario){
            echo"<h1>Binevenido, ".$usuario['nombre']." ".$usuario['apat']. "</h1>";
            echo"<a href='index.html'>Cerrar sesion</a>";

        } else{
            echo "<h1>email o contraseña inconrectos </h1>";
            echo"<a href='index.html'>Cerrar sesion</a>";

        }
    } catch(PDOException $e) {
        echo "error de conexion: ".$e->getMessage();
    }
?>