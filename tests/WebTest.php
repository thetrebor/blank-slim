<?php

class WebTest extends UriTestCase {

    protected $routes_file_path = 'lib/routes/web.php';

    public function testHomePage() {
        $response = $this->get('/');
        $this->assertEquals(200,$this->response->status());
        $this->assertEquals('This is a template.',$response);
    }
}
