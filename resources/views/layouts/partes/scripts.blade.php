	<script src="{{asset(public_path().'/js/jquery.js')}}"></script>

    <script src="{{asset(public_path().'/js/datatable.js')}}"></script>

    <script src="{{asset(public_path().'/js/myjava.js')}}"></script>
    <script src="{{asset(public_path().'/js/bootstrap.js')}}"></script>

    
    <script src="{{asset(public_path().'datePicker/js/bootstrap-datepicker.js')}}"></script>
    <!-- Languaje -->
    <script src="{{asset(public_path().'datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    <script>window.jQuery || document.write('<script src="{{public_path('/js/jquery.min.js')}}"><\/script>')</script>

    @yield('scripts')

