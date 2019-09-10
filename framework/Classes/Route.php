<?php

namespace Framework\Classes;

class Route
{

    /**
     * @var Container
     */
    protected $container;
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

    /**
     * Route constructor.
     * $uri, public/index.php de parse edilen url den geliyor.
     * @param string $uri
     */
    public function __construct(string $uri)
    {
        $this->incomingUrl = $uri;
    }

    /**
     * Genel route mekanizması burada çalışacak.
     * $action parametresi bir string ise, Controller@method
     * ilişkisini arayacak. Değilse ve bir Closure|callable ise
     * direkt olarak çağırılacak.
     *
     * @param string $pattern
     * @param $action
     */
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

    /**
     * Action, bir controller|string tipindeyse burası çalışacak
     * Burası ise, Ana Controller da varolan callAction u,
     * verilmiş olan controller için verilmiş olan methoda tetikleyecek.
     * Bu sebeple, her controller, \Framework\Classes\Controller'dan miras almak zorunda!!!.
     * @return mixed
     */
    public function runController()
    {
        [$method, $controller] = $this->prepareAction();

        // Controller ın tam uzantısını buluyor.
        $controller = $this->rootControllerDirectory($controller);

        if (class_exists($controller)) {
            return $this->dispatcher()->dispatch(
                $this->getController($controller), $method, []
            );
        }

    }

    /**
     * @return ControllerDispatcher
     */
    public function dispatcher(): ControllerDispatcher
    {
        return new ControllerDispatcher();
    }

    /**
     * Gerçek uzantısı verilen Controller ın instance'ını alıyor.
     *
     * @param string $className
     * @return mixed
     */
    protected function getController(string $className)
    {
        return $this->container->make($className);
    }

    /**
     * Sahte, instance maker sınıfını kendi içerisine alıyor.
     * Method, Controller isimlerini çözümlüyor.
     *
     * @return array
     */
    protected function prepareAction()
    {
        $this->container = ($this->container == null) ? new Container($this) : $this->container;
        $method = "";
        $controller = "";

        $exp = explode('@', $this->outComingAction);
        if (strpos($this->outComingAction, '@') !== false) {
            $method = $exp[1];
            $controller = $exp[0];
        }

        return [$method, $controller];
    }

    protected function rootControllerDirectory($nonRoot)
    {
        $defaultDirectoryForController = "App\Controllers\\";

        return $defaultDirectoryForController . $nonRoot;
    }

    public function urlMatched() : bool
    {
        return $this->outComingUrl == $this->incomingUrl;
    }

    public function get($route, $function)
    {

        if (strtolower($this->method()) == "get") {
            $this->run($route, $function);
        } else {
            header("HTTP/1.0 405 Method Not Allowed");
            $this->methodNotAllowed([
                'e' => "GET",
                'g' => $this->method()
            ]);
        }
    }

    protected function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @param array $others
     * @return MethodNotAllowed
     * @throws MethodNotAllowed
     */
    protected function methodNotAllowed(array $others): MethodNotAllowed
    {
        $message = printf("Method not allowed. Expected: %s, Given: %s",
        $others['e'], $others['g']);
        throw new MethodNotAllowed($message);
    }
}
