<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Image;
class ApiController extends Controller
{
	public function index(){
		return view('welcome');
    }

	public function login(Request $req){
		$data = $req->all();
		$arr =array('email'=>$data['email'],'password'=>$data['password']);
		$encode = json_encode($arr);
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_HEADER, 1);
	    curl_setopt_array($curl, array(
	    CURLOPT_URL => env('API_URL').'login',
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
	        "Authorization:Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiI5NjUwOTQ3OTkyIiwibmFtZSI6IlByZW1fTWF1cnlhIiwiaWF0IjoxNTE2MjM5MDIyfQ.E-UK4CjVi8qumG-ZR4j-mwCdFYmPuFNKUvkd0mBT5gM"

	    ),
	    ));
    	$response = curl_exec($curl);
	    $err = curl_error($curl);

	    $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
 		$headers = substr($response, 0, $header_size);
 		$body = substr($response, $header_size);
 			$decode = json_decode($body,true);
	    curl_close($curl);
	    header("Content-Type:text/plain; charset=UTF-8");
	    $headers = explode("\r\n", $headers); 
	    $headers = array_filter($headers);
	    $exp_res = explode(":",$headers[7]);
	    $authorization_key = $exp_res[1];
	    Session::put('name', $decode['result']['name']);
	    Session::put('auth_key', $authorization_key);
        Session::save();
	    //$val=Session::get('auth_key');
	    
	    //echo "<pre>";print_r($decode);die();
	    if ($err) {
	    echo "cURL Error #:" . $err;die;
	    } else {
	    	if(isset($decode['success'])==1){
            $arr_res = array('status'=>'true','message'=>'Success');
	    	} else {
	    	$arr_res = array('status'=>'false','message'=>'Fail');	
	    	}
	    }
	  return json_encode($arr_res);  
    }
    public function dashboard(){
	 	$aa = Session::get('auth_key');
	 	//dd($aa);
	 	return view('dashboard');
	 }

	 public function vehicleList(Request $req){
		$val  = Session::get('auth_key');
		//dd($val);
	 	$data = $req->all();
	 	if(isset($data['list'])){
	 		//echo 'sadasd'; exit;
	 		$arr =array('page'=>$data['page'],'perpage' =>$data['perpage'],'vehiclestatus'=>$data['vehiclestatus'],'avablitystatus'=>$data['avablitystatus']);
			$encode = json_encode($arr);
			$curl = curl_init();
		    curl_setopt_array($curl, array(
			    CURLOPT_URL => env('API_URL').'vehiclelist',
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
		    	if( $value['status'] == 1 ){
                    $status = '<button  class="btn btn-success btn-icon mg-b-10 btn-sm" onclick="updateStatus('.$value['id'].',0)" style="padding:5px"><div>Active</div></button>' ;
                } else {
                   	$status = '<button  class="btn btn-danger btn-icon mg-b-10 btn-sm"  onclick="updateStatus('.$value['id'].',1)" style="padding:5px"><div>Inactive</div></button>' ;
                }
                if( $value['available_status'] == 0 ){
                    $avaiable = '<span class="text-success">Available</span>' ;
                } else {
                    $avaiable = '<span class="text-danger">Unavailable</span>' ;
                }
                if($value['mobile_no'] == NULL) {
                	$msg = ' <div class="media-body">
                			<p class="mg-b-0 tx-medium tx-gray-800 tx-13">Driver is Not Assign</p>
                			</div>';
                } 
                else{
                	 $msg = ' <a href="#" class="media-list-link">
                            <div class="media pd-y-0-force pd-x-0-force">
                                <img src="img/img4.jpg" alt="">
                                <div class="media-body">
                                <div>
                                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">'.$value['name'].'</p>
                                </div>
                                <p class="tx-12 tx-gray-600 mg-b-0">'.$value['mobile_no'].'</p>
                                </div>
                            </div>
                        </a>';
                }  

                if($value['Currentstatus'] == 0 || $value['Currentstatus'] == 2) {
                	$msg = ' <div class="media-body">
                			<p class="mg-b-0 tx-medium tx-gray-800 tx-13">Driver is Not Assign</p>
                			</div>';
                } 
                else{
                	 $msg = ' <a href="#" class="media-list-link">
                            <div class="media pd-y-0-force pd-x-0-force">
                                <img src="img/img4.jpg" alt="">
                                <div class="media-body">
                                <div>
                                    <p class="mg-b-0 tx-medium tx-gray-800 tx-13">'.$value['name'].'</p>
                                </div>
                                <p class="tx-12 tx-gray-600 mg-b-0">'.$value['mobile_no'].'</p>
                                </div>
                            </div>
                        </a>';
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
                    <td>
                      '.$msg.'
                    </td>
                    <td>'.$avaiable.'</td>
                    <td>'.$status.'</td>
                    <td>
                        <a href="edit-vehicle/'.$value['id'].'"><button  class="btn btn-success btn-icon mg-b-10 btn-sm"><div><i class="fa fa-edit"></i></div></button></a>
                         <a href="view-vehicle/'.$value['vehicle_rc'].'"><button  class="btn btn-success btn-icon mg-b-10 btn-sm"><div><i class="fa fa-eye"></i></div></button></a>                                            
                        <a href="delete-vehicle/'.$value['id'].'"><button  class="btn btn-danger btn-icon mg-b-10 btn-sm"><div><i class="fa fa-trash"></i></div></button></a>                                            
                    </td>
                </tr>';
		    }
		    //echo "<pre>";print_r($decode);die;
		    $count = $decode['result']['totalpage'];
	     	$return = array('count'=> $count, 'html'=> $html);
        	echo json_encode($return); exit ;
	 	} 	 
	 	return view('vehicle');
	}
	public function addVehicle(){
		return view('vehicle-add'); 
	}
	public function deleteVehicle($vid){
			$val  = Session::get('auth_key');
			$curl = curl_init();
		    curl_setopt_array($curl, array(
			    CURLOPT_URL => env('API_URL').'vehicleDelete',
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_ENCODING => "",
			    CURLOPT_MAXREDIRS => 10,
			    CURLOPT_TIMEOUT => 30000,
			    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			    CURLOPT_CUSTOMREQUEST => "DELETE",
			    CURLOPT_POSTFIELDS => "vid=$vid",
			    CURLOPT_HTTPHEADER => array(
			    // Set here requred headers
			       //"accept: */*",
			        "accept-language: en-US,en;q=0.8",
			        "content-type: application/x-www-form-urlencoded",
			        "Access-Control-Allow-Origin: http://192.168.0.150:3002",
			        "Authorization: $val",
			    ),
	    	) );
	    	$response = curl_exec($curl);
		    $err = curl_error($curl);
		    curl_close($curl);
		    $decode = json_decode($response,true);
		    if($decode['success']=='1'){
		    	return redirect()->route('vehicle-list'); 
		    }
		    else{
		    	return false;
		    }
	}
	public function editVehicle($vid){
		$val  = Session::get('auth_key');
			$curl = curl_init();
		    curl_setopt_array($curl, array(
			    CURLOPT_URL => env('API_URL').'vehicleDetails',
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_ENCODING => "",
			    CURLOPT_MAXREDIRS => 10,
			    CURLOPT_TIMEOUT => 30000,
			    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			    CURLOPT_CUSTOMREQUEST => "POST",
			    CURLOPT_POSTFIELDS => "vid=$vid",
			    CURLOPT_HTTPHEADER => array(
			    // Set here requred headers
			       //"accept: */*",
			        "accept-language: en-US,en;q=0.8",
			        "content-type: application/x-www-form-urlencoded",
			        "Access-Control-Allow-Origin: http://192.168.0.150:3002",
			        "Authorization: $val",
			    ),
	    	) );
	    	$response = curl_exec($curl);
		    $err = curl_error($curl);
		    curl_close($curl);
		    $decode = json_decode($response,true);
		    //echo "<pre>";print_r($decode['result']);die;
		    if($decode['success']=='1'){
		    	return view('edit-vehicle',compact('decode')); 
		    }
		    else{
		    	return false;
		    }	

	}
	public function viewVehicle($vehicle_rc){
		$val  = Session::get('auth_key');
			$curl = curl_init();
		    curl_setopt_array($curl, array(
			    CURLOPT_URL => env('API_URL').'vehicleDetailsalldriver',
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_ENCODING => "",
			    CURLOPT_MAXREDIRS => 10,
			    CURLOPT_TIMEOUT => 30000,
			    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			    CURLOPT_CUSTOMREQUEST => "POST",
			    CURLOPT_POSTFIELDS => "vehiclerc=$vehicle_rc",
			    CURLOPT_HTTPHEADER => array(
			    // Set here requred headers
			       //"accept: */*",
			        "accept-language: en-US,en;q=0.8",
			        "content-type: application/x-www-form-urlencoded",
			        "Access-Control-Allow-Origin: http://192.168.0.150:3002",
			        "Authorization: $val",
			    ),
	    	) );
	    	$response = curl_exec($curl);
		    $err = curl_error($curl);
		    curl_close($curl);
		    $decode = json_decode($response,true);
		    //echo "<pre>";print_r($decode);die;
		    if($decode['success']=='1'){
		    	return view('vehicle-details',compact('decode')); 
		    }
		    else{
		    	return false;
		    }	

	}
	public function logout(){
		$val  = Session::get('auth_key');
			$curl = curl_init();
		    curl_setopt_array($curl, array(
			    CURLOPT_URL => env('API_URL').'logout',
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_ENCODING => "",
			    CURLOPT_MAXREDIRS => 10,
			    CURLOPT_TIMEOUT => 30000,
			    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			    CURLOPT_CUSTOMREQUEST => "GET",
			    // CURLOPT_POSTFIELDS => "vid=$vid",
			    CURLOPT_HTTPHEADER => array(
			    // Set here requred headers
			       //"accept: */*",
			        "accept-language: en-US,en;q=0.8",
			        "content-type: application/x-www-form-urlencoded",
			        "Access-Control-Allow-Origin: http://192.168.0.150:3002",
			        "Authorization: $val",
			    ),
	    	) );
	    	$response = curl_exec($curl);
		    $err = curl_error($curl);
		    curl_close($curl);
		    $decode = json_decode($response,true);
		    //echo "<pre>";print_r($decode);die;
		    if($decode['success']=='1'){
		    	Session::forget('auth_key');
		    	return redirect()->route('index');
		    }
		    else{
		    	return false;
		    }	
	}
	public function postVehicle3334(Request $req){
		$data = $req->all();
		$val  = Session::get('auth_key');
		$arr =array('modelname'=>$data['modelname'],'mgfyear' =>$data['mgfyear'],'companyname'=>$data['companyname'],
					'trucktype'=>$data['trucktype'],'capacity' =>$data['capacity'],'vehiclerc'=>$data['vehiclerc'],
					'rcissue'=>$data['rcissue'],'rcexpire' =>$data['rcexpire'],'issuecountry'=>$data['issuecountry'],
					'insuranceno'=>$data['insuranceno'],'insuranceissuedate' =>$data['insuranceissuedate'],'insuranceexpiredate'=>$data['insuranceexpiredate'],'insurancecompany'=>$data['insurancecompany'],'insurancecover' =>$data['insurancecover'],'coveragelimit'=>$data['coveragelimit']);
		$arr['files'] =array($_FILES); 
		//$fis = $_FILES;
		$post_data = json_encode($arr);
		//echo "<pre>";print_r($data);die;
			$curl = curl_init();
			//curl_setopt($curl, CURLOPT_HEADER, 1);
		    curl_setopt_array($curl, array(
			    CURLOPT_URL => env('API_URL').'addNewVehicle',
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_ENCODING => "",
			    CURLOPT_MAXREDIRS => 10,
			    CURLOPT_TIMEOUT => 30000,
			    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			    CURLOPT_CUSTOMREQUEST => "POST",
			    CURLOPT_POSTFIELDS =>$post_data,
			    // CURLOPT_COOKIEFILE => json_encode(array($_FILES),true),
			    CURLOPT_HTTPHEADER => array(
			         "Content-Type: multipart/form-data; boundary=----WebKitFormBoundaryvlb7BC9EAvfLB2q5",
			       //  "Access-Control-Allow-Origin: http://192.168.0.150:3002",
			        "Authorization:$val"

			    ),
	    	) );
	    	$response = curl_exec($curl);
		    $err = curl_error($curl);
		    curl_close($curl);
		    echo "<pre>";print_r($response);die();
		    //$decode = json_decode($response,true);
	}
	public function postVehicle1111(Request $req){
		$data = $req->all();
		echo "<pre>";print_r($data);
		$val  = Session::get('auth_key');
		$vehiclephoto = $req->files->get('vehiclephoto');
		$vehicle_p_name = $req->files->get('vehiclephoto')->getClientOriginalName();
		//echo '<pre>';print_r($vehiclephoto); die();
		$registrationcard = $req->files->get('registrationcard');
		$registrationcard_name = $req->files->get('registrationcard')->getClientOriginalName();
		$insurancephoto = $req->files->get('insurancephoto');
		$insurancephoto_name = $req->files->get('insurancephoto')->getClientOriginalName();

		$arr =array('modelname'=>$data['modelname'],'mgfyear' =>$data['mgfyear'],'companyname'=>$data['companyname'],
					'trucktype'=>$data['trucktype'],'capacity' =>$data['capacity'],'vehiclerc'=>$data['vehiclerc'],
					'rcissue'=>$data['rcissue'],'rcexpire' =>$data['rcexpire'],'issuecountry'=>$data['issuecountry'],
					'insuranceno'=>$data['insuranceno'],'insuranceissuedate' =>$data['insuranceissuedate'],'insuranceexpiredate'=>$data['insuranceexpiredate'],'insurancecompany'=>$data['insurancecompany'],'insurancecover' =>$data['insurancecover'],'coveragelimit'=>$data['coveragelimit']);

		// $post_data = json_encode(['modelname'=>$data['modelname'],'mgfyear' =>$data['mgfyear'],'companyname'=>$data['companyname'],'trucktype'=>$data['trucktype'],'capacity' =>$data['capacity'],'vehiclerc'=>$data['vehiclerc'],'rcissue'=>$data['rcissue'],'rcexpire' =>$data['rcexpire'],'issuecountry'=>$data['issuecountry'],'insuranceno'=>$data['insuranceno'],'insuranceissuedate' =>$data['insuranceissuedate'],'insuranceexpiredate'=>$data['insuranceexpiredate'],'insurancecompany'=>$data['insurancecompany'],'insurancecover' =>$data['insurancecover'],'coveragelimit'=>$data['coveragelimit']);

		$handler = curl_init(env('API_URL').'addNewVehicle');
		$cfile = new \CURLFile($vehiclephoto,'image/jpeg',$vehicle_p_name);
		$cfile1 = new \CURLFile($registrationcard,'image/jpeg',$registrationcard_name);
		$cfile2 = new \CURLFile($insurancephoto,'image/jpeg',$insurancephoto_name);
		$datasa = array('vehiclephoto' => $cfile,'registrationcard'=>$cfile1,'insurancephoto'=>$cfile2);
		$post_data = json_encode(array_merge($arr,$datasa));
		//echo "<pre>";print_r($post_data);die();

		$options = [
		    CURLOPT_POST => true,
		    CURLOPT_POSTFIELDS => $post_data,
		    CURLOPT_HTTPHEADER => [
		        'Content-Type: application/json',
		        'Content-Length: ' . strlen($post_data),
		        "Authorization: $val",
		    ]
		];
		curl_setopt_array($handler, $options);
		curl_exec($handler);
		var_dump($handler);
	}
	public function postVehicle3434534(Request $req){
		$data = $req->all();
		$val  = Session::get('auth_key');
		$url = env('API_URL').'addNewVehicle'; // e.g. http://localhost/myuploader/upload.php // request URL
		$filename = $_FILES['vehiclephoto']['name'];
		$filedata = $_FILES['vehiclephoto']['tmp_name'];
		$filesize = $_FILES['vehiclephoto']['size'];

		$filename1 = $_FILES['registrationcard']['name'];
		$filedata1 = $_FILES['registrationcard']['tmp_name'];
		$filesize1 = $_FILES['registrationcard']['size'];

		$filename2 = $_FILES['insurancephoto']['name'];
		$filedata2 = $_FILES['insurancephoto']['tmp_name'];
		$filesize2 = $_FILES['insurancephoto']['size'];
		
		    $headers = array("Content-Type:multipart/form-data","Authorization:$val"); // cURL headers for file uploading
		    $upload_file = array("filedata" => "@$filedata", "filename" => $filename,"filedata1"=>"@$filedata1","filename1" =>$filename1, "filedata2"=>"@$filedata2","filename2" =>$filename2);
		    $arr =array('modelname'=>$data['modelname'],'mgfyear' =>$data['mgfyear'],'companyname'=>$data['companyname'],
					'trucktype'=>$data['trucktype'],'capacity' =>$data['capacity'],'vehiclerc'=>$data['vehiclerc'],
					'rcissue'=>$data['rcissue'],'rcexpire' =>$data['rcexpire'],'issuecountry'=>$data['issuecountry'],
					'insuranceno'=>$data['insuranceno'],'insuranceissuedate' =>$data['insuranceissuedate'],'insuranceexpiredate'=>$data['insuranceexpiredate'],'insurancecompany'=>$data['insurancecompany'],'insurancecover' =>$data['insurancecover'],'coveragelimit'=>$data['coveragelimit']);
		    //echo"<pre>";print_r($postfields);die;
		    $postfields = array_merge($upload_file,$arr);
		    $ch = curl_init();
		    $options = array(
		        CURLOPT_URL => $url,
		        CURLOPT_HEADER => true,
		        CURLOPT_POST => 1,
		        CURLOPT_HTTPHEADER => $headers,
		        CURLOPT_POSTFIELDS => $postfields,
		        CURLOPT_INFILESIZE => $filesize,
		        CURLOPT_RETURNTRANSFER => true
		    ); // cURL options
		    curl_setopt_array($ch, $options);
		    curl_exec($ch);
		    if(!curl_errno($ch))
		    {
		        $info = curl_getinfo($ch);
		        echo "<pre>";print_r($options);die;
		        if ($info['http_code'] == 200)
		            $errmsg = "File uploaded successfully";
		    }
		    else
		    {
		        $errmsg = curl_error($ch);
		    }
		    curl_close($ch);
		}
	public function postVehicle(Request $req){
			$data = $req->all();
			$val  = Session::get('auth_key');
			//echo $val;die;
			$vehiclephoto = base64_encode(file_get_contents($req->file('vehiclephoto')->path()));
			$registrationcard = base64_encode(file_get_contents($req->file('registrationcard')->path()));
			$insurancephoto = base64_encode(file_get_contents($req->file('insurancephoto')->path()));
			//echo "<pre>";print_r($vehice);die;
			$images = array('vehiclephoto'=>$vehiclephoto,'registrationcard'=>$registrationcard,'insurancephoto'=>$insurancephoto);
			 $arr =array('modelname'=>$data['modelname'],'mgfyear' =>$data['mgfyear'],'companyname'=>$data['companyname'],
					'trucktype'=>$data['trucktype'],'capacity' =>$data['capacity'],'vehiclerc'=>$data['vehiclerc'],
					'rcissue'=>$data['rcissue'],'rcexpire' =>$data['rcexpire'],'issuecountry'=>$data['issuecountry'],
					'insuranceno'=>$data['insuranceno'],'insuranceissuedate' =>$data['insuranceissuedate'],'insuranceexpiredate'=>$data['insuranceexpiredate'],'insurancecompany'=>$data['insurancecompany'],'insurancecover' =>$data['insurancecover'],'coveragelimit'=>$data['coveragelimit']);
			  $postfields = array_merge($arr,$images);
			  $headers = array("Content-Type:multipart/form-data","Authorization:$val");
			$url = env('API_URL').'addNewVehicle';
			$curl = curl_init(); curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_TIMEOUT, 30);
			curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS,$postfields);
			$response = curl_exec($curl);
			curl_close($curl);return response()->json(json_decode(($response)));

		}
	
}

    
