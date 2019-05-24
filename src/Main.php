
<?php

include "Experience.php";

// Déclaration des Types d'articles à requeter




if(isset($_GET["recherche"])){
    main_with_data($_GET["recherche"]);
}
else {
    main_without_data();
}


//************ Fonctions Main ***************

function main_with_data($data_Sent)
{
    //
    //Requete sur les types de contenu
    $res_experience = experience_requesting_with_data($data_Sent);

    // Ajouter tous les résultats dans l'array
    $allResults = array($res_experience);

    //On boucle
    foreach ($allResults as $res) {
        foreach ( $res as $r ){
            echo $r;
        }

    }
}

function main_without_data()
{

    $res_experience = experience_requesting_without_data();
    //On boucle
    $allResults = array($res_experience);

    //On boucle
    foreach ($allResults as $res) {
            echo $res;

    }

}

//********************** Fonction de traitement des types de contenu **************************

//C'est fonctionx nom_contenu_requesting renvoient une array avec pour structure [nom_contenu][param1[],parm2[]...]

function experience_requesting_with_data($data_Sent)
{

    //liste des critères de selection des données.
    $list_parameter = array(
        'ville'
        // exemple on veut crée un sous tableau comportant les résultats des recherches pour les villes égales au mots clés
        // 'organisme', 'budget', ...
    );
    $res_experience = array();
    $res_experience['experience'] = array();

    foreach ($list_parameter as $parameter) {
        $Experience = new Experience();
        $results = $Experience->requesting($data_Sent, $parameter);
        array_push($res_experience['experience'] , ( $Experience->analyse($results, $parameter)));

    }
    return $res_experience['experience'];
}

function experience_requesting_without_data()
{
        $Experience = new Experience();
        $results = $Experience->requesting_without_data();
        $res_experience['experience'] = ($Experience->analyse($results, 'all'));
        return $res_experience['experience'];
}


