<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AlertBadUserNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateDangerUserTest extends TestCase
{
	use RefreshDatabase;

	private $name = 'danger_people';
    private $cedula = '400-40401487';


    /** @test */
    function admins_can_register_danger_users()
    {
    	$this->withoutExceptionHandling();

    	Notification::fake();

    	$admin = factory(User::class)->create();

    	factory(User::class)->times(10)->create();

    	$response = $this->actingAs($admin)
    		->post(route('bad.user'), [
    			'name' => $this->name,
    			'id_card' => $this->cedula
    	]);


    	$response->assertStatus(302)->assertRedirect('/');

    	$this->assertDatabaseHas('bad_users', [
    		'name' => $this->name,
    		'id_card' => $this->cedula
    	]);

    	 Notification::assertSentTo(
            [User::all()], AlertBadUserNotification::class
        );
    } 
}
