<?php
namespace AppControllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;


class DefaultController {

	private $renderer;

	public function __construct(){

		$this->renderer = new PhpRenderer(VIEW_PATH);

	}

	public function index(Request $request, Response $response){

		return $this->renderer->render($response, "default-page.php", []);

	}

}