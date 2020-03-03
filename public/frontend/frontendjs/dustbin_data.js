 const socket = io('http://3.6.124.196:3002/');

 socket.on('connect', function(data) {
  console.log("Server is connected");
  // console.log(JSON.stringify(data))
 });
 // socket.emit('welcomeMessage',"Welcome To Server");

 var DustbinNumber = [];
 var DustbinData = [];
 socket.on('dustbinpickup1', (dataSet) => {
  $("#pickup tbody").html('');
  DustbinData = [];
  DustbinNumber = [];
  if (dataSet.length != 0) {

   for (var x = 0; x < dataSet.length; x++) {

    for (var xx = 0; xx < dataSet[x].data.length; xx++) {
     DustbinNumber.push(dataSet[x].data[xx].gsm_moblie_number);
     DustbinData.push(dataSet[x].data[xx].data_percentage)
     // console.log(dataSet[x].data[xx].gsm_moblie_number);
     //console.log(dataSet[x].data[xx].name)
     // console.log(dataSet[x].data[xx].data_percentage)
     // $("#datalist").html('');
     // $("#datalist").append('<div>GSM:'+dataSet[x].data[xx].gsm_moblie_number+' <span>DataPercentage:'+dataSet[x].data[xx].data_percentage+'</span></div>');

     $("#pickup tbody").append('<tr>' +
      +'<td>' + (xx + 1) + '</td>' +
      '<td class="text-success" style="font-weight:600">' + dataSet[x].data[xx].gsm_moblie_number + '</td>' +
      '<td>' + dataSet[x].data[xx].name + '</td>' +
      '<td>' + dataSet[x].data[xx].address + '</td>' +
      '<td class="text-success" style="font-weight:600;height:100px !important;position:relative;"><div class="circleBox"><div id="doughnut'+xx+x+'" class="inview"></div></div></td>'

      +
      '</tr>');

    var salesDoughnutChartUS = new CanvasJS.Chart("doughnut"+xx+x, { 
                    animationEnabled: true,
                    backgroundColor: "transparent",
                    height:130,
                    width:150,
                    margin: {
                        top: 1,
                        right: 1,
                        bottom: 2,
                        left: 2
                    },
                    padding: {
                        top: 1,
                        right: 1,
                        bottom: 2,
                        left: 2
                    },
                    title: {
                        fontColor: "#848484",
                        fontSize: 16,
                        horizontalAlign: "center",
                        text: dataSet[x].data[xx].data_percentage+"%",
                        verticalAlign: "center"
                    },
                    toolTip: {
                        backgroundColor: "#ffffff",
                        borderThickness: 0,
                        cornerRadius: 0,
                        fontColor: "#424242"
                    },
                    data: [
                        {
                            explodeOnClick: false,
                            innerRadius: "70%",
                            radius: "50%",
                            startAngle:270,
                            type: "doughnut",
                            dataPoints: [                   
                                { y: dataSet[x].data[xx].data_percentage, color: "#228B22", toolTipContent: ""+dataSet[x].data[xx].name+": <span>" + dataSet[x].data[xx].data_percentage+ "</span>" },
                                { y: (100)-(dataSet[x].data[xx].data_percentage), color: "#808080", toolTipContent: null },
                                
                            ]
                        }
                    ]
                });

        
                jQuery.scrollSpeed(100, 400); 
               salesDoughnutChartUS.render();



    }
   }
   GetAll(DustbinNumber, DustbinData);

  }

 });

 function GetAll(Name, Data) {
  var data = {
   labels: Name,
   datasets: [{
    label: "Bin Level",
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