<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class WarehouseController extends Controller
{
    public function addWarehouse(){
    	return view('warehouse-add');
    }
    public function warehouseList(Request $req){
    	$val  = Session::get('auth_key');
	 	$data = $req->all();
	 	if(isset($data['list'])){
	 		$arr 	= array('page'=>$data['page'],'perpage' =>$data['perpage']);
			$encode = json_encode($arr);
			$curl 	= curl_init();
		    curl_setopt_array($curl, array(
			    CURLOPT_URL 			=> env('API_URL').'wherehouseList',
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
		    	$html .= ' <tr>
                                        <td><span class="text-success">'.$value['id'].'</span></td>
                                        <td>'.$value['name'].' </td>
                                        <th>'.$value['email'].'</th>     
                                        <td>'.$value['mobile_no'].'</td>                       
                                        <td><span class="text-success">'.$value['address'].'</span></td>
                                        <td>
                                            <a href="edit-warehouse/'.$value['id'].'"><button  class="btn btn-success btn-icon mg-b-10 btn-sm"><div><i class="fa fa-edit"></i></div></button></a>                                            
                                            <a href="delete-warehouse/'.$value['id'].'"><button  class="btn btn-danger btn-icon mg-b-10 btn-sm"><div><i class="fa fa-trash"></i></div></button></a>                                            
                                        </td>
                                    </tr>';
		    }
		    //echo "<pre>";print_r($decode);die;
		    $count = $decode['result']['totalpage'];
	     	$return = array('count'=> $count, 'html'=> $html);
        	echo json_encode($return); exit ;
	 	} 	 
    	return view('warehouse');

    }
    public function editWarehouse($wid){
    	$val  = Session::get('auth_key');
		$curl = curl_init();
		    curl_setopt_array($curl, array(
			    CURLOPT_URL 			=> env('API_URL').'wherehouseDetails',
			    CURLOPT_RETURNTRANSFER 	=> 1,
			    CURLOPT_ENCODING 		=> "",
			    CURLOPT_MAXREDIRS 		=> 10,
			    CURLOPT_TIMEOUT 		=> 30000,
			    CURLOPT_HTTP_VERSION 	=> CURL_HTTP_VERSION_1_1,
			    CURLOPT_CUSTOMREQUEST 	=> "POST",
			    CURLOPT_POSTFIELDS 		=> "wid=$wid",
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
		    	return view('edit-warehouse',compact('decode')); 
		    }
		    else{
		    	return false;
		    }	
    }
    public function deleteWarehouse($wid){
    	$val  = Session::get('auth_key');
		$curl = curl_init();
		    curl_setopt_array($curl, array(
			    CURLOPT_URL 			=> env('API_URL').'wherehouseDelete',
			    CURLOPT_RETURNTRANSFER 	=> 1,
			    CURLOPT_ENCODING 		=> "",
			    CURLOPT_MAXREDIRS 		=> 10,
			    CURLOPT_TIMEOUT 		=> 30000,
			    CURLOPT_HTTP_VERSION 	=> CURL_HTTP_VERSION_1_1,
			    CURLOPT_CUSTOMREQUEST 	=> "DELETE",
			    CURLOPT_POSTFIELDS 		=> "wid=$wid",
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
		    	return redirect()->route('warehouse-list'); 
		    }
		    else{
		    	return false;
		    }
    }

}
