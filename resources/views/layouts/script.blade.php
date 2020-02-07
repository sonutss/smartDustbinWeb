 <script src="{{ url('public/frontend/lib/jquery/jquery.min.js') }}"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="{{ url('public/frontend/lib/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <script src="{{ url('public/frontend/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/moment/min/moment.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/rickshaw/vendor/d3.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/rickshaw/vendor/d3.layout.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/rickshaw/rickshaw.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ url('public/frontend/lib/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ url('public/frontend/lib/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/echarts/echarts.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/select2/js/select2.full.min.js') }}"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyAq8o5-8Y5pudbJMJtDFzb8aHiWJufa5fg"></script>
    <script src="{{ url('public/frontend/lib/gmaps/gmaps.min.js') }}"></script>
    <script src="{{ url('public/frontend/lib/highlightjs/highlight.pack.min.js') }}"></script>
    <script src="{{ url('public/frontend/js/bracket.js') }}"></script>
    <script src="{{ url('public/frontend/js/map.shiftworker.js') }}"></script>
    <script src="j{{ url('public/frontend/js/ResizeSensor.js') }}"></script>
    <script src="{{ url('public/frontend/js/dashboard.js') }}"></script>
    <script>
        $(function() {
            'use strict'
            $(window).resize(function() {
                minimizeMenu();
            });
            minimizeMenu();
            function minimizeMenu() {
                if (window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
                    $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
                    $('body').addClass('collapsed-menu');
                    $('.show-sub + .br-menu-sub').slideUp();
                } else if (window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
                    $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
                    $('body').removeClass('collapsed-menu');
                    $('.show-sub + .br-menu-sub').slideDown();
                }
            }
        });
    </script>