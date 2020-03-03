<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class MappingController extends Controller
{
    public function mappingVehicledriver(Request $req){
    	$val  = Session::get('auth_key');
		//dd($val);
	 	$data = $req->all();
	 	if(isset($data['list'])){
	 		//echo 'sadasd'; exit;
	 		$arr =array('page'=>$data['page'],'perpage' =>$data['perpage']);
			$encode = json_encode($arr);
			$curl = curl_init();
		    curl_setopt_array($curl, array(
			    CURLOPT_URL => env('API_URL').'vehiclelistforassignnew',
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_ENCODING => "",
			    CURLOPT_MAXREDIRS => 10,
			    CURLOPT_TIMEOUT => 30000,
			    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			    CURLOPT_CUSTOMREQUEST => "POST",
			    CURLOPT_POSTFIELDS => $encode,
			    CURLOPT_HTTPHEADER => array(
			    // Set here requred headers
			       //"accept: */*",
			        "accept-language: en-US,en;q=0.8",
			        "content-type: application/json",
			        "Access-Control-Allow-Origin: http://192.168.0.150:3002",
			        "Authorization: $val",

			    ),
	    	) );
	    	$response = curl_exec($curl);
		    $err = curl_error($curl);
		    curl_close($curl);
		    $decode = json_decode($response,true);
		    $html = '';
		    //dd($decode);
		    foreach ($decode['result']['data'] as $key => $value) {
		    	// if( $value['status'] == 1 ){
       //              $status = '<span class="text-success">Active</span>' ;
       //          } else {
       //             	$status = '<span class="text-danger">Inactive</span>' ;
       //          }
       //          if( $value['available_status'] == 1 ){
       //              $avaiable = '<span class="text-success">Available</span>' ;
       //          } else {
       //              $avaiable = '<span class="text-danger">Unavailable</span>' ;
       //          }
                    
		    	$html .= '<div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                    <div class="card  ht-100p pd-25 bd">
                                        <div class="row">
                                            <div class="col-lg-6 ">
                                                <a href="#" class="media-list-link">
                                                    <div class="pd-y-0-force pd-x-0-force media">
                                                        <img src="./public/frontend/img/ic-truck.png" alt="">
                                                        <div class="media-body">
                                                            <div>
                                                                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">'.$value['model_name'].'</p>
                                                            </div>
                                                            <p class="tx-12 tx-gray-600 mg-b-0">'.$value['vehicle_rc'].'</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-lg-6">
                                                <a onclick="right_slide(this);" style="cursor:pointer;" class="media-list-link float-right pos-relative" data-val="'.$value['VehicleID'].'">
                                                    <div class="media pd-y-0-force pd-x-0-force">
                                                        <img src="./public/frontend/img/ic-02.png" alt="">
                                                        <div class="media-body">
                                                            <div>
                                                                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Driver Name</p>
                                                            </div>
                                                            <p class="tx-12 tx-gray-600 mg-b-0">No number</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
		    }
		    //echo "<pre>";print_r($decode);die;
		    $count = $decode['result']['totalpage'];
	     	$return = array('count'=> $count, 'html'=> $html);
        	echo json_encode($return); exit ;
	 	}
    	return view('mapping');
    }
    public function driver_not_assign(Request $req){
    	$val  = Session::get('auth_key');
		//dd($val);
	 	$data = $req->all();
	 	if(isset($data['list'])){
	 		//echo 'sadasd'; exit;
	 		$arr =array('page'=>$data['page'],'perpage' =>$data['perpage']);
			$encode = json_encode($arr);
			$curl = curl_init();
		    curl_setopt_array($curl, array(
			    CURLOPT_URL => env('API_URL').'drivernotassignlist',
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_ENCODING => "",
			    CURLOPT_MAXREDIRS => 10,
			    CURLOPT_TIMEOUT => 30000,
			    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			    CURLOPT_CUSTOMREQUEST => "POST",
			    CURLOPT_POSTFIELDS => $encode,
			    CURLOPT_HTTPHEADER => array(
			    // Set here requred headers
			       //"accept: */*",
			        "accept-language: en-US,en;q=0.8",
			        "content-type: application/json",
			        "Access-Control-Allow-Origin: http://192.168.0.150:3002",
			        "Authorization: $val",

			    ),
	    	) );
	    	$response = curl_exec($curl);
		    $err = curl_error($curl);
		    curl_close($curl);
		    $decode = json_decode($response,true);
		    $html = '';
		    foreach ($decode['result']['data'] as $key => $value) {   
		    	$html .= '<div class="d-flex" id="'.$key.'" onclick="selectedrow(this,'.$value['id'].')">
                                <div class="pos-relative">
                                    <img src="./public/frontend/img/img2.jpg" alt="">
                                    <div class="contact-status-indicator bg-success"></div>
                                </div>

                                <div class="contact-person">
                                    <p>'.$value['name'].'</p>
                                    <span>'.$value['mobile_no'].'</span>
                                </div>
                            </div>';
		    }
		    //echo "<pre>";print_r($decode);die;
		    $count = $decode['result']['totalpage'];
	     	$return = array('count'=> $count, 'html'=> $html);
        	echo json_encode($return); exit ;
	 	}
    	return view('mapping');
    }
    public function warehouseVehicleMapping(Request $req){
    	$val  = Session::get('auth_key');
		//dd($val);
	 	$data = $req->all();
	 	if(isset($data['list'])){
	 		//echo 'sadasd'; exit;
	 		$arr =array('page'=>$data['page'],'perpage' =>$data['perpage']);
			$encode = json_encode($arr);
			$curl = curl_init();
		    curl_setopt_array($curl, array(
			    CURLOPT_URL => env('API_URL').'wherehousemappedList',
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_ENCODING => "",
			    CURLOPT_MAXREDIRS => 10,
			    CURLOPT_TIMEOUT => 30000,
			    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			    CURLOPT_CUSTOMREQUEST => "POST",
			    CURLOPT_POSTFIELDS => $encode,
			    CURLOPT_HTTPHEADER => array(
			    // Set here requred headers
			       //"accept: */*",
			        "accept-language: en-US,en;q=0.8",
			        "content-type: application/json",
			        "Access-Control-Allow-Origin: http://192.168.0.150:3002",
			        "Authorization: $val",

			    ),
	    	) );
	    	$response = curl_exec($curl);
		    $err = curl_error($curl);
		    curl_close($curl);
		    $decode = json_decode($response,true);
		    $html = '';
		    foreach ($decode['result']['data'] as $key => $value) {    
		    	
		    	$html .= '<div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                    <div class="card  ht-100p pd-25 bd">
                                        <div class="row">
                                            <div class="col-lg-6 ">
                                                <a href="#" class="media-list-link ">
                                                    <div class="pd-y-0-force pd-x-0-force media ">
                                                        <img src="./public/frontend/img/ic-3.png" alt="">
                                                        <div class="media-body">
                                                            <div>
                                                                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">'.$value['name'].'</p>
                                                            </div>
                                                            <p class="tx-12 tx-gray-600 mg-b-0">'.$value['address'].'</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-lg-6">
                                                <a onclick="right_slide(this);" href="#" class="media-list-link float-right pos-relative" data-val="'.$value['id'].'">
                                                    <div class="media pd-y-0-force pd-x-0-force">
                                                        <img src="./public/frontend/img/ic-truck.png" alt="">
                                                        <div class="media-body">
                                                            <div>
                                                                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">No. of Vehicle</p>
                                                            </div>
                                                            <p class="tx-12 tx-gray-600 mg-b-0">'.$value['total'].'</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
		    }
		    //echo "<pre>";print_r($decode);die;
		    $count = $decode['result']['totalpage'];
	     	$return = array('count'=> $count, 'html'=> $html);
        	echo json_encode($return); exit ;
	 	}
    	return view('warehouse-vehicle-mapping');
    }
     public function vehicle_not_assign(Request $req){
    	$val  = Session::get('auth_key');
		//dd($val);
	 	$data = $req->all();
	 	if(isset($data['list'])){
	 		//echo 'sadasd'; exit;
	 		$arr =array('page'=>$data['page'],'perpage' =>$data['perpage']);
			$encode = json_encode($arr);
			$curl = curl_init();
		    curl_setopt_array($curl, array(
			    CURLOPT_URL => env('API_URL').'vehiclenotassign',
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_ENCODING => "",
			    CURLOPT_MAXREDIRS => 10,
			    CURLOPT_TIMEOUT => 30000,
			    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			    CURLOPT_CUSTOMREQUEST => "POST",
			    CURLOPT_POSTFIELDS => $encode,
			    CURLOPT_HTTPHEADER => array(
			    // Set here requred headers
			       //"accept: */*",
			        "accept-language: en-US,en;q=0.8",
			        "content-type: application/json",
			        "Access-Control-Allow-Origin: http://192.168.0.150:3002",
			        "Authorization: $val",

			    ),
	    	) );
	    	$response = curl_exec($curl);
		    $err = curl_error($curl);
		    curl_close($curl);
		    $decode = json_decode($response,true);
		    $html = '';
		    foreach ($decode['result']['data'] as $key => $value) {   
		    	$html .= '<div class="d-flex">
                                <label class="ckbox mg-b-0">
                                    <input type="checkbox" value="'.$value['id'].'" name="check_veh[]"><span></span>
                                </label>
                                <div class="pos-relative">
                                    <img src="./public/frontend/img/ic-truck.png" alt="">
                                    <div class="contact-status-indicator bg-success"></div>
                                </div>
                                <div class="contact-person">
                                    <p>'.$value['model_name'].'</p>
                                    <span>'.$value['vehicle_rc'].'</span>
                                </div>
                            </div>';
		    }
		    //echo "<pre>";print_r($decode);die;
		    $count = $decode['result']['totalpage'];
	     	$return = array('count'=> $count, 'html'=> $html);
        	echo json_encode($return); exit ;
	 	}
    	return view('mapping');
    }
}
