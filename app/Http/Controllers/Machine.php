<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use DB;
use App\machineCreate;

class Machine extends Controller
{
   public function add_machine(Request $request){

   	$machine_exists = machineCreate::where('id',$request->input('id'))->first();

   	if($machine_exists === null){
   	$machineCreate = new machineCreate();
   	$machineCreate-> make = $request->input('make');
   	$machineCreate-> category = $request->input('category');
   	$machineCreate-> model = $request->input('model');
   	$machineCreate-> vehicleID = $request->input('vehicleID');
   	$machineCreate-> rate = $request->input('rate');
   	$machineCreate-> unit = $request->input('unit');
   	// $machineCreate-> image = request->input('image');
   	if($request->hasFile('image')){
    		$file = $request->file('image');
    		$extension =time().'.'.$file->getClientOriginalExtension();
    		$destinationPath = public_path('/machines');
    		$file->move($destinationPath,$extension);
    		$machineCreate-> image = $extension;

    		echo $machineCreate-> image = $extension;
    	}
    	else{
    		$machineCreate->image='';
    	}

   	 		$machineCreate->save();

   	if ($machineCreate -> id > 0) {
				$response = [
					"status" => 1,
					"msg" => "new machine created"
				];
				return response()->json($response);
			} else {
				$response = [
					"status" => 0,
					"msg" => "failed to create new machine name"
				];
				return response()->json($response);
			}
		}
		else{
				$response = [
					"status" => 0,
					"msg" => "Machine already exists"
				];
				return response()->json($response);
			}
   	} 
}
