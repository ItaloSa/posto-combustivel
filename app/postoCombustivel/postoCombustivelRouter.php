<?php

namespace app\postoCombustivel;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Exception as Exception;

use app\postoCombustivel\PostoCombustivelCtrl as PostoCombustivelCtrl;

class PostoCombustivelRouter {
    private $app;

    public function __construct(\Slim\App $app) {
        $this->app = $app;
        $this->post();
        $this->get();
        $this->update();
        $this->delete();
    }

    private function post() {
        $this->app->group('/postosCombustiveis', function () {
            $this->post('', function (Request $request, Response $response) {
                $postoCombustivelCtrl = new PostoCombustivelCtrl();
                try {
                    $postoCombustivel = $postoCombustivelCtrl->create($request->getParsedBody());
                    return $response->withJson($posto->json(), 201);
                } catch (Exception $e) {
                    return $response->withJson(["Error" => $e->getMessage()], 400);
                }
            });
        });
    }

    private function get() {
        $this->app->group('/postosCombustiveis', function () {
            $this->get('', function (Request $request, Response $response, array $args) {
                $postoCombustivelCtrl = new PostoCombustivelCtrl();
                try {
                    $postosCombustiveis = $postoCombustivelCtrl->getAll();
                    return $response->withJson($postosCombustiveis, 200);
                } catch (Exception $e) {
                    if ($e->getCode() == 404) {
                        return $response->withJson(["Error" => $e->getMessage()], 404);
                    } else {
                        return $response->withJson(["Error" => $e->getMessage()], 400);
                    }
                }
            });
        });
    }

    private function update() {
        $this->app->group('/postosCombustiveis', function () {
            $this->put('/{posto}', function (Request $request, Response $response, array $args) {
                $postoCombustivelCtrl = new PostoCombustivelCtrl();
                try {
                    $postoCombustivel = $postoCombustivelCtrl->update($args['posto'], $request->getParsedBody());
                    return $response->withJson($postoCombustivel->json(), 200);
                } catch (Exception $e) {
                    if ($e->getCode() == 404) {
                        return $response->withJson(["Error" => $e->getMessage()], 404);
                    } else {
                        return $response->withJson(["Error" => $e->getMessage()], 400);
                    }
                }
            });
        });
    }

    private function delete() {
        $this->app->group('/postosCombustiveis', function () {
            $this->delete('/{posto}', function (Request $request, Response $response, array $args) {
                $postoCombustivelCtrl = new PostoCombustivelCtrl();
                try {
                    $postoCombustivelCtrl->delete($args['posto']);
                    return $response->withStatus(200);
                } catch (Exception $e) {
                    if ($e->getCode() == 404) {
                        return $response->withJson(["Error" => $e->getMessage()], 404);
                    } else {
                        return $response->withJson(["Error" => $e->getMessage()], 400);
                    }
                }
            });
        });
    }

}    