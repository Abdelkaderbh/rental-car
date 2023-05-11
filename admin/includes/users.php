<?php
        $host='localhost';
        $db='location_voiture';
        $login='root';
        $mdp='';
        try {    
        $pdo=new PDO("mysql:host=$host;dbname=$db",$login,$mdp);
        } catch (PDOException $e) {
            echo "erreur".$e->getMessage(); 
        }




function login_user($pdo){
        $sql ="SELECT * FROM users WHERE username =:username and password=:password";
        try {
        $stmt = $pdo->prepare($sql);
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            session_start();
            $_SESSION['user_id'] = $user['Id_user'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email_usr'];
            $_SESSION['type'] = $user['Type_usr'];
            // redirect to dashboard
            echo 'success';
            header("Location:dashboard.php");
            exit();
        } else {
            echo '<div class="alert alert-danger" role="alert" id="message">
            Mot de passe ou  identifiant incorrect !
                  </div>';
        } 
            } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
    }
}
?>