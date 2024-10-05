<?php

namespace App\Http\Controllers;
use App\Repositories\StudentsRepository;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
 private $studentsRepository;
 public function __construct(StudentsRepository $studentsRepository){
   $this -> studentsRepository = $studentsRepository;
 }

 public function index(){
   $students = $this -> studentsRepository-> index();
   return $students;
 }

 public function show($id){
   $student = $this -> studentsRepository->show($id);
   return $student;
 }
 public function create(){
    $createStudent = $this->studentsRepository->create();
    return $createStudent;
 }
 public function store(Request $request){
    $storeStudent = $this->studentsRepository->store($request);
    return  $storeStudent;
 }

 public function edit($id){
    $editStudent = $this->studentsRepository->edit($id);
    return $editStudent;
 }

 public function update(Request $request, $id){
   $updateStudent = $this->studentsRepository->update($request,$id);
   return $updateStudent;
 }

public function toggleSuspend(Request $request, $id){
  $toggleSuspend = $this->studentsRepository->toggleSuspend($request,$id);
  return $toggleSuspend;
}
 public function destroy($id){
    $destroyStudent = $this->studentsRepository->destroy($id);
    return $destroyStudent;
 }
}
