<?php
    namespace DAO;

use Models\Order;
use PDOException;

    class OrderDAO{

        private $connection;
        private $tableName = "orders";
        private $orderStatusDAO;

        public function GetAll(){
            try{
                $ordersList = array();
                $query = "select * from $this->tableName;";
                $this->connection = Connection::GetInstance();
                $ordersResults = $this->connection->Execute($query);

                foreach($ordersResults as $row){

                    $order = new Order();
                    $order->setOrderId($row['orderId']);
                    $order->setOrderStatusId($row['orderStatusId']);
                    $order->setDescription($row['description']);
                    $order->setPrice($row['price']);
                    
                    array_push($ordersList, $order);
                }
                return $ordersList;
            }
            catch(PDOException $ex){
                throw $ex;
            }
        }

        public function Add($orderId,$orderStatusId,$description, $price){

            $ok = false;
            if($this->CheckOrderExist($orderId) == false){           
                try{
                    $query = "insert into $this->tableName (orderId,orderStatusId,description, price) values (:orderId, :orderStatusId, :description, :price);";
                    $this->connection = Connection::GetInstance();

                    $parameters['orderId'] = $orderId;
                    $parameters['orderStatusId'] = $orderStatusId;
                    $parameters['description'] = $description;
                    $parameters['price'] = $price;

                    $this->connection->ExecuteNonQuery($query, $parameters);
                    $ok = true;
                    
                }catch(PDOException $ex){
                    throw $ex;
                } 
            }
            return $ok;
        }

        public function CheckOrderExist($orderId){

            $exist = false;            
            $ordersList = $this->GetAll();
            
            if($ordersList != null){
                foreach($ordersList as $order){
                    if($order->getOrderId() == $orderId){
                        $exist = true;
                    }
                }
            }
            return $exist;
        }

        public function GetAllPending(){
            try{
                $ordersPendingList = array();
                $query = "select * from $this->tableName;";
                $this->connection = Connection::GetInstance();
                $ordersResults = $this->connection->Execute($query);

                foreach($ordersResults as $row){
                    if($row['orderStatusId'] == 1){
                        $order = new Order();
                        $order->setOrderId($row['orderId']);
                        $order->setOrderStatusId($row['orderStatusId']);
                        $order->setDescription($row['description']);
                        $order->setPrice($row['price']);                        
                        array_push($ordersPendingList, $order);
                    }
                }
                return $ordersPendingList;
            }
            catch(PDOException $ex){
                throw $ex;
            }
        }

        public function Delete($orderId){

            try{
                $query = "delete from $this->tableName where (orderId = :orderId);";
                $parameters['orderId'] = $orderId;
                $this->connection = Connection::GetInstance();                
                $this->connection->ExecuteNonQuery($query, $parameters);
            }catch(PDOException $ex){
                throw $ex;
            }
        }
    }
?>