<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Pets;

class PetsController extends Controller
{
  public function getPets(){
    $pets = Pets::getPets(100);
    if($pets->isNotEmpty()){
      return response()->json($pets,200,[],JSON_PRETTY_PRINT);
    }else{
      $response = $response = $this->response(1,'Fail','unexpected error');
      return response()->json($response,200,[],JSON_PRETTY_PRINT);
    }
  }

  public function createPet(Request $request){
    $validator = \Validator::make($request->all(), [
      'name' => 'required|max:50',
    ]);

    if ($validator->fails()) {
      $response = $response = $this->response(2,'Validated fail',$validator->errors());
      return response()->json($response,200,[],JSON_PRETTY_PRINT);
    }
    DB::beginTransaction();
    try {
      $pet = Pets::createPet($request->name,'pets');
      DB::commit();
      $response = $response = $this->response(200,'Create a pet',$pet);
      return response()->json($response,200,[],JSON_PRETTY_PRINT);
    } catch (\Exception $e) {
      $response = $this->response(3,'Fail','unexpected error');
      return response()->json($response,201,[],JSON_PRETTY_PRINT);
    }
  }
  public function getPet($id){
    $pet = Pets::find($id);
    if($pet){
      $response = $this->response(200,'Pet find by id: '.$id,$pet);
      return response()->json($response,200,[],JSON_PRETTY_PRINT);
    }
    $response = $this->response(404,'Pet not found',$pet);
    return response()->json($response,404,[],JSON_PRETTY_PRINT);
  }

  private function response($code,$status,$response){
    return $response = [
      'code' => $code,
      'status' => $status,
      'response' => $response
    ];
  }
}
