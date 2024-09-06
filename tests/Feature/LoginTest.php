<?php

namespace Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function test_successful_login_foo_service()
    {
        $content = [
            "login" => "FOO_1",
            "password" => "foo-bar-baz"
        ];
        $response = $this->postJson('api/login', $content);

        $response->assertJson([
            "status" => "success",
            "token" => "eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJsb2dpbiI6IkZPT18xIiwiY29udGV4dCI6IkZPTyIsImlhdCI6MTUxNjIzOTAyMn0.iRI3_03RH4QaJFFDa8GQNz4JiBMketUk9rAr8QSLacKnql3pUx6PR-AP_u0qD8AzHn90rnq40aCfA6CwPXKKsw"
        ]);
        $response->assertStatus(200);
    }

    public function test_successful_login_bar_service()
    {
        $content = [
            "login" => "BAR_1234",
            "password" => "foo-bar-baz"
        ];
        $response = $this->postJson('api/login', $content);

        $response->assertJson([
            "status" => "success",
            "token" => "eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJsb2dpbiI6IkJBUl8xMjM0IiwiY29udGV4dCI6IkJBUiIsImlhdCI6MTUxNjIzOTAyMn0.q1CN4C-WlTAsUV9NcnoCbur9Cds-S8EkPut5cuTdepJlhmg5n-GdxMFev8DWu0Kb2D3xHDLThaLvoKHMPcEc4g"
        ]);
        $response->assertStatus(200);
    }

    public function test_successful_login_baz_service()
    {
        $content = [
            "login" => "BAZ_testlogin",
            "password" => "foo-bar-baz"
        ];
        $response = $this->postJson('api/login', $content);

        $response->assertJson([
            "status" => "success",
            "token" => "eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJsb2dpbiI6IkJBWl90ZXN0bG9naW4iLCJjb250ZXh0IjoiQkFaIiwiaWF0IjoxNTE2MjM5MDIyfQ.bO0QgwSuXHZ7ssZQZhxIiM5wQf_M_YmCaauQpuGPpOUE_NK_cuL1ar7cqLPeOOhpocJzhv4EG8S3aiZATbBypw"
        ]);
        $response->assertStatus(200);
    }

    public function test_failed_login_no_body()
    {
        $response = $this->post('api/login');

        $response->assertJson([
            'status' => 'failure',
        ]);
        $response->assertStatus(401);
    }

    public function test_failed_login_wrong_login()
    {
        $content = [
            "login" => "Foo_1",
            "password" => "foo-bar-baz"
        ];
        $response = $this->postJson('api/login', $content);

        $response->assertJson([
            'status' => 'failure',
        ]);
        $response->assertStatus(401);
    }

    public function test_failed_login_foo_wrong_password()
    {
        $content = [
            "login" => "FOO_1",
            "password" => "foo-bar-ba"
        ];
        $response = $this->postJson('api/login', $content);

        $response->assertJson([
            'status' => 'failure',
        ]);
        $response->assertStatus(401);
    }

    public function test_failed_login_bar_wrong_password()
    {
        $content = [
            "login" => "BAR_1",
            "password" => "foo-bar-ba"
        ];
        $response = $this->postJson('api/login', $content);

        $response->assertJson([
            'status' => 'failure',
        ]);
        $response->assertStatus(401);
    }

    public function test_failed_login_baz_wrong_password()
    {
        $content = [
            "login" => "BAZ_1",
            "password" => "foo-bar-ba"
        ];
        $response = $this->postJson('api/login', $content);

        $response->assertJson([
            'status' => 'failure',
        ]);
        $response->assertStatus(401);
    }

}
