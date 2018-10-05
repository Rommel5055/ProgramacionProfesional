<?php
class usuario{
	public $conn;
	public $id;
	public $user;//usuario
	public $pass;//contraseña
	public $mail;//email
	public $address; //direccion
	public function connect(){//conectar base de datos
		$this->conn = mysqli_connect("localhost","root","","project");
		if(mysqli_connect_errno()){
			echo "Error :". mysqli_connect_error();
		}
	}
	public function Create_User(){
		$this->connect();
		$stmt = $this->conn->prepare("INSERT INTO user
		(username, password, email, address) values (?,?,?,?)");
		$stmt->bind_param($this->user, $this->pass, $this->mail, $this->address);
		$stmt->execute();
		$stmt->close();
	}
	
	public function Update_User(){
		$update= mysqli_query($this->conn, "Update user set
		username = '".$this->user."',
		password = '".$this->pass." ',
		email = '".$this->mail."',
		address = '".$this->address." ',
      	where id = ' ".$this->id." ' ");
	}
	
	public function Delete_User(){
		$delete = mysqli_query($this->conn, "Delete from user
		where id=".$this->id);

	}
	public function log_me_in($mail){
		$query1 = "SELECT id, username, password FROM user WHERE email = '$mail'";
		$this->connect();
		$result = mysqli_query($this->conn, $query1);
		if($row = mysqli_fetch_object($result)){
			$this->id = $row->id;
			$this->user = $row->username;
			$this->pass = $row->password;
		}
		else{
			echo 'Lo sentimos, ud no existe.';
		}
	}
	public function sessionstarter(){
		session_start();
		$this->connect();
		$stmt = $this->conn->prepare("SELECT id, username, company_id FROM user WHERE id=?");
		$stmt->bind_param($_SESSION[id]);
		
		$result = $stmt->execute();
		if ($result == FALSE || $result == ""){
			header("Location:login.php");
			echo ("Por favor, inicie sesion");
		}
		else{
			$row = mysqli_fetch_array($result);
			echo "<h2>Bienvenido, ".$row[1]."</h2>";
			$this->id = $row[0];
			$this->user = $row[1];
			mysqli_free_result($result);
		}
	}
	public function closeconnection(){
		$this->conn->close();
	}
}
?>