<?php

namespace Oquizz\Controller;

use Oquizz\Model\UserModel;

class UserController extends CoreController
{

    /**
     * si formulaire non soumis : affiche le formulaire
     * si form soumis, valide les infos d'authentification
     * et "logge" l'utilisateur si elles sont valides
     * (+ redirige l'user vers son compte membre)
     */
    public function loginAction()
    {
        // si le form a été soumis
        if(!empty($_POST['email']) || !empty($_POST['password']))
        {
            // Demande au Model de vérifier les infos saisies
            if(UserModel::auth($_POST['email'], $_POST['password']))
            {
                // si elles sont correctes => redirige l'utilisateur vers 'user_account'
                $this->redirect('home');
                // echo "authentifié";
                return;
            }
            // sinon message d'erreur
            echo $this->templateEngine->render('user/login', [
                'message' => 'Erreur d\'authentification'
            ]);
            return;
        }
        echo $this->templateEngine->render('user/login');
    }

    public function logoutAction()
    {
        // demander au usermodel de déconnecter l'utilisateur courant
        UserModel::logout();

        $this->redirect('home');
    }

    public function accountAction()
    {
        if($this->user)
        {
            echo $this->templateEngine->render('user/profile');
        }
        else
        {
            $this->redirect('user_login');
        }

    }

}


 ?>
