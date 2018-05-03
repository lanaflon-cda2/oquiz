<?php
namespace Oquizz\Controller;

/**
 * CoreController : définit les propriétés et méthodes
 * que doivent posséder tous les controllers
 */
class CoreController
{
  // protected == privé mais peut être hérité
  protected $templateEngine;
  protected $config;
  protected $router;
  protected $user;

  public function __construct($config, $router)
  {
      session_start();

      // récupère config et router de l'application
      $this->config = $config;
      $this->router = $router;

      // envoie les paramètres à la BD
      \Oquizz\Model\Database::setConfig($this->config);

      // on récupère "l'user connecté"
      // - si il est connecté, c'est ce qu'il y a dans la session
      // - s'il est pas connecté, c'est rien du tout (false)
      $this->user = \Oquizz\Model\UserModel::getCurrentUser();

      // initialise le moteur de templates
      $this->templateEngine = new \League\Plates\Engine('src/Templates');

      // ajouter une variable qui sera accessible dans -tous- les templates
      $this->templateEngine->addData([
          'router' => $this->router,
          'user' => $this->user,
          'BASE_PATH' => $this->config['BASE_PATH']
      ]);
    }

    public function redirect($route, $params = null)
    {
    if($params)
        $url = $this->router->generate($route, $params);
    else
        $url = $this->router->generate($route);
    header('Location: ' . $url);
    }
  }

 ?>
