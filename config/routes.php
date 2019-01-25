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
      "connect"
    ],
    "login" => [
      "index",
      "connect"
    ],
    "logout" => [
      "index",
      "deconnect"
    ],
    // "login" => [
    //   "admin",
    //   "loginUser",
    // ],
    // START MATERIEL ROUTES
    "materiels" => [
     "materiel",
     "listMateriel",
     "status" => "admin"
   ],
    "materiels/ajout" => [
     "materiel",
     "add",
     "status" => "admin"
   ],
    "materiels/edit" => [
     "materiel",
     "edit",
     ["id" => ["integer"]
   ],
     "status" => "admin"
   ],
    "materiels/suppr" => [
     "materiel",
     "delete",
     ["id" => ["integer"]
     ],
     "status" => "admin"
    ],

    // END MATERIEL ROUTES




    // START EMPRUNTEUR ROUTES

    "emprunteurs" => [
     "emprunteur",
     "listEmprunteur",
     "status" => "admin"
   ],

   "emprunteurs/ajout" => [
    "emprunteur",
    "add",
    "status" => "admin"
   ],

   "emprunteurs/edit" => [
    "emprunteur",
    "edit",
    ["id" => ["integer"]
   ],
     "status" => "admin"
   ],

   "emprunteurs/suppr" => [
    "emprunteur",
    "delete",
    ["id" => ["integer"]
   ],
     "status" => "admin"
   ],


   // END EMPRUNTEUR ROUTES


    //start roads for borrow
   "emprunter/list" => [
     "emprunt",
     "sortMaterielList",
     "status" => "user"
   ],

   "emprunter" => [
      "emprunt",
      "emprunter",
      ["id" => ["integer"]
    ],
      "status" => "user"
    ],

    "restituer/list" => [
      "emprunt",
      "sortMaterielList",
      "status" => "admin"
    ],

    "emprunts/restituer" => [
      "emprunt",
      "restituer",
      ['id' => ['integer']
    ],
      "status" => "admin"
],
    "emprunts/list" => [
      "emprunt",
      "getSortedMyEmprunts",
      "status" => "user"

    ]
// end roads for borrow

  ];
}

 ?>
