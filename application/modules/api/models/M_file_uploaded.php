<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_file_uploaded
 *
 * @author johnenrick
 * modified by
 * @kennetteCanales
 *	6/18/16
 */
class M_file_uploaded extends API_Model{
    public function __construct() {
        parent::__construct();
        $this->TABLE = "file_uploaded";
    }
    public function createFileUploaded($id,$type, $name, $path, $size){
        $newData = array(
			"ID"   =>$id,
            "type" => $type,	
            "name" => $name,
            "path" => $path,
            "size" => $size,
            "datetime" => time()
        );
        return $this->createTableEntry($newData);
    }
    public function retrieveFileUploaded($retrieveType = false, $limit = NULL, $offset = 0, $sort = array(), $ID = NULL, $condition = NULL) {
        $joinedTable = array(
            
        );
        $selectedColumn = array(
            "file_uploaded.*"
        );
        
        return $this->retrieveTableEntry($retrieveType, $limit, $offset, $sort, $ID, $condition, $selectedColumn, $joinedTable);
    }
    public function updateFileUploaded($ID = NULL, $condition = array(), $newData = array()) {
        return $this->updateTableEntry($ID, $condition, $newData);
    }
    public function deleteFileUploaded($ID = NULL, $condition = array()){
        return $this->deleteTableEntry($ID, $condition);
    }
}
