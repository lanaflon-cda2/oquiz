<?php

namespace Oquizz;

/**
 * class App : FrontController de mon application
 * rôles :
 *   - tâches d'initialisation
 *     - chargement de la config du projet
 *   - routage (== matching de la requête)
 *   - dispatch (== appel de la fonction demandée)
 */
class App
{
    private $config;
    private $router;

    public function __construct()
    {
        // 1. tâches d'initialisation
        // - charger la config
        $this->config = parse_ini_file('config.conf');
        // var_dump($config);

        $this->router = new \AltoRouter();
        $this->router->setBasePath($this->config['BASE_PATH']);

        // - configurer les routes
        $this->defineRoutes();
    }

    private function defineRoutes()
    {
        // méthode de paramétrage des routes à partir d'un tableau :
        $routes = parse_ini_file('routes.conf');
        $this->router->addRoutes($routes);
    }

    public function run()
    {
        // 2. routage = matcher la requête avec les routes disponibles
        $match = $this->router->match();

        // 3. dispatch = appel de l'action qui correspond à la route matchée
        if($match)
        {
            // récupère dans un tableau $target, le nom du controller et la méthode séparément
            $target = explode("#", $match["target"]);

            // $target[0] contient le nom du controller
            // $controllerName => contient le nom complet (avec namespace) du ctrlr
            $controllerName = 'Oquizz\\Controller\\' . $target[0] . 'Controller';

            // $target[1] contient la méthode à éxécuter
            $action = isset($target[1]) ? $target[1] : 'home';
            $action .= 'Action';

            // je récupère les éventuels paramètres
            $params = $match['params'];

            // si le controller et la méthode ciblés sont bien définis
            if (class_exists($controllerName)) {
              $controller = new $controllerName($this->config, $this->router);

              if (method_exists($controller, $action))
                // je les appelle!
                return call_user_func([$controller, $action], $params);
            }
            else
            {
                echo "Le controller $controllerName n'existe pas";
            }
        }
        else {
            echo "route inconnue";
        }
    }
}
