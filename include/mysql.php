<?

class mysqlDao{
	var $conn;
	var $db_host;
    var $db_user;
    var $db_pass;
    var $db_name;
	var $db_encoding;
	var $tables;
	var $debug=false;
	function __construct(){
	    $this->init();
    }
	//以下是基础操作====================================================================================
	
	function init(){
		$this->db_host=C('db_host');
		$this->db_user=C('db_user');
		$this->db_pass=C('db_pass');
		$this->db_name=C('db_name');
		$this->db_encoding="utf8";
	}
	
	function get_conn(){
		$this->conn=mysql_connect($this->db_host,$this->db_user,$this->db_pass,true);
		mysql_select_db($this->db_name,$this->conn);//连接到指定的数据库
		mysql_query("set names ".$this->db_encoding,$this->conn);//设置字符编码
	}
	
	function query($sql){
		if($this->conn==''){
			$this->get_conn();
		}
		$rs=mysql_query($sql,$this->conn);
		return $rs;
	}
	
	function get_insert_id(){
		return mysql_insert_id($this->conn);
	}
	
	function get_affect_rows(){
		return mysql_affected_rows($this->conn);
	}
	
	function get_error_message(){
		return mysql_error ($this->conn);
	}
	
	function select($sql){
		$R=$this->query($sql);
		if($R)
		while($v=mysql_fetch_assoc($R)){
			$datalist[]=$v;
		} 
		return $datalist;
	}
	
	function find($table,$where,$field_arr=NULL){
		
		if(!array($field_arr) || count($field_arr)==0){
			$field_str="*";
		}else{
			$field_str=implode(',',$field_arr);
		}
		
		$data_list=$this->get_datalist("select {$field_str} from ".$table." ".$where." limit 0,1");
		return $data_list[0];
	}
	
	//最后一个参数表示是否需要sql转义,默认为自动判断,可为true,false,"auto"
	function insert($table,$array,$escape="auto"){
		//可能需要对$array进行转义
		$array=$this->escape_data($array,$escape);
		
		$field_str="";
		$value_str="";
		if(is_array($array))
		foreach($array as $key=>$vl){
			if($field_str=='')
				$field_str.=$key;
			else
				$field_str.=",".$key;
			
			if($value_str=='')
				$value_str.="'".$vl."'";
			else
				$value_str.=",'".$vl."'";
		}
		$sql="insert into ".$table."(".$field_str.") values(".$value_str.")";
		$this->query($sql);	
		return $this->get_insert_id();
	}
	
	function update($table,$array,$where,$escape="auto"){
		if(!is_array($array) || count($array)==0)
			return;
		//可能需要对$array进行转义
		$array=$this->escape_data($array,$escape);
		
		$data_str="";
		foreach($array as $key=>$vl){
			if($data_str=='')
				$data_str.=$key."='".$vl."'";
			else
				$data_str.=",".$key."='".$vl."'";
		}	
		$sql="update ".$table." set ".$data_str." ".$where;
			
			$this->query($sql);
		return $this->get_affect_rows();
	}
	
	function delete($table,$where){
		$sql="delete from ".$table." ".$where;
		$this->query($sql);	
		return $this->get_affect_rows();
	}
	
	//转义数据
	function escape_data($array,$escape="auto"){
		if($escape=="auto"){
			if(get_magic_quotes_gpc())
				$escape=false;
			else
				$escape=true;
		}
		$new_array=array();
		if($escape){
			foreach($array as $key=>$vl){
				$new_array[$key]=addslashes($vl);
			}
			return $new_array;
		}else{
			return $array;
		}	
	}
}
?>