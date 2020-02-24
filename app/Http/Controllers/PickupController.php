<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;

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
		    $html 		= '';
		   //echo "<pre>";print_r($decode);die;
		    if(count($decode['finalData'])>0){
		    	foreach ($decode['finalData'] as $key => $value) {
		    	if($value['vehicleID'] == 0){
		    		$vehicleID = '<a href="#" class="media-list-link ">
                                                <div class="pd-y-0-force pd-x-0-force media ">
                                                    <img src="./public/frontend/img/ic-truck.png" alt="">
                                                    <div class="media-body">
                                                    <div>
                                                        <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Not Assigned</p>
                                                    </div>
                                                    
                                                    </div>
                                                </div>
                                            </a>';

		    		$driverID = '<a href="#" class="media-list-link ">
                                                <div class="pd-y-0-force pd-x-0-force media ">
                                                    <img src="./public/frontend/img/ic-truck.png" alt="">
                                                    <div class="media-body">
                                                    <div>
                                                        <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Not Assigned</p>
                                                    </div>
                                               
                                                    </div>
                                                </div>
                                            </a>';
                    $driverstatus = '<span class="text-danger">Not Assigned</span>';
		    	}else{
		    		$vehicleID = '<a href="#" class="media-list-link ">
                                                <div class="pd-y-0-force pd-x-0-force media ">
                                                    <img src="./public/frontend/img/ic-truck.png" alt="">
                                                    <div class="media-body">
                                                    <div>
                                                        <p class="mg-b-0 tx-medium tx-gray-800 tx-13">'.$value['VehicleName'].'</p>
                                                    </div>
                                                    <p class="tx-12 tx-gray-600 mg-b-0">'.$value['VehicleRC'].'</p>
                                                    </div>
                                                </div>
                                            </a>';
                    $driverID='<a href="#" class="media-list-link">
                                                <div class="media pd-y-0-force pd-x-0-force">
                                                    <img src="'.env('STORAGE_PATH').'drivers/'.$value['DriverPhoto'].'" alt="">
                                                    <div class="media-body">
                                                    <div>
                                                        <p class="mg-b-0 tx-medium tx-gray-800 tx-13">'.$value['Drivername'].'</p>
                                                    </div>
                                                    <p class="tx-12 tx-gray-600 mg-b-0">'.$value['Drivermobile'].'</p>
                                                    </div>
                                                </div>
                                            </a>';
                   // $driverstatus = '<span class="text-success"><button type="button" class="btn btn-success" onclick="completedPickup('.$value['vehicleID'].')">Assigned</button></span>';                        
                   $driverstatus = '<span class="text-success">Assigned</span>';                        
		    	}

		    	if($value['driverAblible'] == 0){
		    		$driverstatus = '<span class="text-danger">Not Assigned</span>';
		    		$pickup_assigned = '<button  class="btn btn-info btn-icon mg-b-10 btn-sm" title="Assign availabe vehicle" data-dustbincount="'.$value['datacount'].'" data-groupname="'.$value['groupName'].'"  onclick="openModalAvailable(this,'.$value['warehouseID'].',1)"><div><i class="fa fa-check"></i></div></button>';
		    	}elseif ($value['driverAblible'] == 1) {
		    		$driverstatus = '<span class="text-warning">Assigned</span>';
		    		$pickup_assigned = '<button  class="btn btn-success btn-icon mg-b-10 btn-sm" title="Re-assign availabe vehicle" data-dustbincount="'.$value['datacount'].'" data-groupname="'.$value['groupName'].'" " data-indexval="'.$key.'"  onclick="openModalAvailable(this,'.$value['warehouseID'].',1)"><div><i class="fa fa-check"></i></div></button>';
		    	}else{
		    		$driverstatus = '<span class="text-success">Ongoing</span>';
		    	}	
		    	                   
		    	$html .= '<tr>
                                        <td><span class="text-success">'.$value['groupName'].'</span></td>
                                        <td>'.$value['dataassignDate'].'</td>
                                        <th>
                                           '.$vehicleID.'
                                        </th>     
                                        <td>
                                       		'.$driverID.'
                                        </td> 
                                        <td>
                                       		'.$value['warehousename'].'
                                        </td>                                  
                                        <td><span class="text-success">'.$value['datacount'].'</span></td>
                                        <td>'.$driverstatus.'</td>
                                        <td>
                                            <a href="view-details/'.$value['groupName'].'"><button  class="btn btn-primary btn-icon mg-b-10 btn-sm"><div><i class="fa fa-eye"></i></div></button></a>
                                           '.$pickup_assigned.'
                                                                                             
                                        </td>
                                    </tr>';

                                    // <button class="modal-effect btn btn-primary"data-effect="effect-sign" onclick="openModal();">open modal</button>
		  }    
		    }
		    else{
		    	$html .= '<tr><td colspan="6" style="color:red;text-align:center;font-weight:600;">No record found !!</td></tr>';
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
	 		$arr 	= array('page'=>$data['page'],'perpage' =>$data['perpage'],'wid'=>$data['wid'],'dataperfrom'=>$data['dataperfrom']);
			$encode = json_encode($arr);
			//echo "<pre>";print_r($encode);die;
			$curl 	= curl_init();
		    curl_setopt_array($curl, array(
			    CURLOPT_URL 			=> env('API_URL').'dustbinpickup',
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
		    if(count($decode['vehicleData'])>0){
		    foreach ($decode['dustbinData'] as $key => $value) {
		    	if($decode['vehicleData'][$key]['warehouse_Id']==$value['WareHouseId']){
		    		$html.='<div class=" show-grid" style="margin-bottom:15px;">
			    	<div class=" row mg-x-5">
				      	<div class="col-md-6 active">
				           <div class="media">
				              <div class="pull-left" href="#">
				              </div>
					            <div class="media-body">
					                <h6 class="media-heading"><strong>Warehouse</strong>: '.$value['warehousename'].'</h6>
					                '.$value['warehouseaddress'].'
					            </div>
					        </div>
					      </div>
					      <div class="col-md-3 active" onclick="availableVehicle('.$value['WareHouseId'].');" style="cursor: pointer;">
					          <div class="media">
					            <div class="media-body">
					                <h6 class="media-heading"><strong>Available Vehicle</strong></h6>
					               <strong>'.$decode['vehicleData'][$key]['avabileVehicle'].'</strong>
					            </div>
					        </div>
					      </div>
				         <div class="col-md-3 active" onclick="unavailableVehicle('.$value['WareHouseId'].');" style="cursor: pointer;">
				            <div class="media-body">
				                <h6 class="media-heading"><strong>Unavailable Vehicle</strong></h6>
				                <strong>'.$decode['vehicleData'][$key]['notavabileVehicle'].'</strong>
				            </div>
				        </div>
				    </div>
				</div>';	
		    	}
		    	else{
		    		$html.='<div class=" show-grid" style="margin-bottom:15px;">
			    	<div class=" row mg-x-5">
				      	<div class="col-md-6 active">
				           <div class="media">
				              <div class="pull-left" href="#">
				              </div>
					            <div class="media-body">
					                <h6 class="media-heading"><strong>Warehouse</strong>: '.$value['warehousename'].'</h6>
					                '.$value['warehouseaddress'].'
					            </div>
					        </div>
					      </div>
					      <div class="col-md-3 active" onclick="availableVehicle('.$value['WareHouseId'].');" style="cursor: pointer;">
					          <div class="media">
					            <div class="media-body">
					                <h6 class="media-heading"><strong>Available Vehicle</strong></h6>
					               <strong>0</strong>
					            </div>
					        </div>
					      </div>
				         <div class="col-md-3 active" onclick="unavailableVehicle('.$value['WareHouseId'].');" style="cursor: pointer;">
				            <div class="media-body">
				                <h6 class="media-heading"><strong>Unavailable Vehicle</strong></h6>
				                <strong>0</strong>
				            </div>
				        </div>
				    </div>
				</div>';
		    	}
		    	$html.='<div class="bd rounded table-responsive"><table class="table table-bordered mg-b-0">
                                <thead class="thead-colored thead-light">
                                    <tr>
                                        <th>
                                            <label class="ckbox mg-b-0">
                                                <input type="checkbox" id="ppp'.$value['WareHouseId'].'"  onClick="checkAll(this,'.$value['WareHouseId'].')">
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
	                           <input type="checkbox" value="'.$val['id'].'"  name="'.$value['WareHouseId'].'[]" onClick="checkSingle(this,'.$value['WareHouseId'].')" data-id="'.$val['data_percentage'].'">
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
                            <div class="form-layout-footer mg-t-30 tx-center" style="margin-bottom:15px;">
                            <button disabled="true" class="btn btn-primary" id="button'.$value['WareHouseId'].'" onclick="getCheckData('.$value['WareHouseId'].');">Create a Pickup</button>
                            
                        </div>';

		  }   
 }	             // <ul class="pagination pagination-circle mg-b-0">
               //              <li class="page-item hidden-xs-down">
               //                  <a class="page-link" href="#" aria-label="First"><i class="fa fa-angle-double-left"></i></a>
               //              </li>
               //              <li class="page-item active"><a class="page-link" href="#">1</a></li>
               //              <li class="page-item"><a class="page-link" href="#">2</a></li>
               //              <li class="page-item disabled"><span class="page-link">...</span></li>
               //              <li class="page-item"><a class="page-link" href="#">10</a></li>
                         
               //              <li class="page-item hidden-xs-down">
               //                  <a class="page-link" href="#" aria-label="Last"><i class="fa fa-angle-double-right"></i></a>
               //              </li>
               //          </ul> 
		    //echo "<pre>";print_r($decode);die;
		    $count = $decode['totalpage'];
	     	$return = array('html'=> $html);
	     	$return = array('count'=> $count, 'html'=> $html);
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
    public function pickup_history(Request $req){

    	$val  = Session::get('auth_key');
	 	$data = $req->all();
	 	if(isset($data['list'])){	
	 		$arr 	= array('page'=>$data['page'],'perpage' =>$data['perpage'],'wid'=>$data['wid'],'filterdate'=>$data['filterdate'],'filterdate2'=>$data['filterdate2']);
			$encode = json_encode($arr);
			//echo "<pre>";print_r($encode);die();
			$curl 	= curl_init();
		    curl_setopt_array($curl, array(
			    CURLOPT_URL 			=> env('API_URL').'pickupHistory',
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
		    if($decode['dustbinData'] !=0){
		    foreach ($decode['dustbinData'] as $key => $value) {
		    		$date =  date_create($value['dataassignDate']);
                                               $date1 = date_format($date,"Y-m-d");
                                               $yrdata= strtotime($date1);
                                    $strdate =  date('d M,Y', $yrdata); 
		    	$html .= '<tr>
                                        <td><span class="text-success">'.$value['groupName'].'</span></td>
                                        <td>'.$strdate.'</td>
                                        <td>'.$value['warehousename'].'</td>
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
                                        <td>
                                            <a href="view-details/'.$value['groupName'].'"><button class="btn btn-success btn-icon mg-b-10 btn-sm"><div><i class="fa fa-eye"></i></div></button></a>                                            
                                        </td>
                                    </tr>';
		    }	
		   }
		    
		    //echo "<pre>";print_r($decode);die;
		    $count = $decode['totalpage'];
	     	$return = array('count'=> $count, 'html'=> $html);
        	echo json_encode($return); exit ;
	 	} 	 
    	return view('pickup-history');
    }

    public function dustbin_history(Request $req){

    	$val  = Session::get('auth_key');
	 	$data = $req->all();
	 	if(isset($data['list'])){	
	 		$arr 	= array('page'=>$data['page'],'perpage' =>$data['perpage'],'wid'=>$data['wid'],'selectdate'=>$data['selectdate'],'dataperfrom'=>$data['dataperfrom']);
			$encode = json_encode($arr);
			//echo "<pre>";print_r($encode);die();
			$curl 	= curl_init();
		    curl_setopt_array($curl, array(
			    CURLOPT_URL 			=> env('API_URL').'dustbinhistory',
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
		    if($decode['data'] !=0){
		    foreach ($decode['data'] as $key => $value) {
		    		$date =  date_create($value['assigndate']);
                                               $date1 = date_format($date,"Y-m-d");
                                               $yrdata= strtotime($date1);
                                    $strdate =  date('d M,Y', $yrdata);
                   if($value['status'] == 1){
                   		$status = '<span class="text-success">Pickup Processing</span>';
                   } 
                   else{
                   		$status = '<span class="text-danger">Complete</span>';
                   }                 
		    	$html .= '<tr>
                                        <td><span class="text-success">'.$value['groupid'].'</span></td>
                                        <td>'.$strdate.'</td>
                                        <td>'.$value['gsm_moblie_number'].'</td>
                                        <td>'.$value['wname'].'</td>
                                        <td>'.$value['name'].'</td>
                                        <td>'.$value['address'].'</td>                                      
                                        <td><span class="text-success">'.$value['dustbindatapercentage'].'</span></td>
                                        <td>'.$status.'</td>
                                    </tr>';
		    }	
		   }
		    
		    //echo "<pre>";print_r($decode);die;
		    $count = $decode['totalpage'];
	     	$return = array('count'=> $count, 'html'=> $html);
        	echo json_encode($return); exit ;
	 	} 	 
    	return view('dustbin-history');
    }

    public function available_vehicle(Request $req){

    	$val  = Session::get('auth_key');
	 	$data = $req->all();
	 	if(isset($data['list'])){	
	 		$arr 	= array('page'=>$data['page'],'perpage' =>$data['perpage'],'wid'=>$data['wid']);
			$encode = json_encode($arr);
			//echo "<pre>";print_r($encode);die();
			$curl 	= curl_init();
		    curl_setopt_array($curl, array(
			    CURLOPT_URL 			=> env('API_URL').'avlibleVehicle',
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
		    
		    $html 		= '';
		    if($decode['data'] !=0){
		    foreach ($decode['data'] as $key => $value) { 
		    	//echo "<pre>";print_r($data['show']);die;
		    if($data['show']==='true'){
					$show = '<td><label class="rdiobox">
                                            <input name="vehicle_id" type="radio" value="'.$value['VehicleID'].'" data-value="'.$value['capacity'].'">
                                            <span></span>
                                        </label>
                                        <input name="driverid" type="hidden" id="driverid" value="'.$value['DriverID'].'">
                                        <input name="vehicle_capacity" type="hidden" id="vcapacity" value="'.$value['capacity'].'">
                                        <input name="vehicleid" type="hidden" id="vehicleid" value="'.$value['VehicleID'].'"></td>';
			} 
			else{
				$show ='';
			}             
		    	$html .= '<tr>                  
                                    <td>
                                        <a href="#" class="media-list-link">
                                            <div class="media pd-y-0-force pd-x-0-force">
                                                <img src="'.env('STORAGE_PATH').'drivers/'.$value['driver_image'].'" alt="">
                                                <div class="media-body">
                                                <div>
                                                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">'.$value['Drivername'].'</p>
                                                </div>
                                                <p class="tx-12 tx-gray-600 mg-b-0">'.$value['mobile_no'].'</p>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <th>
                                        <a href="#" class="media-list-link ">
                                            <div class="pd-y-0-force pd-x-0-force media ">
                                                <img src="./public/frontend/img/ic-truck.png" alt="">
                                                <div class="media-body">
                                                <div>
                                                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">'.$value['model_name'].'</p>
                                                </div>
                                                <p class="tx-12 tx-gray-600 mg-b-0">'.$value['vehicle_rc'].'</p>
                                                </div>
                                            </div>
                                        </a>
                                    </th>                                        
                                    <td>'.$value['capacity'].' Dustbin</td>
                                    '.$show.' 
                                </tr>';
		    }	
		   }
		    
		    //echo "<pre>";print_r($decode);die;
		    $count = $decode['totalpage'];
	     	$return = array('count'=> $count, 'html'=> $html);
        	echo json_encode($return); exit ;
	 	} 	 
    	return view('order');
    }
    public function notavailable_vehicle(Request $req){

    	$val  = Session::get('auth_key');
	 	$data = $req->all();
	 	if(isset($data['list'])){	
	 		$arr 	= array('page'=>$data['page'],'perpage' =>$data['perpage'],'wid'=>$data['wid']);
			$encode = json_encode($arr);
			//echo "<pre>";print_r($encode);die();
			$curl 	= curl_init();
		    curl_setopt_array($curl, array(
			    CURLOPT_URL 			=> env('API_URL').'notavlibleVehicle',
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
		    if($decode['data'] !=0){
		    foreach ($decode['data'] as $key => $value) {                
		    	$html .= '<tr>                                   
                                    <td>
                                        <a href="#" class="media-list-link">
                                            <div class="media pd-y-0-force pd-x-0-force">
                                                <img src="'.env('STORAGE_PATH').'drivers/'.$value['driver_image'].'" alt="">
                                                <div class="media-body">
                                                <div>
                                                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">'.$value['Drivername'].'</p>
                                                </div>
                                                <p class="tx-12 tx-gray-600 mg-b-0">'.$value['mobile_no'].'</p>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <th>
                                        <a href="#" class="media-list-link ">
                                            <div class="pd-y-0-force pd-x-0-force media ">
                                                <img src="./public/frontend/img/ic-truck.png" alt="">
                                                <div class="media-body">
                                                <div>
                                                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">'.$value['model_name'].'</p>
                                                </div>
                                                <p class="tx-12 tx-gray-600 mg-b-0">'.$value['vehicle_rc'].'</p>
                                                </div>
                                            </div>
                                        </a>
                                    </th>                                        
                                    <td>'.$value['capacity'].' Dustbin</td>
                                </tr>';
		    }	
		   }
		    
		    //echo "<pre>";print_r($decode);die;
		    $count = $decode['totalpage'];
	     	$return = array('count'=> $count, 'html'=> $html);
        	echo json_encode($return); exit ;
	 	} 	 
    	return view('order');
    }
    public function avilable_history(Request $req){
    	$val  = Session::get('auth_key');
	 	$data = $req->all();
	 	if(isset($data['list'])){	
	 		$arr 	= array('page'=>$data['page'],'perpage' =>$data['perpage'],'selectdate'=>$data['selectdate']);
			$encode = json_encode($arr);
			//echo "<pre>";print_r($encode);die();
			$curl 	= curl_init();
		    curl_setopt_array($curl, array(
			    CURLOPT_URL 			=> env('API_URL').'driverlivehistory',
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
		    	$i = 1;
		    if($decode['result']['data'] !=0){
		    foreach ($decode['result']['data'] as $key => $value) {
		    	 $combine = $value['avilable_date'].' '.$value['avilable_time'];
		    	 $newdatetime = date($combine);
		    	 //echo "<pre>";print_r($newdatetime);die();
		    	
		    	$return =  self::time_ago($combine);
		    	$date =  date_create($value['avilable_date']);
                                               $date1 = date_format($date,"Y-m-d");
                                               $yrdata= strtotime($date1);
                                    $strdate =  date('d M,Y', $yrdata); 
		    if($value['avabilityststus'] == 0){
		    	$status = '<span class="text-danger">Unavailable</span>';
		    }else{
		    	$status = '<span class="text-success">Available</span>';
		    }                
		    	$html .= '<tr>
                                    <td><span class="text-success">'.$i++.'</span></td>                                
                                    <td>
                                        <a href="#" class="media-list-link">
                                            <div class="media pd-y-0-force pd-x-0-force">
                                                <img src="'.env('STORAGE_PATH').'drivers/'.$value['driver_image'].'" alt="">
                                                <div class="media-body">
                                                <div>
                                                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">'.$value['name'].'</p>
                                                </div>
                                                <p class="tx-12 tx-gray-600 mg-b-0">'.$value['mobile_no'].'</p>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                     <td>'.$strdate.'</td>                             
                                    <td>'.$value['avilable_time'].'</td>
                                     <td>'.$return.'</td>
                                     <td>'.$status.'</td>
                                </tr>';
		    }	
		   }
		    
		    //echo "<pre>";print_r($decode);die;
		    $count = $decode['result']['totalpage'];
	     	$return = array('count'=> $count, 'html'=> $html);
        	echo json_encode($return); exit ;
	 	} 	 
    	return view('available-history');
    }
     public function vehicle_assign(Request $req){

    	$val  = Session::get('auth_key');
	 	$data = $req->all();
	 	if(isset($data['list'])){	
	 		$arr 	= array('page'=>$data['page'],'perpage' =>$data['perpage']);
			$encode = json_encode($arr);
			//echo "<pre>";print_r($encode);die();
			$curl 	= curl_init();
		    curl_setopt_array($curl, array(
			    CURLOPT_URL 			=> env('API_URL').'vehiclelistforassign',
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
		    if($decode['result']['data'] !=0){
		    foreach ($decode['result']['data'] as $key => $value) { 
		    if($value['driverAvablityStatus']==1){ 
 							$rediobtn='<span class="text-danger">Pickup already assigned !!</span>'; 
		     }
		     else{
		     	$rediobtn='<label class="rdiobox">
                                            <input name="vehicle_id" type="radio" value="'.$value['VehicleID'].'">
                                            <span></span>
                                        </label>'; 
		     }            
		    	$html .= '<tr>
                                    <th>
                                        <a href="#" class="media-list-link ">
                                            <div class="pd-y-0-force pd-x-0-force media ">
                                                <img src="./public/frontend/img/ic-truck.png" alt="">
                                                <div class="media-body">
                                                <div>
                                                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">'.$value['model_name'].'</p>
                                                </div>
                                                <p class="tx-12 tx-gray-600 mg-b-0">'.$value['vehicle_rc'].'</p>
                                                </div>
                                            </div>
                                        </a>
                                    </th>                                        
                                    <td>'.$value['capacity'].' Dustbin</td>
                                    <td>
                                       '.$rediobtn.'
                                    </td>
                                </tr>';
		    
		   } 	
		  }
		    
		    //echo "<pre>";print_r($decode);die;
		    $count = $decode['result']['totalpage'];
	     	$return = array('count'=> $count, 'html'=> $html);
        	echo json_encode($return); exit ;
	 	} 	 
    	return view('driver');
    }
function time_ago($timestamp){
 
 date_default_timezone_set("Asia/Dubai");        
 $time_ago        = strtotime($timestamp);
 $current_time    = time();
 //echo "<pre>";print_r($time_ago);die;
 $time_difference = $current_time - $time_ago;
 $seconds         = $time_difference;
 
 $minutes = round($seconds / 60); // value 60 is seconds  
 $hours   = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec  
 $days    = round($seconds / 86400); //86400 = 24 * 60 * 60;  
 $weeks   = round($seconds / 604800); // 7*24*60*60;  
 $months  = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60  
 $years   = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60
               
 if ($seconds <= 60){

   return "Just Now";

 } else if ($minutes <= 60){

   if ($minutes == 1){

     return "one minute ago";

   } else {

     return "$minutes minutes ago";

   }

 } else if ($hours <= 24){

   if ($hours == 1){

     return "an hour ago";

   } else {

     return "$hours hrs ago";

   }

 } else if ($days <= 7){

   if ($days == 1){

     return "yesterday";

   } else {

     return "$days days ago";

   }

 } else if ($weeks <= 4.3){

   if ($weeks == 1){

     return "a week ago";

   } else {

     return "$weeks weeks ago";

   }

 } else if ($months <= 12){

   if ($months == 1){

     return "a month ago";

   } else {

     return "$months months ago";

   }

 } else {
   
   if ($years == 1){

     return "one year ago";

   } else {

     return "$years years ago";

   }
 }
}

}
