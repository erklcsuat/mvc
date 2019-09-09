<?php

namespace Framework\Classes;

class Route
{

    /**
     * @var string
     */
    protected $incomingUrl = "";
    /**
     * @var string
     */
    protected $outComingUrl = "";
    /**
     * @var callable|string
     */
    protected $outComingAction;

    public function __construct(string $uri)
    {
        $this->incomingUrl = $uri;
    }

    public function run(string $pattern, $action)
    {

        $this->prepare($pattern, $action);

        if ($this->urlMatched()) {

            if (is_string($action)) {
                $this->runController();
            }

            $this->runCallable();
        }
    }

    protected function prepare(string $pattern, $action): void
    {
        $this->outComingUrl = $pattern;
        $this->outComingAction = $action;
    }

    public function runCallable(): void
    {
        \Closure::fromCallable($this->outComingAction)->call($this);
    }

    public function runController(): void
    {

    }

    public function urlMatched() : bool
    {
        return $this->outComingUrl == $this->incomingUrl;
    }


//    public static $validRoutes = array();

    public function get($route, $function)
    {
//        self::$validRoutes[] = $route;

        if (strtolower($_SERVER['REQUEST_METHOD']) == "get") {
            $this->run($route, $function);
        }

//        if($_SERVER['REQUEST_URI'] == $route)
//        {
//            $function->__invoke();
//        }
    }
}
