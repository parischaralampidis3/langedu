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
            'user_id' => $student->user_id

        ]);
        $this->assertNotNull($student->id);
    }

    public function test_that_a_student_can_be_updated(){     
          $student = Students::factory()->create([
            'username' => 'test',
            'firstname' => 'testname',
            'lastname' => 'testsurname',
            'email' => 'testemail@test.com',
            'dob' => '2024-12-16',
        ]);

        $updated_student_data = [
            'username' => 'test2',
            'firstname' => 'testname2',
            'lastname' => 'testsurname2',
            'email' => 'testemail3@test.com',
            'dob' => '2024-12-18',
            'id' => 2
        ];
 

        $student->update($updated_student_data);

        $this->assertDatabaseHas('students',[
            'username' => 'test2',
            'firstname' => 'testname2',
            'lastname' => 'testsurname2',
            'email' => 'testemail3@test.com',
            'dob' => '2024-12-18',
            'id' => $student->id
        ]);
    }

    public function test_that_a_student_can_be_deleted(){
        $student = Students::factory()->create(['firstname' => 'John']);
        $this->assertDatabaseHas('students',[
            'id' => $student->id,
            'firstname'=>$student->firstname
        ]);

        $student->delete();
        $this->assertDatabaseMissing('students',['id' => $student->id]);

    }
}
