<?php
class Connect extends PDO{
    public function __construct(){
        parent::__construct("mysql:host=localhost;dbname=cookbook_db", 'root', '',
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $this->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
}
class Controller {
    // Print data to the screen
    // function printData($id){
    //     $db = new Connect;
    //     $user = $db -> prepare('SELECT * FROM users ORDER BY idUsers');
    //     $user -> execute();
    //     $content = '
    //     <table class="table">
    //         <thead class="thead-light">
    //             <tr>
    //             <th scope="col">First Name</th>
    //             <th scope="col">Email</th>
    //             </tr>
    //         </thead>
    //         <tbody>';
    //     while($userInfo = $user -> fetch(PDO::FETCH_ASSOC)){
    //         $content .= '
    //         <tr>
    //             <td>'.$userInfo["uidUsers"].'</td>
    //             <td>'.$userInfo["emailUsers"].'</td>
    //         </tr>
    //         ';
    //     }
    //     $content .= '</tbody></table>
    //     ';
    //     return $content;
    // }
    // check if user is logged in
    function checkUserStatus($idUsers, $sess){
        $db = new Connect;
        $user = $db -> prepare("SELECT idUsers FROM users WHERE idUsers=:idUsers AND session=:session");
        $user -> execute([
            ':idUsers'       => intval($idUsers),
            ':session'  => $sess
        ]);
        $userInfo = $user -> fetch(PDO::FETCH_ASSOC);
        if(!$userInfo["idUsers"]){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    // function for generating password and login session
    function generateCode($length){
		$chars = "vwxyzABCD02789";
		$code = ""; 
		$clen = strlen($chars) - 1;
		while (strlen($code) < $length){ 
			$code .= $chars[mt_rand(0,$clen)];
		}
		return $code;
    }
    
    function insertData($data){
        $db = new Connect;
        $checkUser = $db -> prepare("SELECT * FROM users WHERE emailUsers=:emailUsers");
        $checkUser -> execute(array(
            'emailUsers' => $data['email']
        ));
        $info = $checkUser -> fetch(PDO::FETCH_ASSOC);
        
        if(!$info["idUsers"]){
            $session = $this -> generateCode(10);
            $insertNewUser = $db -> prepare("INSERT INTO users (uidUsers, emailUsers, pwdUsers, session) VALUES (:idUsers, :emailUsers, :pwdUsers, :session)");
            $insertNewUser -> execute([
                ':idUsers'   => $data["givenName"],
                //':l_name'   => $data["familyName"],
                //':avatar'   => $data["avatar"],
                ':emailUsers'    => $data["email"],
                ':pwdUsers' => $this -> generateCode(5),
                ':session'  => $session
            ]);
            if($insertNewUser){
                setcookie("idUsers", $db->lastInsertId(), time()+60*60*24*30, "/", NULL);
                setcookie("sess", $session, time()+60*60*24*30, "/", NULL);
                header('Location: index.php');
                exit();
            }else{
                return "Error inserting user!";
            }
        }else{
            setcookie("idUsers", $info['idUsers'], time()+60*60*24*30, "/", NULL);
            setcookie("sess", $info["session"], time()+60*60*24*30, "/", NULL);
            header('Location: index.php');
            exit();
        }
    }
}
?>