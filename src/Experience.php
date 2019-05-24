<?php

include 'ExperienceDAOImpl.php';

class Experience
{


    function requesting($data, $parameter)
    {
        $experienceInst = new ExperienceDAOImpl();

        if( $parameter == 'ville' ){
                $resultsVille = $experienceInst -> searchVille($data);
                return $resultsVille;
            }
        if( $parameter == 'organisme' ){
                $resultsOrganisme = $experienceInst -> searchOrganisme($data);
                return $resultsOrganisme;
            }


    }


    function requesting_Without_Data(){
        $experienceInst = new ExperienceDAOImpl();
        $resultsAll = $experienceInst -> searchAll();
        return $resultsAll;
    }

    function analyse($results,$parameter)
    {
        // fonction mettant en forme les résultats.

            if (true) {

                // standardise les resultats
                $products_arr = $this -> standardisation($results,$parameter);

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

    function standardisation($results,$parameter){

        //Crée un tableau de clé parameter et y insèrer les éléments de results standardisés
        //Veuillez mettre les balises (noms de champs) correspondants
        //à droite des flèches

        $products_arr = array();
        $products_arr[$parameter] = array();

            // Met les résultats dans une sous array "experience"

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
                array_push($products_arr[$parameter], $product_item);
            }
        return $products_arr;
    }

    function is_Not_Null($results){
        //Renvoie true si les résultats ne sont pas vides.
        return  $results-> rowCount() >0 ;
    }
}
