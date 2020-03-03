var startdate;
var endDate;
$(".select2").select2();
$(function() {
 $('input[name="datefilter"]').datepicker({
  autoUpdateInput: false,
  dateFormat: 'yy-mm-dd',
  // locale: {
  // dateFormat: 'yy-mm-dd'
  // //cancelLabel: 'Clear'
  // },
  onSelect: function(dateText, inst) {
   getData(1, dateText);
  }
 });
});
$('.pagination').twbsPagination({
 totalPages: 1,
 startPage: 1,
 visiblePages: 5,
 href: false,
 loop: false,
 onPageClick: function(event, page) {
  getData(page);
 },
});

function getData(page, dateText = '') {

 var dustbinhistory = {
  page: page,
  perpage: $("#record").val(),
  selectdate: dateText,
  wid: $("#wid").val(),
  dataperfrom: $("#dataperfrom").val(),
  list: 'true'
 }
 $.ajax({
  url: dustbin_history,
  type: 'POST',
  data: dustbinhistory,
  headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  success: function(data) {
   var data = JSON.parse(data);
   $("#dustbinhistory-list tbody").html('');
   if (data.count == 0) {
    $("#dustbinhistory-list tbody").html('<tr><td colspan="6" style="color:red;font-weight:600">No data Found</td></tr>');
   } else {
    $("#dustbinhistory-list tbody").html(data.html);
    if (page == 1) {
     $('.pagination').twbsPagination('destroy');
     $('.pagination').twbsPagination({
      totalPages: data.count,
      href: false,
     }).on('page', function(event, page) {
      getData(page);
     });
    }
   }
  },
  cache: false,
 });
}
getwarehouse();

function getwarehouse() {
 $.ajax({
  url: list_ware + 'dropdownlistwarehouse',
  type: 'GET',
  headers: {
   'Access-Control-Allow-Origin': '*',
   'Authorization': $("#tocken").val(),
  },
  success: function(data) {
   $('#wid').html('<option value=""> Select Warehouse</option>');
   $.each(data.result, function() {
    var selected = '';
    $('#wid').append($("<option " + selected + "></option>").attr("value", this['id']).text(this['name']));
   });
  },
 });
}

function resetAll() {
 $("#wid")[0].selectedIndex = 0;
 $('input[name="datefilter"]').val('');
 getData(1);
}