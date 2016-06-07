<?php
  class Keke_witkey_district_class{
        public $_db;
        public $_tablename;
	    public $_dbop;
	    	 public $_id;  		 public $_upid; 		 public $_name; 		 public $_type; 		 public $_displayorder; 
	    public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	    public $_replace=0;  
	    public $_where;      
	     function  keke_witkey_district_class(){ 			 $this->_db = new db_factory ( );			 $this->_dbop = $this->_db->create(DBTYPE);			 $this->_tablename = TABLEPRE."witkey_district";		 }	    
	    		public function getId(){			 return $this->_id ;		}		public function getUpid(){			 return $this->_upid ;		}		public function getName(){			 return $this->_name ;		}		public function getType(){			 return $this->_type ;		}		public function getDisplayorder(){			 return $this->_displayorder ;		}		public function getWhere(){			 return $this->_where ;		}		public function getCache_config() {			return $this->_cache_config;		}
	    		public function setId($value){ 			 $this->_id = $value;		}		public function setUpid($value){ 			 $this->_upid = $value;		}		public function setName($value){ 			 $this->_name = $value;		}		public function setType($value){ 			 $this->_type = $value;		}		public function setDisplayorder($value){ 			 $this->_displayorder = $value;		}		public function setWhere($value){ 			 $this->_where = $value;		}		public function setCache_config($_cache_config) {			 $this->_cache_config = $_cache_config; 		}
    	   public  function __set($property_name, $value) {
		 		$this->$property_name = $value; 
			}
			public function __get($property_name) { 
				if (isset ( $this->$property_name )) { 
					return $this->$property_name; 
				} else { 
					return null; 
				} 
			}
	    		function create_keke_witkey_district(){		 		 $data =  array(); 					if(!is_null($this->_id)){ 				 $data['id']=$this->_id;			}			if(!is_null($this->_upid)){ 				 $data['upid']=$this->_upid;			}			if(!is_null($this->_name)){ 				 $data['name']=$this->_name;			}			if(!is_null($this->_type)){ 				 $data['type']=$this->_type;			}			if(!is_null($this->_displayorder)){ 				 $data['displayorder']=$this->_displayorder;			}			 return $this->_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace); 		 } 
	    		function edit_keke_witkey_district(){ 		 		 $data =  array();  					if(!is_null($this->_id)){ 				 $data['id']=$this->_id;			}			if(!is_null($this->_upid)){ 				 $data['upid']=$this->_upid;			}			if(!is_null($this->_name)){ 				 $data['name']=$this->_name;			}			if(!is_null($this->_type)){ 				 $data['type']=$this->_type;			}			if(!is_null($this->_displayorder)){ 				 $data['displayorder']=$this->_displayorder;			}			if($this->_where){ 				 return $this->_db->updatetable($this->_tablename,$data,$this->getWhere()); 			 } 			 else{ 				 $where = array('id' => $this->_id); 				 return $this->_db->updatetable($this->_tablename,$data,$where); 			} 		 } 
	    		function query_keke_witkey_district($is_cache=0, $cache_time=0){ 			 if($this->_where){ 				 $sql = "select * from $this->_tablename where ".$this->_where; 			 } 			 else{ 				 $sql = "select * from $this->_tablename"; 			 } 			if ($is_cache) {			 $this->_cache_config ['is_cache'] = $is_cache;			}			if ($cache_time) {			 $this->_cache_config ['time'] = $cache_time;			 }			 if ($this->_cache_config ['is_cache']) {			     if (CACHE_TYPE) {					 $keke_cache = new keke_cache_class ( CACHE_TYPE );					 $id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');						$data = $keke_cache->get ( $id );							if ($data) {								return $data; 							} else { 								$res = $this->_dbop->query ( $sql ); 								$keke_cache->set ( $id, $res,$this->_cache_config['time'] ); 					 			$this->_where = ""; 								return $res; 							} 						} 			 }else{			 	$this->_where = ""; 				return  $this->_dbop->query ( $sql ); 			 }		 } 
	    		function count_keke_witkey_district(){ 			 if($this->_where){ 				 $sql = "select count(*) as count from $this->_tablename where ".$this->_where; 			 } 			 else{ 				 $sql = "select count(*) as count from $this->_tablename"; 			 } 			 $this->_where = ""; 			 return $this->_dbop->getCount($sql); 		 } 
	    		function del_keke_witkey_district(){ 			 if($this->_where){ 				 $sql = "delete from $this->_tablename where ".$this->_where; 			 } 			 else{ 				 $sql = "delete from $this->_tablename where id = $this->_id "; 			 } 			 $this->_where = ""; 			 return $this->_dbop->execute($sql); 		 } 
   }
 ?>