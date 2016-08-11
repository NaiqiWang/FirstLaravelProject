<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Tagoal\Users\User;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function a_user_may_register_for_an_account_but_must_confirm_their_email_address()
    {
        $this->visit('register')
             ->type('JohnDoe', 'name')
             ->type('john@example.com', 'email')
             ->type('password', 'password')
             ->press('Register');
        // We should have an account - but one that is not yet confirmed/verified.
        $this->see('Please confirm your email address.')
             ->seeInDatabase('users', ['name' => 'JohnDoe', 'verified' => 0]);
        $user = User::whereName('JohnDoe')->first();
        // You can't login until you confirm your email address.
        $this->login($user)->see('Could not sign you in.');
        // Like this...
        $this->visit("register/confirm/{$user->token}")
             ->see('You are now confirmed. Please login.')
             ->seeInDatabase('users', ['name' => 'JohnDoe', 'verified' => 1]);
    }
}
