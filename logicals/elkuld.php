<?php
$subject_ok= true;
$email_ok= true;
$message_ok= true;


if(!isset($_POST['subject']) || strlen($_POST['subject']) < 5)
	{
        $uzenet="A tárgy hibás próbálja újra!";
        $subject_ok= false;
	}

	$re = '/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/';
	if(!isset($_POST['email']) || !preg_match($re,$_POST['email']))
	{
        $uzenet="Az e-mail hibás próbálja újra!";
        $email_ok = false;
	}

	if(!isset($_POST['message']) || empty($_POST['message']))
	{
        $uzenet="Az üzenet mező hibás próbálja újra!";
        $message_ok = false;
	}

if (isset($_POST['email'])&&isset($_POST['subject'])&&isset($_POST['message'])) {
        $email = $_POST['email'] ;
        $subject = $_POST['subject'] ;
        $message = $_POST['message'] ;

if (isset($_SESSION['login'])) {
        $user = $_SESSION['login'];
} else {
        $user = "Vendég";
}


if ($email_ok==true&&$message_ok==true&&$subject_ok==true) {

                try {
        
        $dbh = new PDO('mysql:host=localhost;dbname=beadando1234', 'beadando1234', 'beadando1234',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        
            $sqlInsert = "insert into uzenet(email, subject, message, user)
                          values(:email, :subject, :message, :user)";
            $stmt = $dbh->prepare($sqlInsert); 
            $stmt->execute(array(':email' => $_POST['email'], ':subject' => $_POST['subject'],
                                 ':message' => $_POST['message'],':user' => $user)); 
            if($count = $stmt->rowCount()) {
                $newid = $dbh->lastInsertId();
                
                $uzenet = "Az üzenet elküldése sikerült.";                 
                $ujra = false;

                }
            
            else{
                $uzenet="Az üzenetet nem sikerült elküldeni";
                $ujra = true;
            }
    }
    catch (PDOException $e) {
        $uzenet = "Hiba: ".$e->getMessage();
        $ujra = true;
    }  
}else {
    $uzenet="Az üzenetet nem sikerült elküldeni";
                $ujra = true;
}
    

}else{
           header("Location:/index.php?oldal=kapcsolat");
}
?>