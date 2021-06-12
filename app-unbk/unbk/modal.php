<?php include "config/server.php";?>
<!DOCTYPE html>
<!-- saved from url=(0052)http://thorst.github.io/jquery-idletimer/prod/demos/ -->
<html><head><meta http-equiv="X-UA-Compatible" content="IE=edge">    
        <title>Aplikasi UNBK | Login Untuk Memulai Ujian</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="description" content="Aplikasi UNBK, membantu anda sukses dalam ujian dengan memulai belajar test berbasis Komputer dengan beragam soal-soal ujian."> 
        <meta name="keyword" content="UNBK, Ujian, Ujian Nasional, Ulangan Harian, Ulangan Semester, Mid Semester, Test CPNS, Test SMBPTN">
        <meta name="google" content="nositelinkssearchbox" />
        <meta name="robots" content="index, follow">
        <link href="css/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/css/main.css" rel="stylesheet">
        <link href="css/css/mainam.css" rel="stylesheet">
        <link href="css/css/mainan.css" rel="stylesheet">
        <link href="css/cs/selectbox.min.css" rel="stylesheet">
    <!-- jQuery and idleTimer -->
    <script type="text/javascript" src="js/jquery-1.11.0.min.js.download"></script>
    <script type="text/javascript" src="js/idle-timer.js.download"></script>

    <!-- Bootstrap/respond (ie8) and moment -->
    <link href="js/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js.download"></script>
    <script src="js/respond.js.download"></script>
    <script src="js/moment.js.download"></script>

    <!-- Respond.js proxy on external server -->
    <link href="http://netdna.bootstrapcdn.com/respond-proxy.html" id="respond-proxy" rel="respond-proxy">
    <link href="http://thorst.github.io/jquery-idletimer/prod/demos/respond.proxy.gif" id="respond-redirect" rel="respond-redirect">
    <script src="js/respond.proxy.js.download"></script>
    
    <style>
        body {
            margin-top: 40px;
            margin-bottom: 40px;
        }

        .btn {
            padding: 5px 6px;
        }
    </style>
</head>
<body class="">
   
    <div class="container">

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        /*
        scrollToBottom plugin, chainable
        */
        $.fn.scrollToBottom = function () {
            this.scrollTop(this[0].scrollHeight);
            return this;
        };
        /*
        click event for alert button
        */
        (function ($) {
            //Display alert
            $("#alert").click(function () { alert("Hello!"); return false; });
        })(jQuery);


    </script>

    <script type="text/javascript">
        /*
        Code for document idle timer
        */
        (function ($) {
            //Define default
			
			var habis = 60; //entry berapa menit
			
            var
                docTimeout = 6000*habis; /* default 60000 ada adalah 1 menit
            ;

            /*
            Handle raised idle/active events
            */
            $(document).on("idle.idleTimer", function (event, elem, obj) {
                $("#docStatus")
                    .val(function (i, v) {
                        return v + "Idle @ " + moment().format() + " \n";
                    })
                    //.removeClass("alert-success")
                    //.addClass("alert-warning")
                    //.scrollToBottom();
					//$("#myModal").modal("show");
					//window.location="logout.php";
					window.location="idle.php";
					
            });
            $(document).on("active.idleTimer", function (event, elem, obj, e) {
                $('#docStatus')
                    .val(function (i, v) {
                        return v + "Active [" + e.type + "] [" + e.target.nodeName + "] @ " + moment().format() + " \n";
                    })
                    //.addClass("alert-success")
                    //.removeClass("alert-warning")
                    //.scrollToBottom();
					//					$("#myModal").modal("hide");
					<?php
					
					if(isset($_COOKIE['PESERTA'])){
					$user = $_COOKIE['PESERTA'];
					$jam = date("H:i:s");
					$sql2 = mysqli_query($GLOBALS["___mysqli_ston"], "Update cbt_siswa_ujian set XLastUpdate = '$jam' where XTglUjian = '$xtglujian' and XNomerUjian = '$user' and XStatusUjian = '1'");
					}
					?>
            });

           

            //Clear old statuses
            $('#docStatus').val('');

            //Start timeout, passing no options
            //Same as $.idleTimer(docTimeout, docOptions);
            $(document).idleTimer(docTimeout);

            //For demo purposes, style based on initial state
            if ($(document).idleTimer("isIdle")) {
                $("#docStatus")
                  .val(function (i, v) {
                      return v + "Initial Idle State @ " + moment().format() + " \n";
                  })
                  .removeClass("alert-success")
                  .addClass("alert-warning")
                  .scrollToBottom();
            } else {
                $('#docStatus')
                    .val(function (i, v) {
                        return v + "Initial Active State @ " + moment().format() + " \n";
                    })
                    .addClass("alert-success")
                    .removeClass("alert-warning")
                    .scrollToBottom();
            }


            //For demo purposes, display the actual timeout on the page
            $('#docTimeout').text(docTimeout / 10000);


        })(jQuery);

    </script>



</body></html>