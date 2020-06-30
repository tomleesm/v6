<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
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
        $user = new User();
        $user->name = 'Tom';
        $user->email = 'tomleesm@gmail.com';
        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $user->save();

        $this->assertDatabaseHas('users', [
            'name' => 'Tom',
            'email' => 'tomleesm@gmail.com',
        ]);

        $this->assertSame(1, User::all()->count());
    }

    // 完全一樣的兩個測試，因爲有 RefreshDatabase trait ，所以執行完一個測試後，保證清空資料
    public function testRefreshDatabase2()
    {
        $user = new User();
        $user->name = 'Tom';
        $user->email = 'tomleesm@gmail.com';
        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $user->save();

        $this->assertDatabaseHas('users', [
            'name' => 'Tom',
            'email' => 'tomleesm@gmail.com',
        ]);

        $this->assertSame(1, User::all()->count());
    }
}
