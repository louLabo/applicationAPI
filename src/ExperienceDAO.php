<?php


interface ExperienceDAO {
    // Cette classe liste les fonction que l'on peut implémenter pour requeter un article type expérience
    // Chaque fonction décrit un élément en fonction duquel on peut requeter la base de donnée
    // exemple searchVille cherche les expériences en fonction d'un nom de ville.

    function searchAll(); // Retourne le résultat de tout les experiences de la database

    function searchVille($nom_ville); // Retourne toutes les experiences qui se sont passées à la ville passée en paramètre

    function searchOrganisme($nom_organisme); // // Retourne toutes les experiences qui ont été menées par l'organisme passée en paramètre
}