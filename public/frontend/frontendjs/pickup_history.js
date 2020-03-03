var startdate;
var endDate;
$(".select2").select2();
$(function() {
 $('input[name="datefilter"]').daterangepicker({
  autoUpdateInput: false,
  locale: {
   cancelLabel: 'Clear'
  }
 });
 $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
  $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
 });
 $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
  $(this).val('');
 });
 $(document).on("click", ".applyBtn", function() {
  startdate = $('input[name="datefilter"]').data('daterangepicker').startDate.format("YYYY-MM-DD");
  endDate = $('input[name="datefilter"]').data('daterangepicker').endDate.format("YYYY-MM-DD");
  $("#wid")[0].selectedIndex = 0;
  getData(1, startdate, endDate);
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

function getData(page, startdate = '', endDate = '') {
 var pickuphistroy = {
  page: page,
  perpage: $("#record").val(),
  filterdate: startdate,
  filterdate2: endDate,
  wid: $("#wid").val(),
  list: 'true'
 }
 $.ajax({
  url: pickup_history,
  type: 'POST',
  data: pickuphistroy,
  headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  success: function(data) {
   var data = JSON.parse(data);
   $("#pickuphistroy-list tbody").html('');
   if (data.count == 0) {
    $("#pickuphistroy-list tbody").html('<tr><td colspan="6" style="color:red;font-weight:600">No data Found</td></tr>');
   } else {
    $("#pickuphistroy-list tbody").html(data.html);
    if (page == 1) {
     $('.pagination').twbsPagination('destroy');
     $('.pagination').twbsPagination({
      totalPages: data.count,
      href: false,
     }).on('page', function(event, page) {
      console.log(page);
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
   $('#wid').html('<option value=""> Select</option>');
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