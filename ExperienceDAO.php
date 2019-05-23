<?php


interface ExperienceDAO {
    // Cette classe liste les fonction que l'on peut implémenter pour requeter un article type expérience
    // Chaque fonction décrit un élément en fonction duquel on peut requeter la base de donnée
    // exemple searchVille cherche les expériences en fonction d'un nom de ville.

    function searchAll(); //

    function searchVille($nom_ville);

    function searchOrganisme($nom_organisme); //
}