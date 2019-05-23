<?php

include 'ExperienceDAOImpl.php';

class Experience
{

    function requesting($data)
    {
        $experienceInst = new ExperienceDAOImpl();
        $resultsVille = $experienceInst -> searchVille($data);
        return $resultsVille;// +resultsOrganisme...
    }


    function requestingWithoutData(){
        $experienceInst = new ExperienceDAOImpl();
        $resultsAll = $experienceInst -> searchAll();
        return $resultsAll;
    }

    function analyse($results)
    {
        // fonction mettant en forme les résultats.


        if ($this-> isNotNull($results)) {

            // standardise les resultats
            $products_arr = $this -> standardisation($results);

            // met le code de reponse pour un succès à 200
            http_response_code(200);
            // show products data in json format
            $encoded = json_encode($products_arr);
            header('Content-type: application/json');
            return ($encoded);
        } else {
            // met le code de reponse pour un echec à 404
            http_response_code(404);
            echo json_encode(
                array("message" => "No project found.")
            );
        }


    }



    function standardisation($results){

        //Crée un tableau et y insère les éléments de results standardisés
        //Veuillez mettre les balises (noms de champs) correspondants
        //à droite des flèches

            $products_arr = array();
            $products_arr["records"] = array();

            // Met les résultats dans une sous array "results"

            while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $product_item = array(

                    //******************************
                    "body" => $body,
                    "ville" => $ville,
                    "lien" => $lien,
                    "latitude" => $lat,
                    "longitude" => $lon
                    //******************************

                );
                array_push($products_arr["records"], $product_item);
            }
            return $products_arr;
    }

    function isNotNull($results){
        //Renvoie true si les résultats ne sont pas vides.
        return  $results-> rowCount() >0 ;
    }


}
