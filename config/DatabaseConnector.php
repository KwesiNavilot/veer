<?php

    /**
     * This class handles all the connections and communications between the server 
     * and the database. It uses the server name, username, password and database that the app
     * wants to connect to.
     */

    class DatabaseConnector {
        private $serverName;
        private $userName;
        private $password;
        private $databaseName;
        public $connection;
        private $connected;
        private $dataSourceName;
        
        public function createConnection($userType) {
            try {
                $this->serverName = "localhost";  //Default server name is 'localhost', change it if necessary.
                $this->databaseName = "dwadipa";
                $this->userName = $userType;

                switch ($userType) {
                    case 'public':
                    $this->password = "00001234";
                    break;

                    case 'client':
                    $this->password = "clients@Naviware.0705";
                    break;

                    case 'admin':
                    $this->password = "el~admin@Naviware.0420";
                    break;
                    
                    default:
                    $this->userName = "navilot";
                    $this->password = "sltd";
                    break;
                }
                
                //MySQLi Connection
                $this->connection  = new mysqli($this->serverName, $this->userName, $this->password, $this->databaseName);
                $this->connection  = new mysqli("localhost", "navilot", "sltd", "dwadipa");
                $this->connected = true;

                //PDO Connection
                // $this->dataSourceName = "mysql:host=".$this->serverName.";dbname=".$this->databaseName.";";
                // $this->connection = new PDO($this->dataSourceName, $this->userName, $this->password);
                // $this->connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // $this->connected = true;
            } catch (Exception $e){
                die("Error in creating connection: " . mysqli_connect_error() . mysql_errno);
                //die("Error in creating connection: " . $e->getMessage());
            }
        }

        public function checkConnection() {
            if ($this->connected) {
                return true;
            }else {
                return false;
            }
        }

        public function getConnection() {
            return $this -> connection;
        }

        public function closeConnection() {
            try {
                unset($this->connected);
                $connection->close();  
            } catch (Exception $error) {
                die("Error in creating connection: " . mysqli_connect_error() . mysql_errno);
            }
        }

        public function setServerName($newServerName) {
            $this -> serverName = $newServerName;
        }

        public function setUserName($newUserName) {
            $this ->  userName = $newUserName;
        }

        public function setPassword($newPassword) {
            $this -> serverName = $newPassword;
        }

        public function getServerName() {
            return $this -> serverName;
        }

        public function getUserName() {
            return $this -> userName;
        }

        public function getPassword() {
            return $this -> password;
        }
    }
?>