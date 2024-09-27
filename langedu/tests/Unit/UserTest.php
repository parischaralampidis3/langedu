<?php

namespace Tests\Unit;
 use Tests\TestCase;
use App\Models\User;
use App\Models\Students;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;



class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic unit test example.
     * @test
     */
    public function test_a_user_has_many_students(): void
    {
        $user = User::factory()->create();
        $student = Students::factory()->create(['user_id' => $user->id]);
        
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $user->students);
        $this->assertTrue($user->students->contains($student));
    }
}
