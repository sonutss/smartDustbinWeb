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
 var avilablehistory = {
  page: page,
  perpage: $("#record").val(),
  selectdate: dateText,
  list: 'true'
 }
 $.ajax({
  url: avilable_history,
  type: 'POST',
  data: avilablehistory,
  headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  success: function(data) {
   var data = JSON.parse(data);
   $("#avilablehistory-list tbody").html('');
   if (data.count == 0) {
    $("#avilablehistory-list tbody").html('<tr><td colspan="6" style="color:red;font-weight:600">No data Found</td></tr>');
   } else {
    $("#avilablehistory-list tbody").html(data.html);
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

function resetAll() {
 $("#wid")[0].selectedIndex = 0;
 $('input[name="datefilter"]').val('');
 getData(1);
}