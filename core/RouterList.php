<?php
class RouterList
{
    protected static $routerRules = [];

    public static function addRouter($routerRule)
    {
        self::$routerRules[] = $routerRule;
    }

    public static function init()
    {   
        foreach (self::$routerRules as $routerRule) {
            if ($routerRule['url_path'] == $_SERVER['REQUEST_URI']) {
                $controllerWithMethod = $routerRule['handler'];
                $controllerName = explode('@', $controllerWithMethod)[0];
                $methodName = explode('@', $controllerWithMethod)[1];
                $controller = new $controllerName;
                $controller->{$methodName}();
                return;
            }
        }

        renderView('404');
    }
}