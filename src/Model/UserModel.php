<?php

namespace Oquizz\Model;


// classe UserModel gère les opérations en BD
// ET en session
// qui concernent l'user "lui-même" (enregistré)
class UserModel
{

    // - récupérer l'user pour cet email s'il existe en DB
    public static function findByEmail($email)
    {
        // requête à la BD : select * from users where email = $email
        // on va utiliser un paramètre dynamique dans notre requête (email)
        $sql = 'SELECT * FROM users WHERE email = :email LIMIT 1';
        // Donc => requête préparée avec PDO
        // 1. prépare la requête
        $query = Database::getDB()->prepare($sql);

        // 2. j'associe les paramètres avec leur valeur
        $query->bindValue(':email', $email);

        // 3. j'exécute la requête
        $query->execute();

        // renvoie le résultat = un user (d'email $email)
        return $query->fetch(\PDO::FETCH_OBJ);
    }


    // - authenticate (vérifier email & password)
    public static function auth($email, $password)
    {
        // récupère l'user correspondant à cet email
        $user = self::findByEmail($email);

        // s'il existe
        if($user)
        {
            // je vérifie si le mot de passe saisi correspond au mdp de la BD
            if(password_verify($password, $user->password))
            {
                // notre user est bien authentifié
                $_SESSION['user'] = $user;
                return true;
            }
        }
        return false;
    }

    // - logout
    public static function logout()
    {
        // déconnexion de l'user == vider $_SESSION['user']
        unset($_SESSION['user']);
    }

    /**
     * Méthode qui retourne l'utilisateur courant/connecté
     * et retourne false s'il n'y en a pas
     */
    public static function getCurrentUser()
    {
        return (isset($_SESSION['user'])) ? $_SESSION['user'] : false;
    }

}
