<?php

class AdminModel extends CoreModel {

    private $_req;

    public function __destruct(){

        if(!empty($this->_req)){
            $this->_req->closeCursor();
        }
    }


}