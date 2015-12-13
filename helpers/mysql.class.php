<?php
include("database.class.php");
class MySQL extends Database {
	private $db;
	private $host;
	private $user;
	private $password;
	private $database;
	private $query;
	private $result;
	private $row;
	private $num_rows;
	
	function __construct() {
		$this->host = "localhost";
		$this->user = "root";
		$this->password = "";
		$this->database = "dm_imgse_amel";
	}
	
	function connect() {
		$this->db = mysql_connect($this->host, $this->user, $this->password);
		mysql_select_db($this->database, $this->db);
	}
	
	function execute($query) {
		$this->query = $query;
		$this->result = mysql_query($this->query, $this->db);
	}
	
	function get_array() {
		if($this->row = mysql_fetch_array($this->result, MYSQL_ASSOC))
			return $this->row;
		else
			return false;
	}
	
	function get_row() {
		if($this->row = mysql_fetch_array($this->result, MYSQL_NUM))
			return $this->row;
		else
			return false;
	}
	
	function get_object() {
		if($this->row = mysql_fetch_object($this->result, MYSQL_ASSOC))	
			return $this->row;
		else
			return false;
	}
	
	function get_dataset() {
		$dataset = array();
		$i = 0;
		while($r = mysql_fetch_row($this->result)) {
			$field = 0;
			for($field = 0; $field < mysql_num_fields($this->result); $field++) {
				$dataset[$i][$field] = $r[$field];
			}
			$i++;
		}
		return $dataset;
	}
	
	function get_num_rows() {
		$this->num_rows = mysql_num_rows($this->result);
		return $this->num_rows;
	}
	
	function close_connection() {
		mysql_close($this->db);	
	}

	function get_data($table,$orderBy='',$orderType='desc',$limit ='') {
        $dat = array();
        if($table !=''){           
            $q = $this->create_query($table,$orderBy,$orderType,$limit);
            if($q){
                while ($data = $q->fetch_array()){
                    $dat[] = $data;
                }
                $q->free();
            }                            
        }
        return $dat;
    }
}
?>