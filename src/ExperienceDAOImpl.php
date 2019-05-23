<?php

include 'ExperienceDAO.php';
include 'Database.php';

class ExperienceDAOImpl implements ExperienceDAO
{


    private $conn;
    // constructor with $db as database connection
    public function __construct(){
        $database = new Database();
        $db = $database->getConnection();
        $this->conn = $db;
    }

    function searchAll(){
        // Retourne le résultat de tout les experiences de la database

        $query = "
      SELECT DISTINCT ob.body_value as body, ob.body_summary as bodysum, ob.bundle, ov.field_ville_value as ville, ol.field_lien_url as lien, oa.field_annee_tid, oc.field_carte_lat as lat, oc.field_carte_lon as lon
      FROM obj_field_data_body as ob , obj_field_data_field_ville as ov, obj_field_data_field_lien as ol, obj_field_data_field_annee as oa, obj_field_data_field_carte as oc
      where ob.bundle='expérience' AND ob.entity_id = ov.entity_id AND ob.entity_id = ol.entity_id AND ob.entity_id = oa.entity_id AND oc.entity_id = ob.entity_id;
      ";

      $request = $this->conn->prepare($query);
      // execute la query
      $request->execute();
      return $request;
      // retourne le résultat de la requête
    } //

    function searchVille($ville){
        // Retourne toutes les experiences qui se sont passées à la ville passée en paramètre

        $query = "
        SELECT DISTINCT ob.body_value as body, ob.body_summary as bodysum, ob.bundle, ov.field_ville_value as ville, ol.field_lien_url as lien, oa.field_annee_tid, oc.field_carte_lat as lat, oc.field_carte_lon as lon
        FROM obj_field_data_body as ob , obj_field_data_field_ville as ov, obj_field_data_field_lien as ol, obj_field_data_field_annee as oa, obj_field_data_field_carte as oc
        where ob.bundle='expérience' AND ob.entity_id = ov.entity_id AND ob.entity_id = ol.entity_id AND ob.entity_id = oa.entity_id AND oc.entity_id = ob.entity_id AND ov.field_ville_value LIKE '$ville%' ;
        ";

        //Prepare la requête
        $request = $this->conn->prepare($query);
        //Execute la requête
        $request->execute();
        return $request;
    }

    function searchOrganisme($nom_organisme){
            // sur la bd capitale on ne peut pas requeter selon l'organisme
    }
}