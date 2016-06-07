<?php
  class Keke_witkey_custom_fields_ext_class{
        public $_db;
        public $_tablename;
	    public $_dbop;
	    	 public $_id;  		 public $_model_id; 		 public $_extdata; 		 public $_objid; 		 public $_c_id; 
	    public $_cache_config = array ('is_cache' => 0, 'time' => 0 );
	    public $_replace=0;  
	    public $_where;      
	     function  keke_witkey_custom_fields_ext_class(){ 			 $this->_db = new db_factory ( );			 $this->_dbop = $this->_db->create(DBTYPE);			 $this->_tablename = TABLEPRE."witkey_custom_fields_ext";		 }	    
	    		public function getId(){			 return $this->_id ;		}		public function getModel_id(){			 return $this->_model_id ;		}		public function getExtdata(){			 return $this->_extdata ;		}		public function getObjid(){			 return $this->_objid ;		}		public function getC_id(){			 return $this->_c_id ;		}		public function getWhere(){			 return $this->_where ;		}		public function getCache_config() {			return $this->_cache_config;		}
	    		public function setId($value){ 			 $this->_id = $value;		}		public function setModel_id($value){ 			 $this->_model_id = $value;		}		public function setExtdata($value){ 			 $this->_extdata = $value;		}		public function setObjid($value){ 			 $this->_objid = $value;		}		public function setC_id($value){ 			 $this->_c_id = $value;		}		public function setWhere($value){ 			 $this->_where = $value;		}		public function setCache_config($_cache_config) {			 $this->_cache_config = $_cache_config; 		}
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
	    		function create_keke_witkey_custom_fields_ext(){		 		 $data =  array(); 					if(!is_null($this->_id)){ 				 $data['id']=$this->_id;			}			if(!is_null($this->_model_id)){ 				 $data['model_id']=$this->_model_id;			}			if(!is_null($this->_extdata)){ 				 $data['extdata']=$this->_extdata;			}			if(!is_null($this->_objid)){ 				 $data['objid']=$this->_objid;			}			if(!is_null($this->_c_id)){ 				 $data['c_id']=$this->_c_id;			}			 return $this->_id = $this->_db->inserttable($this->_tablename,$data,1,$this->_replace); 		 } 
	    		function edit_keke_witkey_custom_fields_ext(){ 		 		 $data =  array();  					if(!is_null($this->_id)){ 				 $data['id']=$this->_id;			}			if(!is_null($this->_model_id)){ 				 $data['model_id']=$this->_model_id;			}			if(!is_null($this->_extdata)){ 				 $data['extdata']=$this->_extdata;			}			if(!is_null($this->_objid)){ 				 $data['objid']=$this->_objid;			}			if(!is_null($this->_c_id)){ 				 $data['c_id']=$this->_c_id;			}			if($this->_where){ 				 return $this->_db->updatetable($this->_tablename,$data,$this->getWhere()); 			 } 			 else{ 				 $where = array('id' => $this->_id); 				 return $this->_db->updatetable($this->_tablename,$data,$where); 			} 		 } 
	    		function query_keke_witkey_custom_fields_ext($is_cache=0, $cache_time=0){ 			 if($this->_where){ 				 $sql = "select * from $this->_tablename where ".$this->_where; 			 } 			 else{ 				 $sql = "select * from $this->_tablename"; 			 } 			if ($is_cache) {			 $this->_cache_config ['is_cache'] = $is_cache;			}			if ($cache_time) {			 $this->_cache_config ['time'] = $cache_time;			 }			 if ($this->_cache_config ['is_cache']) {			     if (CACHE_TYPE) {					 $keke_cache = new keke_cache_class ( CACHE_TYPE );					 $id = $this->_tablename . ($this->_where?"_" .substr(md5 ( $this->_where ),0,6):'');						$data = $keke_cache->get ( $id );							if ($data) {								return $data; 							} else { 								$res = $this->_dbop->query ( $sql ); 								$keke_cache->set ( $id, $res,$this->_cache_config['time'] ); 					 			$this->_where = ""; 								return $res; 							} 						} 			 }else{			 	$this->_where = ""; 				return  $this->_dbop->query ( $sql ); 			 }		 } 
	    		function count_keke_witkey_custom_fields_ext(){ 			 if($this->_where){ 				 $sql = "select count(*) as count from $this->_tablename where ".$this->_where; 			 } 			 else{ 				 $sql = "select count(*) as count from $this->_tablename"; 			 } 			 $this->_where = ""; 			 return $this->_dbop->getCount($sql); 		 } 
	    		function del_keke_witkey_custom_fields_ext(){ 			 if($this->_where){ 				 $sql = "delete from $this->_tablename where ".$this->_where; 			 } 			 else{ 				 $sql = "delete from $this->_tablename where id = $this->_id "; 			 } 			 $this->_where = ""; 			 return $this->_dbop->execute($sql); 		 } 
   }
 ?>