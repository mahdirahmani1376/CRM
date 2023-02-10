<?php

namespace Tests\Feature;

use Tests\BaseTestCase\BaseTestCase;

class ClientControllerTest extends BaseTestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
