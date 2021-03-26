<?php


    session_start();

    $GLOBALS["sessionName"] = "peliculas";

    function Add($item){

        $peliculas = GetList();

        if(count($peliculas) == 0){
            $item["id"] = 1;
        }else{

            $lastElement = getLastElement($peliculas);

            $item["id"] = $lastElement["id"] + 1;
        }      

        array_push($peliculas, $item);

       $_SESSION[$GLOBALS["sessionName"]] = $peliculas;         
    }

    function Edit($item){      

        $peliculas = GetList();
        $hero = GetById($item["id"]);

        if($hero != null && count($hero) > 0 ){
      
            $index = getIndexElement($peliculas,"id",$item["id"]);
            $peliculas[$index] = $item;

            $_SESSION[$GLOBALS["sessionName"]] = $peliculas;    

        }           
    }

    /*
    public function Delete($id){


        $peliculas = $this->GetList();

        $index = $this->getIndexElement($peliculas, "Id",$id);

        if($index !== null){
            unset($peliculas[$index]);
        }
    }*/
    
    function GetList(){

        $peliculas = isset($_SESSION[$GLOBALS["sessionName"]]) ? $_SESSION[$GLOBALS["sessionName"]] : [];
        
        return $peliculas;

    }



    
    function GetById($id){

        $peliculas = GetList();

        $pelicula = searchProperty($peliculas,"id",$id);     
        
        return $pelicula[0];
    }




?>



