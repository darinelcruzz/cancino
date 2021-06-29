<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{ asset('adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

<script src="{{ mix('js/app.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
 <script>
     function submitForm(btn) {
         // disable the button
         btn.disabled = true;
         // submit the form
         btn.form.submit();
     }
 </script>

<script>
	// Data Table With Full Features
    $("#example1").DataTable({
      "order":[[ 0 , "desc"]]
    });
    $("#example2").DataTable({
      "order":[[ 0 , "desc"]]
    });
    $("#example3").DataTable({
      "order":[[ 0 , "desc"]]
    });
    $("#example4").DataTable({
      "order":[[ 0 , "desc"]]
    });
    $("#example5").DataTable({
      "order":[[ 0 , "desc"]]
    });
    $("#example6").DataTable({
      "order":[[ 0 , "desc"]]
    });
    $("#example7").DataTable({
      "order":[[ 0 , "desc"]]
    });
    $("#example8").DataTable({
      "order":[[ 0 , "desc"]]
    });
    $("#example9").DataTable({
      "order":[[ 0 , "desc"]]
    });
    $("#example10").DataTable({
      "order":[[ 0 , "desc"]]
    });
    $("#example11").DataTable({
      "order":[[ 0 , "asc"]]
    });
    $("#example12").DataTable({
      "order":[[ 0 , "asc"]]
    });
    $(".ordered").DataTable({
      "order":[[ 0 , "desc"]]
    });

    $(".descending").DataTable({
      "order":[[ 0 , "desc"]]
    });

    $(".no-pagination").DataTable({
      "order":[[ 0 , "desc"]],
      paging: false
    });

    document.getElementById("inputFocus").focus();
</script>
