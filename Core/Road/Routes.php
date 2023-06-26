<?php

namespace Core\Road;

use Core\Road\Attribute\Route;
use ReflectionClass;
use ReflectionException;

/**
 * @desc Routing of frameworks
 * @version 0.0.1
 */
class Routes {

    public function __construct() { }

    /**
     * @throws ReflectionException
     * @version 0.0.1
     */
    final public function registerRoutesFromControllerAttributes($prefix, array $controllers): void {
        foreach ($controllers as $controller) {
            $reflectionController = new ReflectionClass($controller);
            foreach ($reflectionController->getMethods() as $method){
                foreach ($method->getAttributes(Route::class) as $attribute){
                    $route = $attribute->newInstance();
                    $this->get($prefix, $route->getPath(), $controller, $method->getName());
                    if(array_key_exists('name', $attribute->getArguments())) {
                        Route::setControllerName($attribute->getArguments()[0], $attribute->getArguments()['name']);
                    }
                }
            }
        }
    }

    // section get
    final public function get($prefix, $path, $controller, $method): void {
        if($_SERVER['REQUEST_URI'] === $prefix.$path) {
            (new $controller())->{$method}();
        }
    }
}
