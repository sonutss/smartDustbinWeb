<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content=".">
        <meta name="author" content="">
        <title>Dustbin</title>
       @include('layouts.css')
        <link href="{{ url('public/frontend/lib/select2/css/select2.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ url('public/frontend/css/bracket.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
        <style type="text/css">
            canvas {
  border: 1px dotted red;
}

.chart-container {
  position: relative;
  height: 30vh;
  width: 100%;
}
*{margin:0;}
img{width:32.2%;}


</style>
    </head>
<body>
@include('layouts.menu') 
    <div class="br-mainpanel">         
         <div class="tab-pane fade active show" id="posts">
            
                <div class="container-fluid">
                    <img src="">
                    <div class="row">
                 <div class="clearfix w-100 mg-t-20"></div>
                <div class="col-md-12">
                    <div class="card shadow-base bd-0 pd-25 ">
                        <h3 class="tx-inverse tx-uppercase tx-bold tx-14 mg-t-10">Dustbin Analytics</h3>
                        <div class="chart-container">
                               <canvas id="chart"></canvas>
                        </div>
                         <div class=" mg-t-25">
                            <div class="bd rounded table-responsive">
                                <table class="table table-bordered mg-b-0" id="pickup">
                                    <thead class="thead-colored thead-light">
                                        <tr>
                                                <th>GSM Number</th>
                                                <th>Dustbin Name</th>
                                                <th>Address</th>
                                                <th>Percantage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                           
                                            
                                    </tbody>
                                </table>
                             </div>
                        </div>
                    </div>
                </div>             
            </div>           
        </div>
     </div>
        @include('layouts.footer')
     </div>
    </div>
    <script src="{{ url('public/frontend/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <script src="{{ url('public/frontend/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/moment/min/moment.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ url('public/frontend/js/bracket.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
<script>
  const socket = io('http://3.6.124.196:3002/');

   socket.on('connect',function(data) {
        console.log("Server is connected");
       // console.log(JSON.stringify(data))
    });
   // socket.emit('welcomeMessage',"Welcome To Server");

var DustbinNumber=[];
var DustbinData=[];
    socket.on('dustbinpickup1', (dataSet)=>{
     $("#pickup tbody").html('');
     DustbinData=[];
     DustbinNumber=[];
      if(dataSet.length!=0){
       
        for(var x=0;x<dataSet.length;x++){

          for(var xx=0;xx<dataSet[x].data.length;xx++){
            DustbinNumber.push(dataSet[x].data[xx].gsm_moblie_number);
             DustbinData.push(dataSet[x].data[xx].data_percentage)
           // console.log(dataSet[x].data[xx].gsm_moblie_number);
            //console.log(dataSet[x].data[xx].name)
            // console.log(dataSet[x].data[xx].data_percentage)
            // $("#datalist").html('');
            // $("#datalist").append('<div>GSM:'+dataSet[x].data[xx].gsm_moblie_number+' <span>DataPercentage:'+dataSet[x].data[xx].data_percentage+'</span></div>');

            $("#pickup tbody").append('<tr>'+
                                        +'<td>'+(xx+1)+'</td>'
                                        +'<td class="text-success" style="font-weight:600">'+dataSet[x].data[xx].gsm_moblie_number+'</td>'
                                        +'<td>'+dataSet[x].data[xx].name+'</td>'
                                        +'<td>'+dataSet[x].data[xx].address+'</td>'
                                        +'<td class="text-success" style="font-weight:600">'+dataSet[x].data[xx].data_percentage+'</td>'
                                       
                                   +'</tr>');
          }
        }
        GetAll(DustbinNumber,DustbinData);
        
      }
      
    });
    function GetAll(Name,Data) 
    {
      var data = {
  labels: Name,
  datasets: [{
    label: "DUSTBIN ANALYTICS",
    backgroundColor: "rgba(255,99,132,0.2)",
    borderColor: "rgba(255,99,132,1)",
    borderWidth: 2,
    hoverBackgroundColor: "rgba(255,99,132,0.4)",
    hoverBorderColor: "rgba(255,99,132,1)",
    data: Data,
  }]
};
 
var options = {
  maintainAspectRatio: false,
  scales: {
    yAxes: [{
      stacked: true,
      gridLines: {
        display: true,
        color: "rgba(255,99,132,0.2)"
      }
    }],
    xAxes: [{
      gridLines: {
        display: false
      }
    }]
  }
};

Chart.Bar('chart', {
  options: options,
  data: data
});
}
</script>

</body>
</html>