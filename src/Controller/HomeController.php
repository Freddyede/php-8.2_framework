<?php

namespace App\Controller;

use Core\Road\Attribute\Route;
use Core\Abstract\AbstractController;

class HomeController extends AbstractController {

    #[Route('/', name: 'Home')]
    public function index(): void {
        self::setHeader('title', 'Accueil');
        self::rendererViews('home/index.php', ['controller_name' => 'HomeController@index']);
    }

    #[Route('/test', name: 'Test')]
    public function test(): void {
        self::setHeader('title', 'Test','sayHello');
        self::rendererViews('home/test.php', ['controller_name' => 'HomeController@test']);
    }
}
