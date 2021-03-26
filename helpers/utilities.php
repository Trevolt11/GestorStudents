<?php

    $companies = [1=> "Warnebrothr", 2=>"Disney"];
 

    function getLastElement($list){

        $countList = count($list);
        $lastElement = $list[$countList -1];

        return $lastElement;

    }

    function searchProperty($list,$property,$value){

        $filters = [];

        foreach($list as $item){

            if($item[$property] == $value){
                array_push($filters, $item);
            }
        }

        return $filters;
    }

    function getIndexElement($list,$property,$value){

        foreach($list as $key => $item){

            if($item[$property] == $value){             
                return $key;                
                break;
            }
        }
    }

?>