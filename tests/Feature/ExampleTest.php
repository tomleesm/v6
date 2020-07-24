<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Notification;
use App\User;
use App\Notifications\NotificationTest;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testMockingNotification()
    {
        Notification::fake();

        // Assert that no notifications were sent...
        Notification::assertNothingSent();

        $user = factory(User::class)->make();
        Notification::assertSentTo(
            $user, NotificationTest::class
        );
    }
}
