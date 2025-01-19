<?php 
namespace app\utils;

class Error{


public static function getError($error){

    switch ($error){

        case 'usernotfound':
            return 'Utilisateur non trouvé .';
        case 'incorrectpassword':

            return 'Mot de passe incorrect.';
        case 'emptyemail':
            return 'Email ne peut pas être vide . ';
        case 'invalideemail':
            return 'email n\'est pa valide.';
        case 'emptypassword':
            return 'Le mot de passe ne peut pas être vide .';
            
        default :
           return 'Une erreur inconnue est survenue .';



    }



}




}











?>