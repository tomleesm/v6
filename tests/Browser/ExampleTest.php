<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;

class ExampleTest extends DuskTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate:fresh --seed');
        echo 'setUp()' . PHP_EOL;
    }
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });
    }

    public function testRegister()
    {
        $this->browse(function (Browser $browser) {
            $user = factory(User::class)->make();
            $user->password = Str::random(10);

            $browser->visit('/')
                    ->clickLink('Register')
                    ->type('name', $user->name)
                    ->type('email', $user->email)
                    ->type('password', $user->password)
                    ->type('password_confirmation', $user->password)
                    ->press('Register')
                    ->assertPathIs('/home');
        });
    }
    public function testRegister2()
    {
        $this->browse(function (Browser $browser) {
            $user = factory(User::class)->make();
            $user->password = Str::random(10);

            $browser->visit('/')
                    ->clickLink('Register')
                    ->type('name', $user->name)
                    ->type('email', $user->email)
                    ->type('password', $user->password)
                    ->type('password_confirmation', $user->password)
                    ->press('Register')
                    ->assertPathIs('/home');
        });
    }
}
