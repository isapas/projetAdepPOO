<?php

//Function qui retourne un tableau contenant les routes de notre application

//Modèle des routes
//"NomDeLaRoute" => [
//  "Controller",
//  "Fonction",
//  Optionnel [
//    "parametre1" => ["typeAttendu", optionnel[valeurAttendu]],
//    "parametre2" => ["typeAttendu", optionnel[valeurAttendu]]
//  ]
// "status" => "role"
//]
function getRoutes() {
  return [
    "" => [
      "index",
      "login"
    ],
    "login" => [
      "admin",
      "loginUser",
    ],
    // START MATERIEL ROUTES
    "materiels" => [
     "materiel",
     "listMateriel",
     // "status" => "admin"
   ],
    "materiels/ajout" => [
     "materiel",
     "add",
     // "status" => "admin"
   ],
    "materiels/edit" => [
     "materiel",
     "edit",
     ["id" => ["integer"]
   ],
     // "status" => "admin"
   ],
    "materiels/suppr" => [
     "materiel",
     "delete",
     ["id" => ["integer"]
     ],
     // "status" => "admin"
    ],
    // END MATERIEL ROUTES
  ];
}

 ?>
