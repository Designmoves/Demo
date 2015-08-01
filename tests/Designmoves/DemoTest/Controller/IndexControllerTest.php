<?php
/**
 * Designmoves (http://www.designmoves.nl)
 *
 * @copyright Copyright (c) 2015, Designmoves (http://www.designmoves.nl)
 * @license   http://code.designmoves.nl/licence/new-bsd New BSD License
 */

namespace Designmoves\DemoTest\Controller;

use Designmoves\Demo\Controller\IndexController;
use PHPUnit_Framework_TestCase;
use Zend\Http\Request as HttpRequest;
use Zend\Http\Response as HttpResponse;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\RouteMatch;

/**
 * @coversDefaultClass Designmoves\Demo\Controller\IndexController
 */
class IndexControllerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var IndexController
     */
    protected $controller;

    /**
     * @var HttpRequest
     */
    protected $request;

    /**
     * @var HttpResponse
     */
    protected $response;

    /**
     * @var RouteMatch
     */
    protected $routeMatch;

    /**
     * @var MvcEvent
     */
    protected $event;

    public function setUp()
    {
        $this->controller = new IndexController();
        $this->request    = new HttpRequest();
        $this->routeMatch = new RouteMatch(array());
        $this->event      = new MvcEvent();
        $this->event->setRouteMatch($this->routeMatch);
        $this->controller->setEvent($this->event);
    }

    public function testIndexAction()
    {
        $result = $this->dispatchAction('index');
        $this->assertNull($result);

        // Check the HTTP response code
        $response = $this->controller->getResponse();
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * @param  string $action
     * @param  array  $params
     * @return mixed
     */
    protected function dispatchAction($action, array $params = array())
    {
        $this->routeMatch->setParam('action', $action);

        foreach ($params as $name => $value) {
            $this->routeMatch->setParam($name, $value);
        }

        return $this->controller->dispatch($this->request);
    }
}
