<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;

class ExampleTest extends DuskTestCase
{
    use RefreshDatabase;
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

    public function testRefreshDatabase()
    {
        $user = factory(User::class)->create();
        $this->assertSame(1, User::all()->count());
    }

    // 完全一樣的兩個測試，因爲有 RefreshDatabase trait ，所以執行完一個測試後，保證清空資料
    public function testRefreshDatabase2()
    {
        $user = factory(User::class)->create();
        $this->assertSame(1, User::all()->count());
    }
}
