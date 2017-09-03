<?php

namespace App\Http\Controllers;

use App\QRData;
use Exception;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

    	try{
	    	$code = mt_rand(100000,999999);
	    	QRData::create(['code' => $code, 'status' => 'NEW']);
	    	return view('welcome',compact('code'));
    	} catch(Exception $e){
    		return $this->index();
    	}
    }

    public function link(Request $request){

    	try{

	    	$this->validate($request,[
	    			'code' 	=> 'required|exists:q_r_datas,code',
	    			'value' => 'required',
	    		]);

	    	$update = QRData::where('code', $request->code)->first();
	    	$update->update([
		    			'value'	 => $request->value,
		    			'status' => 'USED'
	    			]);

	    	return $update;

    	} catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
    	}
    }

    public function show(Request $request){

    	try{

	    	$this->validate($request,['code' => 'required|exists:q_r_datas,code']);
		    return QRData::where('code', $request->code)->first();

	    } catch(Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
    	}
    }
}
