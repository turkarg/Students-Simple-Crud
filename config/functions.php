<?php
class stud_functions extends Database
{
	public function insert($table= NULL, $data= NULL)
	{
		global $conn;
	    $fields = array_keys( $data );  
	    $values = array_map( "mysql_real_escape_string", array_values( $data ) );
	    $sql=$conn->query( "INSERT INTO $table(".implode(",",$fields).") VALUES ('".implode("','", $values )."');") ;
	    return $sql;
	}

	public function update($table= NULL, $data= NULL, $condition= NULL)
	{
		global $conn;
		$set=array();
		$where=array();
		if(!empty($condition) and is_array($condition))
		{
			foreach($data as $k => $v)
				{
					$set[] = $k ." = '".$conn->real_escape_string($v)."'";					
				}
			$str_set=implode(" , ",$set);
			
			foreach($condition as $k => $v)
			{
				$where[] = $k ." = '".$v."'";						
			}
			$str_where=implode(" AND ",$where);
			$sql = $conn->query( "UPDATE ". $table ." SET ". $str_set ." WHERE  ".$str_where." ");
		}
	    return $sql;
	}

	public function delete($table= NULL, $condition= NULL)
	{
		global $conn;
		$set=array();
		$where=array();
		if(!empty($condition) and is_array($condition))
		{			
			foreach($condition as $k => $v)
			{
				$where[] = $k ." = '".$v."'";						
			}
			$str_where=implode(" AND ",$where);
			$sql = $conn->query( "DELETE FROM  ". $table ." WHERE  ".$str_where." ");
		}
	    return $sql;
	}

	public function select($table = NULL,$condition= NULL, $orderby=NULL, $limit=NULL)
	{
		global $conn;
		if(!empty($condition) and is_array($condition))
		{
			foreach($condition as $k => $v)
			{
				$where[] = $k ." = '".$v."'";						
			}
			$str_where="WHERE ".implode(" AND ",$where);
		}else{
			$str_where="";
		}
		
		$query = $conn->query("SELECT * FROM ".$table." ".$str_where." ".$orderby." ".$limit." ");	
		return($query);
	}

}
?>