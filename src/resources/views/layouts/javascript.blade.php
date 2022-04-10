<!-- jQuery -->
<script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- SweetAlert -->
@include('sweetalert::alert')
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/admin/plugins/chart/Chart.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('assets/admin/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets/admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('assets/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/admin/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/admin/dist/js/demo.js') }}"></script>

<script src="{{ asset('assets/admin/plugins/jquery-chained/jquery.chained.min.js') }}"></script>

<script>
	$(function () {

	    //Initialize Select2 Elements
	    $('.select2').select2({
	    	theme: 'bootstrap4'
	    });
	});
	
	function clock() {
		var now = new Date().toLocaleString("en-US", {timeZone: 'Asia/Jakarta'});
		var month = new Array();
		month[0] = "Januari";
		month[1] = "Februari";
		month[2] = "Maret";
		month[3] = "April";
		month[4] = "Mei";
		month[5] = "Juni";
		month[6] = "Juli";
		month[7] = "Agustus";
		month[8] = "September";
		month[9] = "Oktober";
		month[10] = "November";
		month[11] = "Desember";
		now = new Date(now);
		var date = now.getDate();
		var month2 = month[now.getMonth()];
		var year = now.getFullYear();
		var secs = ('0' + now.getSeconds().toLocaleString()).slice(-2);
		var mins = ('0' + now.getMinutes().toLocaleString()).slice(-2);
		var hr = now.getHours().toLocaleString();
		// var Time = date + " " + month2 + " " + year + " <b>|</b> " + hr + ":" + mins + ":" + secs;
		var Time = hr + ":" + mins + ":" + secs;
		document.getElementById("watch").innerHTML = Time;
		requestAnimationFrame(clock);
    }

    requestAnimationFrame(clock);
</script>

@yield('javascript')