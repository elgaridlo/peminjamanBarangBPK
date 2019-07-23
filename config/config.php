<?php
/**
* @author COWEL
* configuration mysqli
*/
class config
{
	
	public function __construct()
	{
		$host = "localhost";
		$user = "root";
		$pass = "";
		$db   = "bpkjateng";
		$this->conn = mysqli_connect($host,$user,$pass,$db) or die("Failed connect to DB");
		return $this->conn;
	}
	public function update($table, $data, $id, $param){
		$this->update = mysqli_query($this->conn, 'update '.$table.' set '.$data.' where '.$id.'='.$param) or die(mysqli_error($this->conn));
		return $this->update;
	}
	public function query($sql)
	{
		$this->query = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
		return $this->query;
	}

	public function delete($table, $where, $id)
	{
		$this->delete = mysqli_query($this->conn, 'delete from '.$table.' where '.$where.' = '.$id);
		return $this->delete;
	}

	public function select($result)
	{
		return mysqli_fetch_array($result);
	}

	public function close()
	{
		return mysqli_close();
	}

	public function site_url()
	{
		$url = "http://localhost/BPK/";
		return $url;
	}
}
?>