<?php

class UriTestCase extends PHPUnit_Framework_TestCase {

    protected $routes_file_path;

    public function setUp() {
        $app = new \Slim\Slim(array(
                'mode' => 'testing',
        ));
        require_once  $this->routes_file_path;
        $this->app = $app;

    }
    protected function get($path,$options = array()) {
       return $this->request('GET',$path,$options);
    }
    protected function request($method,$path,$options = array()){

        ob_start();
        // Prepare a mock environment
        Slim\Environment::mock(array_merge(array(
            'REQUEST_METHOD' => $method,
            'PATH_INFO'      => $path,
        ), $options));
        $this->request = $this->app->request();
        $this->response = $this->app->response();
        $this->app->run();
        return ob_get_clean();
    }
}
