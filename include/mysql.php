<?php

class mysqlDao{
	var $conn;
	var $db_host;
    var $db_user;
    var $db_pass;
    var $db_name;
	var $db_encoding;
	var $tables;
	var $debug=false;
	var $LastSql;
	
	var $sql = array(
	    "field" => "*",
	    "where" => "",
	    "order" => "",
	    "limit" => "",
	    "group" => "",
	    "having" => "",
	);
	
	function __construct(){
	    $this->init();
	    if($this->conn==''){
	        $this->get_conn();
	    }
    }
    
    function __call($methodName,$args){
        $methodName=strtolower($methodName);
        if(isset($this->sql[$methodName])){
            if($methodName=="where" && !empty($args[0])){
                if(empty($this->sql[$methodName])){
                    $this->sql[$methodName].="where {$args[0]}";
                }else{
                    if(empty($args[1])){
                        $this->sql[$methodName].=" and {$args[0]}";
                    }else{
                        $this->sql[$methodName].=" {$args[1]} {$args[0]}";
                    }
                }
            }elseif ($methodName=="group" && !empty($args[0])){
                $this->sql[$methodName]="GROUP BY {$args[0]}";
            }elseif ($methodName=="order" && !empty($args[0])){
                $this->sql[$methodName]="order BY {$args[0]}";
            }elseif ($methodName=="having" && !empty($args[0])){
                $this->sql[$methodName]="having {$args[0]}";
            }elseif ($methodName=="limit" && !empty($args[0])){
                $this->sql[$methodName]="limit {$args[0]}";
            }elseif($methodName="field" && !empty($args[0])){
                $this->sql['field']=$args[0];
            }
        }
        return $this;
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
	    $datalist=array();
		$rs=mysql_query($sql,$this->conn);
		if($R)
		    while($v=mysql_fetch_assoc($R)){
		    $datalist[]=$v;
		}
		return $datalist;
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
	
	function select(){
	    $datalist=array();
	    $tables=C("db_prefix").$this->tables;
	    $sql="select {$this->sql['field']} from $tables {$this->sql['where']} {$this->sql['group']} {$this->sql['having']} {$this->sql['order']} {$this->sql['limit']}";
		$R=mysql_query($sql,$this->conn);
		if($R)
		while($v=mysql_fetch_assoc($R)){
			$datalist[]=$v;
		}
		return $datalist;
	}
	
	function find(){
	    $datalist=array();
		$tables=C("db_prefix").$this->tables;
	    $sql="select {$this->sql['field']} from $tables {$this->sql['where']} {$this->sql['group']} {$this->sql['having']} {$this->sql['order']} limit 1";
		$R=mysql_query($sql,$this->conn);
		if($R)
		while($v=mysql_fetch_assoc($R)){
			$datalist[]=$v;
		} 
		return $datalist[0];
	}
	
	//最后一个参数表示是否需要sql转义,默认为自动判断,可为true,false,"auto"
	function insert($array,$escape="auto"){
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
		$tables=C("db_prefix").$this->tables;
		$sql="insert into ".$tables."(".$field_str.") values(".$value_str.")";
		$R=mysql_query($sql,$this->conn);
		return $this->get_insert_id();
	}
	
	function getDbFields(){
	    $tables=C("db_prefix").$this->tables;
	    $sql="select COLUMN_NAME from information_schema.COLUMNS where table_name='$tables' and table_schema='{$this->db_name}'";
	    $R=mysql_query($sql,$this->conn);
	    if($R)
	        while($v=mysql_fetch_assoc($R)){
	        $datalist[]=$v['COLUMN_NAME'];
	    }
	    return $datalist;
	}
	
	function update($array,$escape="auto"){
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
		$tables=C("db_prefix").$this->tables;
		$sql="update ".$tables." set ".$data_str." {$this->sql['where']}";
		$R=mysql_query($sql,$this->conn);
		return $this->get_affect_rows();
	}
	
	function delete(){
	    $tables=C("db_prefix").$this->tables;
		$sql="delete from ".$tables." {$this->sql['where']}";
		$R=mysql_query($sql,$this->conn);
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