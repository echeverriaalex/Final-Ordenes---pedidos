<?php
    namespace Controllers;

use DAO\OrderDAO;
use DAO\OrderStatusDAO;

    class OrderController{

        private $orderDAO;
        private $orderStatusDAO;

        public function __construct(){

            $this->orderDAO = new OrderDAO();
            $this->orderStatusDAO = new OrderStatusDAO();
        }

        public function ShowListView(){

            if($_SESSION){
                $orderStatusList = $this->orderStatusDAO->GetAll();
                $ordersPendingList = $this->orderDAO->GetAllPending();
                
                /*echo "<br> Order Stutus --> ";
                var_dump($orderStatusList);
                
                echo "<br><br> Orders --> ";
                var_dump($ordersPendingList);
                */

                /*
                echo ROOT;
                echo "<br><br>";
                echo FRONT_ROOT;
                echo "<br><br>";
                echo VIEWS_PATH;
                echo "<br><br>";
                echo CSS_PATH;
                echo "<br><br>";
                echo JS_PATH;
                echo "<br><br>";
                */
                require_once(VIEWS_PATH."order-pending-list.php");
            }
            else{
                header('location: ../Home/Index');
            }            
        }

        public function ShowAddView(){
            if($_SESSION != null){
                $orderStatusList = $this->orderStatusDAO->GetAll();       
                //var_dump($orderStatusList);     
                require_once(VIEWS_PATH."order-add.php");
            }
            else{
                header('location: ../Home/Index');
            }            
        }

        public function Add($orderId,$orderStatusId,$description, $price){

            $ok = $this->orderDAO->Add($orderId,$orderStatusId,$description, $price);

            if($ok == true)
                echo "<script> alert('Orden registrada con exito'); </script>";
            else
                echo "<script> alert('La orden ya esta registrada, intente con otro codigo.'); </script>";
            $this->ShowAddView();            
        }

        public function Delete($orderId){
            $this->orderDAO->Delete($orderId);
            echo "<script> alert('Orden eliminada con exito'); </script>";
            $this->ShowListView();
        }
    }
?>