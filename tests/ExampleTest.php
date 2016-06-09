<?php
use App\User;
use App\Task;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
class ExampleTest extends TestCase
{
    use DatabaseTransactions;
    public function test_i_am_redirect_to_login_if_i_try_to_view_Profile()
    {
        $this->visit('/home')->see('Login');
    }
    public function test_i_can_submit_a_serviceinfo()
    {
        $this->visit('/serviceRegister')
            ->type('A service', 'name')
            ->select('1', 'location')
            ->select('1', 'type')
            ->type('123', 'license')
            ->type('a address','address')
            ->type('123456', 'contact')
            ->type('taylor@laravel.com', 'email')
            ->press('Submit')
            ->seePageIs('/serviceRegister')
            ->seeInDatabase('services', ['name' => 'A service']);
    }

}