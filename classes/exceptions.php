<?php

class noSuchController extends Exception {
    public function __construct($message='No such controller', $code=0, $previous=NULL) {
        parent::__construct($message, $code, $previous);
    }
}

class noSuchAction extends Exception {
}
