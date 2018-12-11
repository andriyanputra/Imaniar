		
	<!--basic scripts-->

	<!--[if !IE]>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<![endif]-->

	<!--[if !IE]>-->
	<script type="text/javascript">
		window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
	</script>
	<!--<![endif]-->

	<script type="text/javascript">
		if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
	</script>
	<script src="assets/js/bootstrap.min.js"></script>

	<!--page specific plugin scripts-->
    <script type="text/javascript" src="assets/js/inlinetable/jquery.fulltable.js"></script>
	<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
    
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/jquery.dataTables.bootstrap.js"></script>

	<!--ace scripts-->
	<script src="assets/js/ace-elements.min.js"></script>
	<script src="assets/js/ace.min.js"></script>

	<!--inline scripts related to this page-->
    <?php 
        if(isset($_GET['page'])){
            if($_GET['page'] == 'create'){
                include 'add_bpk.php';
            }
        }
    ?>
	<script>
        $(document).ready(function() {
            $('#modal-glaccount').dataTable({
                "aLengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
                "iDisplayLength": 5
            })
            $('#modal-costcenter').dataTable({
                "aLengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
                "iDisplayLength": 5
            })
            $('#modal-viewbpk').dataTable({
                "aLengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
                "iDisplayLength": 5
            })
            $('#modal-reportbpk').dataTable({
                "aLengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
                "iDisplayLength": 5
            })
        } );

        function show_box(id) {
            $('.widget-box.visible').removeClass('visible');
            $('#'+id).addClass('visible');
        }
        // ========================Jam========================================== //
        function showTime() {
            var a_p = "";
            var today = new Date();
            var curr_hour = today.getHours();
            var curr_minute = today.getMinutes();
            var curr_second = today.getSeconds();
            if (curr_hour < 12) {
                a_p = "AM";
            } else {
                a_p = "PM";
            }
            if (curr_hour == 0) {
                curr_hour = 12;
            }
            if (curr_hour > 12) {
                curr_hour = curr_hour - 12;
            }
            curr_hour = checkTime(curr_hour);
            curr_minute = checkTime(curr_minute);
            curr_second = checkTime(curr_second);
            document.getElementById('clock').innerHTML = curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
        }
        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }
        setInterval(showTime, 500);
        // ========================Akhir Jam========================================== /
    </script>
	</body>
</html>