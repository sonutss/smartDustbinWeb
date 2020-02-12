<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class PickupController extends Controller
{
	public function pickup(Request $req){
		$val  = Session::get('auth_key');
	 	$data = $req->all();
	 	if(isset($data['list'])){
	 		//$arr 	= array('page'=>$data['page'],'perpage' =>$data['perpage'],'driverstatus'=>$data['driverstatus']);
			//$encode = json_encode($arr);
			$curl 	= curl_init();
		    curl_setopt_array($curl, array(
			    CURLOPT_URL 			=> env('API_URL').'group_dataDustbin',
			    CURLOPT_RETURNTRANSFER  => 1,
			    CURLOPT_ENCODING 		=> "",
			    CURLOPT_MAXREDIRS 		=> 10,
			    CURLOPT_TIMEOUT 		=> 30000,
			    CURLOPT_HTTP_VERSION 	=> CURL_HTTP_VERSION_1_1,
			    CURLOPT_CUSTOMREQUEST 	=> "GET",
			    //CURLOPT_POSTFIELDS 		=> $encode,
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
		    foreach ($decode['dustbinData'] as $key => $value) {	
		    	                   
		    	$html .= '<tr>
                                        <td><span class="text-success">'.$value['groupName'].'</span></td>
                                        <td>'.$value['dataassignDate'].'</td>
                                        <th>
                                            <a href="#" class="media-list-link ">
                                                <div class="pd-y-0-force pd-x-0-force media ">
                                                    <img src="./public/frontend/img/ic-truck.png" alt="">
                                                    <div class="media-body">
                                                    <div>
                                                        <p class="mg-b-0 tx-medium tx-gray-800 tx-13">'.$value['VehicleName'].'</p>
                                                    </div>
                                                    <p class="tx-12 tx-gray-600 mg-b-0">'.$value['VehicleRC'].'</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </th>     
                                        <td>
                                            <a href="#" class="media-list-link">
                                                <div class="media pd-y-0-force pd-x-0-force">
                                                    <img src="'.env('STORAGE_PATH').'drivers/'.$value['driverphoto'].'" alt="">
                                                    <div class="media-body">
                                                    <div>
                                                        <p class="mg-b-0 tx-medium tx-gray-800 tx-13">'.$value['driverName'].'</p>
                                                    </div>
                                                    <p class="tx-12 tx-gray-600 mg-b-0">'.$value['drivermobile'].'</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>                                   
                                        <td><span class="text-success">'.$value['datacount'].'</span></td>
                                        <td><span class="text-success"><button type="button" class="btn btn-danger" onclick="completedPickup('.$value['vehicleID'].')">Complete</button></span></td>
                                        <td>
                                            <a href="view-details/'.$value['groupName'].'"><button  class="btn btn-success btn-icon mg-b-10 btn-sm"><div><i class="fa fa-eye"></i></div></button></a>                                                     
                                        </td>
                                    </tr>';
		    

		  }    
		    //echo "<pre>";print_r($decode);die;
		    //$count = $decode['result']['totalpage'];
	     	$return = array('html'=> $html);
	     	//$return = array('count'=> $count, 'html'=> $html);
        	echo json_encode($return); exit ;
	 	} 	 
		return view('order');
	}
    public function pickup_create(Request $req){
    	$val  = Session::get('auth_key');
	 	$data = $req->all();
	 	if(isset($data['list'])){
			$curl 	= curl_init();
		    curl_setopt_array($curl, array(
			    CURLOPT_URL 			=> env('API_URL').'dustbinpickup',
			    CURLOPT_RETURNTRANSFER  => 1,
			    CURLOPT_ENCODING 		=> "",
			    CURLOPT_MAXREDIRS 		=> 10,
			    CURLOPT_TIMEOUT 		=> 30000,
			    CURLOPT_HTTP_VERSION 	=> CURL_HTTP_VERSION_1_1,
			    CURLOPT_CUSTOMREQUEST 	=> "GET",
			    //CURLOPT_POSTFIELDS 		=> $encode,
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
		    foreach ($decode['dustbinData'] as $key => $value) {

		    	$html.='<div class="row mg-t-20">
                            <div class="col-md-8">
                                <h6 class="tx-inverse"> Warehouse </h6>
                                <p class="lh-7">'.$value['warehousename'].'<br>'.$value['warehouseaddress'].'</p>
                            </div><!-- col -->
                            <div class="col-md-4">
                                <p class="d-flex justify-content-between mg-b-5">
                                    <span>Dustbin Today Count</span>
                                    <span>'.$value['NoofDustbin'].'</span>
                                </p>
                                <p class="d-flex justify-content-between mg-b-5">
                                    <span>Vehicle Used</span>
                                    <span>'.$value['novehicle'].'</span>
                                </p>
                            </div>
                        </div>
		    	 <div class="bd rounded table-responsive"><table class="table table-bordered mg-b-0">
                                <thead class="thead-colored thead-light">
                                    <tr>
                                        <th>
                                            <label class="ckbox mg-b-0">
                                                <input type="checkbox">
                                                <span></span>
                                            </label> 
                                        </th>
                                        <th>Dustbin Name</th>
                                        <th>GSM Number</th>
                                        <th>Distance</th>
                                        <th>Duration</th>
                                        <th>Data Percentage</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>';

		    	
		    	foreach ($value['data'] as $key1 => $val) {
		    	                   
		    	$html .= '<tr>
								 <td>
	                                <label class="ckbox">
	                                    <input type="checkbox" value="'.$val['id'].'" id="check" name="check[]">
	                                    <span></span>
	                                </label>                                           
	                            </td>
	                            <td>'.$val['name'].'</td>
	                            <td>'.$val['gsm_moblie_number'].'</td>
	                            <td>'.$val['distance'].'</td>                                       
	                            <td>'.$val['duration'].'</td>                                       
	                            <td><span class="text-danger">'.$val['data_percentage'].' %</span></td>
                                      
                         </tr>';
		    }
						$html.=' </tbody>
                            </table>
                              
                            </div>
                            <div class="form-layout-footer mg-t-30 tx-center">
                            <button class="btn btn-primary" onclick="getCheckData('.$value['WareHouseId'].');">Create</button>
                            <button class="btn btn-secondary">Cancel</button>
                        </div>';




		  }    
		    //echo "<pre>";print_r($decode);die;
		    //$count = $decode['result']['totalpage'];
	     	$return = array('html'=> $html);
	     	//$return = array('count'=> $count, 'html'=> $html);
        	echo json_encode($return); exit ;
	 	} 	 
    	return view('order-create');
    }
    public function pickup_details($groupName){
    	$val  = Session::get('auth_key');
		$curl = curl_init();
		    curl_setopt_array($curl, array(
			    CURLOPT_URL 			=> env('API_URL').'singleDatafetch',
			    CURLOPT_RETURNTRANSFER 	=> 1,
			    CURLOPT_ENCODING 		=> "",
			    CURLOPT_MAXREDIRS 		=> 10,
			    CURLOPT_TIMEOUT 		=> 30000,
			    CURLOPT_HTTP_VERSION 	=> CURL_HTTP_VERSION_1_1,
			    CURLOPT_CUSTOMREQUEST 	=> "POST",
			    CURLOPT_POSTFIELDS 		=> "groupid=$groupName",
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
		  	//dd($decode);
		    if($decode['success']=='1'){
		    	return view('pickup-details',compact('decode')); 
		    }
		    else{
		    	return false;
		    }	
    }

    public function getDataDustbin(){
    	return view ('dustbin-data');
    }
    public function pickup_history(){
    	return view ('pickup-history');
    }
}
