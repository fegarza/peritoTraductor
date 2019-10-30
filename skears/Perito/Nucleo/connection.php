<?php
    
    
    class Conexion
    {
        public $server = "";
        public $userName = "";
        public $psw = "";
        public $conn;

        function __construct($_server, $_username, $_pw, $_db) {
            $this->conn = new mysqli($_server, $_username, $_pw, $_db);
            if ($this->conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                print("Error de conexion");
            }else{
                $this->server =  $_server;
                $this->userName = $_username;
                $this->psw = $_pw;
            }  
        }
        public function MostrarValores() {
            echo $this->server;
            echo $this->userName;
            echo $this->psw;
        }

        public function InsertarMail($_email, $_phone, $_content, $_asunto){
            $sql = "INSERT INTO Mails (Email, Phone, Content, Date, Asunto) VALUES ('".$_email."' , '".$_phone."' , '".$_content."' , '".date("Y-m-d")."' , '".$_asunto."' )";
            $resultado = mysqli_query($this->conn,  $sql); 
            echo  mysqli_error($this->conn) . "\n";
          
            return ($this->MostrarUltimoMailID());
        }
        public function InsertarFile($_type){
            $sql = "INSERT INTO Files (Type, MailID) VALUES ('".$_type."' , ". $this->MostrarUltimoMailID() .")";
            $resultado = mysqli_query($this->conn,  $sql); 
            echo  mysqli_error($this->conn) . "\n";
           
            return($this->MostrarUltimoFileID());
        }

        public function MostrarUltimoMailID(){
            $sql = "SELECT MAX(ID) AS 'ID' FROM Mails ";
            $ret = mysqli_query($this->conn,  $sql);
            $fila = mysqli_fetch_assoc($ret);
            return ($fila["ID"]); 
        }
        public function MostrarUltimoFileID(){
            $sql = "SELECT MAX(ID) AS 'ID' FROM Files ";
            $ret = mysqli_query($this->conn,  $sql);
            $fila = mysqli_fetch_assoc($ret);
            return ($fila["ID"]); 
        }
        public function BuscarUsuario($_email, $_pw){
            $sql = "SELECT COUNT(ID) AS 'Cant' FROM Users WHERE Email = '".$_email."' AND Pw = '".$_pw ."'";
            $ret = mysqli_query($this->conn,  $sql);
            $fila = mysqli_fetch_assoc($ret);
            return ($fila["Cant"]); 
        }

        /* 
            MAILS
        */
        public function ContarMails(){
            $sql = "SELECT COUNT(ID) AS 'Count' FROM Mails ";
            $ret = mysqli_query($this->conn,  $sql);
            $fila = mysqli_fetch_assoc($ret);
            return ($fila["Count"]); 
        }
        public function MostrarMails(){
            $sql = "SELECT * FROM Mails ";
            $ret = mysqli_query($this->conn,  $sql);
            $str = "";
            while ($fila = mysqli_fetch_array($ret)){
                $str.= "  <div class='mail'>";
                $str.= "<h5>".$fila["Asunto"]."</h5>";
                $str.= "<h5>".$fila["Email"]."</h5>";
                $str.= "<h5>".$fila["Phone"]."</h5>";
                $str.= "<h5>".$fila["Date"]."</h5>";
                $str.= "<p>".$fila["Content"]."</p>";
                $sql = "SELECT * FROM Files WHERE MailID = " .  $fila["ID"];
                $res = mysqli_query($this->conn,  $sql);
                $fila2 = mysqli_fetch_assoc($res);
                if(!empty($fila2["ID"])){
                    $str.= "<a href='./files/".$fila2["ID"].".".$fila2["Type"]."' target='_blank'>Ver archio</a>";
                }
                $str.= "</div>";
            } 
            return($str);
        }
        public function BorrarMail($_ID){
            try {
                $sql = "SELECT * FROM Files WHERE MailID = " .  $_ID;
                $res = mysqli_query($this->conn,  $sql);
                $fila = mysqli_fetch_assoc($res);
                if(!empty($fila["ID"])){
                    unlink("files/".$fila["ID"].".".$fila["Type"]);
                    $sql2 = "DELETE FROM Files WHERE MailID = ". $_ID;
                    $res2 = mysqli_query($this->conn,  $sql2);
                    echo  mysqli_error($this->conn) . "\n";
                } 
                $sql3 = "DELETE FROM Mails WHERE ID = ". $_ID;
                $resultado3 = mysqli_query($this->conn,  $sql3); 
                echo  mysqli_error($this->conn) . "\n";
                return true;
            } catch (Exception $e) {
                return false;
            }


           
            
        }

        /*
            PAGINATOR        
        */
        public function ContarPaginas($_cMostrar){
            $sql = "SELECT CEIL(COUNT(ID)/".strval($_cMostrar).") AS 'Paginas' FROM Mails";
            $ret = mysqli_query($this->conn,  $sql);
            $fila = mysqli_fetch_assoc($ret);
            return ($fila["Paginas"]); 
        }
        public function MostrarMailsPorPagina($_pag, $_cMostrar){
            $cMostrar = $_cMostrar;
            $ID =  $this->ContarMails() - ($cMostrar * $_pag);
            $sql = "SELECT * FROM (SELECT * FROM Mails ". "WHERE ID > " . $ID . " LIMIT ". strval($cMostrar) . ") AS t ORDER BY -ID" ;
            
            $ret = mysqli_query($this->conn,  $sql);
            $str = "";
            while ($fila = mysqli_fetch_array($ret)){
                $str.= "  <div class='mail'>";
                $str.= "<h5>".htmlentities($fila["Asunto"])."</h5>";
                $str.= "<h5>".htmlentities($fila["Email"])."</h5>";
                $str.= "<h5>".htmlentities($fila["Phone"])."</h5>";
                $str.= "<h5>".htmlentities($fila["Date"])."</h5>";
                $str.= "<p>".htmlentities($fila["Content"])."</p>";
                $sql = "SELECT * FROM Files WHERE MailID = " .  $fila["ID"];
                $res = mysqli_query($this->conn,  $sql);
                $fila2 = mysqli_fetch_assoc($res);
                if(!empty($fila2["ID"])){
                    $str.= "<a href='./files/".$fila2["ID"].".".$fila2["Type"]."' target='_blank'>VER ARCHIVO</a>";
                }
                $str.= "<form method='POST' action='/hk.php'>";
                $str.= "<input type='text' name='eliminar' value='".$fila["ID"]."' style='display:none;'/>";
                $str.= "<input class='btn' type='submit' value='ELIMINAR'/>";
                $str.= "</form>";
                $str.= "</div>";
            } 
            return($str);
        }
        
       
    }


?>