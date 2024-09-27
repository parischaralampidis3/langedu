<?php

namespace Tests\Unit;
use Tests\TestCase;
use App\Models\Students;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentTest extends TestCase
{ 
    use WithFaker,RefreshDatabase;
    /**
     * A basic unit test example.
     */

    public function test_that_students_can_be_displayed(){
        $students = Students::factory()->create();
        $this->assertDatabasehas(
     'students',[
            'id' => $students->id,
            'username' => $students->username,
            'firstname' => $students->firstname,
            'lastname' => $students->lastname,
            'email' => $students->email,
            'dob' => $students->dob,
            'is_active' => $students->is_active,
            'user_id' => $students->user_id
        ]);
    }

    public function test_a_single_student_can_be_displayed(){

        $student =  Students::factory()->create(['firstname' => 'John']);

        $findStudent = Students::find($student->id);
        
        $this->assertNotNull($findStudent);

        $this ->assertEquals($student->id, $findStudent->id);
        $this->assertEquals($student->firstname,$findStudent->firstname);
    }

    public function test_a_student_can_be_created(): void
    {

        $student =[
            'id' => 1,
            'username' => 'test',
            'firstname' => 'testname',
            'lastname' => 'testsurname',
            'email' => 'testemail@test',
            'dob' => '16-12-2024',
            'is_active' => 'True',
            'user_id' => 1
        ];
        $student = Students::factory()->create();

        $this->assertDatabaseHas('students',[
            'id' => $student->id,
            'username' => $student->username,
            'firstname' => $student->firstname,
            'lastname' => $student->lastname,
            'email' => $student->email,
            'dob' => $student->dob,
            'is_active' => $student->is_active,
            'user_id' => $student->user_id

        ]);
        $this->assertNotNull($student->id);
    }
}
