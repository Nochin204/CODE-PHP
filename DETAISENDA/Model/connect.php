<?php
class connect
{
	// thuộc tính lệnh kết nối
	var $db = null; // đối tượng ban đầu
	// hàm tạo đối tượng không đối số
	public function __construct() // hàm tạo này đang thực hiện việc kết nối với database
	{
		$dsn = 'mysql:host=localhost;dbname=senda';
		$user = 'root';
		$pass = 'root'; // xài Mamp, còn xài xamp thì $pass=''
		$this->db = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	}
	// phương thức bên class connect là thực thi việc kết nối, câu truy vấn select, update, delete
	// phương thức để thực thi câu truy vấn select
	// phương thức này trả về nhiều row
	public function getList($select) //$select="select * from new
	{
		// câu truy vấn select là dùng query, tức muốn thực thi select thì phải dùng pt query được php xây dựng sẵn
		$results = $this->db->query($select); // $this->db-query(select * from new)
		return ($results);
	}
	// phương thức này trả về 1 đối tượng
	public function getInstance($select) //$select="select * from new
	{
		// câu truy vấn select là dùng query, tức muốn thực thi select thì phải dùng pt query được php xây dựng sẵn
		$results = $this->db->query($select); // $this->db-query(select * from new)
		$result = $results->fetch();
		return $result;
	}
	//
	public function useprepare($query)
	{
		$results = $this->db->prepare($query);
		return ($results);
	}
	//exe
	public function getexec($query)
	{
		$results=$this->db->exec($query);
		// echo $results;
		return($results);
	}
	public function getListP($select)
	{
		$results = $this->db->prepare($select);
		return ($results);
	}
	public function execP($query)
	{
		$statement=$this->db->prepare($query);
		return $statement;
	}
}
?>