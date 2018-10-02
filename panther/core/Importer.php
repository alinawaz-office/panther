<?php

namespace Panther\Core;

class Importer implements ImporterInterface {

    private $class;

    function __construct($class){
        $this->class = $class;
    }

    public function from($package, $constructor=null){
        if($package == 'router'){
            if($this->class == 'request'){
                if($constructor != null){
                    return new \Panther\Router\RouteRequest($constructor);
                }
                return new \Panther\Router\RouteRequest;
            }
            if($this->class == 'router'){
                if($constructor != null){
                    return new \Panther\Router\Router($constructor);
                }
                return new \Panther\Router\Router;
            }
        }
    }

}