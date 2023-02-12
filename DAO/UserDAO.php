<?php
    namespace DAO;

    use PDOException;
    use Models\User;

    class UserDAO{

        private $tableName = "users";
        private $connection;

        public function Add($email = null, $password = null){
            try{
                $query = "insert into $this->tableName (email, password) VALUES (:email, :password);";
                $this->connection = Connection::GetInstance();

                $parameters['email'] = $email;
                $parameters['password'] = $password;

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(PDOException $ex){
                throw $ex;
            }
        }

        public function GetAll(){

            try{
                $userList = array();
                $query = "select * from $this->tableName;";
                $this->connection = Connection::GetInstance();
                $usersResult = $this->connection->Execute($query);

                foreach($usersResult as $row){

                    $user = new User($row['userId'], $row['email'], $row['password']);
                    array_push($userList, $user);
                }
                return $userList;
            }
            catch(PDOException $ex){
                throw $ex;
            }
        }

        public function GetUser($email, $password){

            try{
                $query = "select * from $this->tableName;";
                $this->connection = Connection::GetInstance();
                $usersResult = $this->connection->Execute($query);

                foreach($usersResult as $row){

                    if($email == $row['email'] && $password == $row['password']){

                        $user = new User($row['userId'], $row['email'], $row['password']);
                        return $user;
                    }
                }
            }
            catch(PDOException $ex){
                throw $ex;
            }
            return null;
        }
    }
?>