<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class DriverController extends Controller
{
    public function driverList(Request $req){
    	$val  = Session::get('auth_key');
	 	$data = $req->all();
	 	if(isset($data['list'])){
	 		$arr 	= array('page'=>$data['page'],'perpage' =>$data['perpage'],'driverstatus'=>$data['driverstatus']);
			$encode = json_encode($arr);
			$curl 	= curl_init();
		    curl_setopt_array($curl, array(
			    CURLOPT_URL 			=> env('API_URL').'driverlist',
			    CURLOPT_RETURNTRANSFER  => 1,
			    CURLOPT_ENCODING 		=> "",
			    CURLOPT_MAXREDIRS 		=> 10,
			    CURLOPT_TIMEOUT 		=> 30000,
			    CURLOPT_HTTP_VERSION 	=> CURL_HTTP_VERSION_1_1,
			    CURLOPT_CUSTOMREQUEST 	=> "POST",
			    CURLOPT_POSTFIELDS 		=> $encode,
			    CURLOPT_HTTPHEADER 		=> array(
			    // Set here requred headers
			       //"accept: */*",
			        "accept-language: en-US,en;q=0.8",
			        "content-type: application/json",
			        "Access-Control-Allow-Origin: http://192.168.0.150:3002",
			        "Authorization: $val",

			    ),
	    	) );
	    	$response 	= curl_exec($curl);
		    $err 		= curl_error($curl);
		    curl_close($curl);
		    $decode 	= json_decode($response,true);
		    //echo "<pre>";print_r($decode);die;
		    $html 		= '';
		    foreach ($decode['result']['data'] as $key => $value) {
		    	if( $value['status'] == 1 ){
                    $status = '<span class="text-success">Active</span>' ;
                } else {
                   	$status = '<span class="text-danger">Inactive</span>' ;
                }        
		    	$html .= '<tr>
                    <th>
                        <a href="#" class="media-list-link ">
                            <div class="pd-y-0-force pd-x-0-force media ">
                                <img src="img/ic-truck.png" alt="">
                                <div class="media-body">
                                <div>
                                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">'.$value['name'].'</p>
                                </div>
                                </div>
                            </div>
                        </a>
                    </th>
                    <td>
                        <a href="#" class="media-list-link">
                            <div class="media pd-y-0-force pd-x-0-force">
                                <img src="img/img4.jpg" alt="">
                                <div class="media-body">
                                <div>
                                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">'.$value['email'].'</p>
                                </div>
                        
                                </div>
                            </div>
                        </a>
                    </td>
                    <td>
                        <a href="#" class="media-list-link">
                            <div class="media pd-y-0-force pd-x-0-force">
                                <img src="img/img4.jpg" alt="">
                                <div class="media-body">
                                <div>
                                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">'.$value['mobile_no'].'</p>
                                </div>
                                </div>
                            </div>
                        </a>
                    </td>
                    <td>'.$value['app_user_id'].'</td>
                    <td>'.$value['c_address'].'</td>
                    <td>'.$status.'</td>
                    <td>
                        <a href="edit-driver/'.$value['id'].'"><button  class="btn btn-success btn-icon mg-b-10 btn-sm"><div><i class="fa fa-edit"></i></div></button></a>                                            
                        <a href="view-driver/'.$value['mobile_no'].'"><button  class="btn btn-success btn-icon mg-b-10 btn-sm"><div><i class="fa fa-eye"></i></div></button></a>                                            
                        <a href="delete-driver/'.$value['id'].'"><button  class="btn btn-danger btn-icon mg-b-10 btn-sm"><div><i class="fa fa-trash"></i></div></button></a>                                            
                    </td>
                </tr>';
		    }
		    //echo "<pre>";print_r($decode);die;
		    $count = $decode['result']['totalpage'];
	     	$return = array('count'=> $count, 'html'=> $html);
        	echo json_encode($return); exit ;
	 	} 	 
    	return view('driver');
    }
    public function addDriver(){
    	return view('driver-add');
    }
    public function editDriver($did){
    	$val  = Session::get('auth_key');
		$curl = curl_init();
		    curl_setopt_array($curl, array(
			    CURLOPT_URL 			=> env('API_URL').'driverDetails',
			    CURLOPT_RETURNTRANSFER 	=> 1,
			    CURLOPT_ENCODING 		=> "",
			    CURLOPT_MAXREDIRS 		=> 10,
			    CURLOPT_TIMEOUT 		=> 30000,
			    CURLOPT_HTTP_VERSION 	=> CURL_HTTP_VERSION_1_1,
			    CURLOPT_CUSTOMREQUEST 	=> "POST",
			    CURLOPT_POSTFIELDS 		=> "did=$did",
			    CURLOPT_HTTPHEADER 		=> array(
			    // Set here requred headers
			       //"accept: */*",
			        "accept-language: en-US,en;q=0.8",
			        "content-type: application/x-www-form-urlencoded",
			        "Access-Control-Allow-Origin: http://192.168.0.150:3002",
			        "Authorization: $val",
			    ),
	    	) );
	    	$response = curl_exec($curl);
		    $err 	  = curl_error($curl);
		    curl_close($curl);
		    $decode   = json_decode($response,true);
		    //echo "<pre>";print_r($decode['result']['id']);die;
		    if($decode['success']=='1'){
		    	return view('driver-edit',compact('decode')); 
		    }
		    else{
		    	return false;
		    }	
    }
    public function deleteDriver($did){
    	$val  = Session::get('auth_key');
		$curl = curl_init();
		    curl_setopt_array($curl, array(
			    CURLOPT_URL 			=> env('API_URL').'driverDelete',
			    CURLOPT_RETURNTRANSFER 	=> 1,
			    CURLOPT_ENCODING 		=> "",
			    CURLOPT_MAXREDIRS 		=> 10,
			    CURLOPT_TIMEOUT 		=> 30000,
			    CURLOPT_HTTP_VERSION 	=> CURL_HTTP_VERSION_1_1,
			    CURLOPT_CUSTOMREQUEST 	=> "DELETE",
			    CURLOPT_POSTFIELDS 		=> "did=$did",
			    CURLOPT_HTTPHEADER 		=> array(
			    // Set here requred headers
			       //"accept: */*",
			        "accept-language: en-US,en;q=0.8",
			        "content-type: application/x-www-form-urlencoded",
			        "Access-Control-Allow-Origin: http://192.168.0.150:3002",
			        "Authorization: $val",
			    ),
	    	) );
	    	$response = curl_exec($curl);
		    $err 	  = curl_error($curl);
		    curl_close($curl);
		    $decode   = json_decode($response,true);
		    if($decode['success']=='1'){
		    	return redirect()->route('driver-list'); 
		    }
		    else{
		    	return false;
		    }
    }
     public function viewDriver($mobile_no){
    	$val  = Session::get('auth_key');
		$curl = curl_init();
		    curl_setopt_array($curl, array(
			    CURLOPT_URL 			=> env('API_URL').'driverDetailswithall',
			    CURLOPT_RETURNTRANSFER 	=> 1,
			    CURLOPT_ENCODING 		=> "",
			    CURLOPT_MAXREDIRS 		=> 10,
			    CURLOPT_TIMEOUT 		=> 30000,
			    CURLOPT_HTTP_VERSION 	=> CURL_HTTP_VERSION_1_1,
			    CURLOPT_CUSTOMREQUEST 	=> "POST",
			    CURLOPT_POSTFIELDS 		=> "mobileno=$mobile_no",
			    CURLOPT_HTTPHEADER 		=> array(
			    // Set here requred headers
			       //"accept: */*",
			        "accept-language: en-US,en;q=0.8",
			        "content-type: application/x-www-form-urlencoded",
			        "Access-Control-Allow-Origin: http://192.168.0.150:3002",
			        "Authorization: $val",
			    ),
	    	) );
	    	$response = curl_exec($curl);
		    $err 	  = curl_error($curl);
		    curl_close($curl);
		    $decode   = json_decode($response,true);
		   //echo "<pre>";print_r($decode['result']);die;
		    if($decode['success']=='1'){
		    	return view('driver-details',compact('decode')); 
		    }
		    else{
		    	return false;
		    }	
    }
}
