<?php 
    namespace Controllers;

    use DAO\UserDAO;
    use Models\User;

    class UserController{

        private $userDAO;

        public function __construct(){
            
            $this->userDAO = new UserDAO();
        }

        public function Login($email, $password){

            $user= $this->userDAO->GetUser($email, $password);
            //var_dump($user);
            //echo "<br> EL email es ---->". $user->getEmail();
            //echo "<br> EL pass  es ---->". $user->getPassword();            

            if($user != null){
                if($user->getEmail() == $email & $user->getPassword() == $password){

                    $_SESSION['user'] = $user;
                    $orderController = new OrderController();
                    $orderController->ShowListView();
                }
            }else{
                echo "<script> alert('El email o la contraseña es incorrecta. Reintete.'); </script>";
                echo "<br>El email o la contraseña es incorrecta. Reintete.<br>";
                header('location: ../Home/Index');
            }             
        }

        public function Logout(){
            $_SESSION['user'] = null;
            unset($_SESSION);
            var_dump($_SESSION);
            session_destroy();
            header('location: ../Home/Index');
        }
    }
?>