
    <script src="{{asset(public_path().'js/jquery.js')}}"></script>

    <script src="{{asset(public_path().'js/datatable.js')}}"></script>
    <script src="{{asset(public_path().'js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset(public_path().'js/dataTables.responsive.js')}}"></script>


    <script src="{{asset(public_path().'js/myjava.js')}}"></script>
    <script src="{{asset(public_path().'js/bootstrap.js')}}"></script>

    <script> var public_path = "{{public_path()}}"</script>
    <script> var baseURL = "{{URL::to('/')}}"</script>
    
	<script src = "{{ asset(public_path().'js/AjaxisBootstrap.js')}}"></script>
	<script src = "{{ asset(public_path().'js/scaffold-interface-js/customA.js')}}"></script>

    
    <script src="{{asset(public_path().'datePicker/js/bootstrap-datepicker.js')}}"></script>
    <!-- Languaje -->
    <script src="{{asset(public_path().'datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>


    

    <script>window.jQuery || document.write('<script src="{{asset(public_path().'js/jquery.js')}}"><\/script>')</script>

    

    @yield('scripts')

