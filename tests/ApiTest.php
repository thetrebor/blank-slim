<?php


Class ApiTest extends UriTestCase {

    protected $routes_file_path = 'lib/routes/api.php';

    public function testApiLogin() {
        $response = $this->get('/api/v1/login');
        $this->assertEquals(200,$this->response->status());
        $this->assertEquals('/api/v1/login',$response);
    }


}
