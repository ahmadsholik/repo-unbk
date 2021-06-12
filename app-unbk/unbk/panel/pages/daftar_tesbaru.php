<?php
	if(!isset($_COOKIE['beeuser'])){
	header("Location: login.php");}
	
?>



<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="jquery-1.4.js"></script>
<script src="../../assets/jquery-1.12.4.js"></script>
    <script src="../../assets/jquery.dataTables.min.js"></script>
    <!-- jQuery -->
    

    <!-- Metis Menu Plugin JavaScript -->
	 <script>
	   $(document).ready(function() {
		$('#example').DataTable( {
			"scrollY": 200,
			"scrollX": true
		} );
	} );
   </script>
 <?php 
 $tgljam = date("Y/m/d H:i");  
 $tgl = date("Y/m/d"); 
 
 ?>
  <link rel="stylesheet" type="text/css" href="./jquery.datetimepicker.css"/>
<style type="text/css">

.custom-date-style {
	background-color: red !important;
}

.input{	
}
.input-wide{
	width: 500px;
}

</style>


<script src="date/jquery.js"></script>
<script src="jquery.datetimepicker.full.js"></script>
<?php 
$tgx = 29;
$blx = 9;
$thx = 2016;

$tglx = date("Y/m/d");
$jamx = date("H:i:s");
?>



            <div class="portlet light ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        Set Aktivasi Ujian
                                    </div>
								</div>
								<div class="actions"></div>
                        
                        <div class="portlet-body">
                        	                       
                        
                           <table id="example" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
	                                    <th width="6%">No.</th>
                                        <th width="20%">Kode Bank Soal</th>
                                        <th width="25%">Mata Pelajaran</th>
                                        <th width="8%">Soal</th>	
                                        <th width="8%">Kelas</th>
                                        <th width="15%">Waktu</th>                                                                             
                                        <th width="8%">Sesi</th>                                                                            
                                        <th width="8%">Status</th>  
                                        <th width="8%">Jadwal</th>
										    
                                 </tr>
                                </thead>
                                <tbody>
                                
								<?php 
$no=0;
$sql = mysqli_query($GLOBALS["___mysqli_ston"], "select p.*,m.*,p.Urut as Urutan,p.XKodeKelas  as kokel from cbt_paketsoal p left join cbt_mapel m on m.XKodeMapel = p.XKodeMapel where p.XStatusSoal='Y' order by p.Urut desc");
//$sql = mysql_query("select u.*,m.*,u.Urut as Urutan,u.XKodeKelas as kokel from cbt_ujian u left join cbt_mapel m on m.XKodeMapel = u.XKodeMapel left join cbt_paketsoal p on p.XKodeSoal = u.XKodeSoal where u.XStatusUjian='1'");

					while($s = mysqli_fetch_array($sql)){ 
					$sqlsoal = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from cbt_soal where XKodeSoal = '$s[XKodeSoal]'"));
					$sqlpakai = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from cbt_siswa_ujian where XKodeSoal = '$s[XKodeSoal]' and XStatusUjian = '1'"));
					$sqlsudah = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "select * from cbt_jawaban where XKodeSoal = '$s[XKodeSoal]'"));
					if($sqlsoal<1){$kata="disabled";}  else {$kata="";}	
					if($sqlsudah>0||$sqlpakai>0){$kata="disabled";}  else {$kata="";}			
					if($sqlpakai>0){$katapakai="disabled";}  else {$katapakai="";}			
							
								
$sqltes = mysqli_query($GLOBALS["___mysqli_ston"], "select XJamUjian,XTglUjian,XStatusUjian,XSesi,XTampil from cbt_ujian where XKodeSoal = '$s[XKodeSoal]' and  XKodeMapel = '$s[XKodeMapel]' and  XKodeJurusan = '$s[XKodeJurusan]' and  XKodeKelas = '$s[kokel]' and XStatusUjian='1'");		
 $stu = mysqli_fetch_array($sqltes);
 $tjamujian = $stu['XJamUjian'];
 $ttglujian = $stu['XTglUjian'];
 $sttsujian = $stu['XStatusUjian'];
 $no++
								?>
                                
                                    <tr class="odd gradeX">
                                        <td align="center"><input type="hidden" value="<?php echo $s['Urutan']; ?>" id="txt_mapel<?php echo $s['Urutan']; ?>"><?php echo $no; ?></td>
                                        <td align="center"><?php echo $s['XKodeSoal']; ?></td>
                                        <td align="center"><?php echo  $s['XNamaMapel']." - ".$s['XKodeMapel']; ?></td>
                                        <td align="center"><?php echo "$sqlsoal (". $s['XJumPilihan']." opsi)"; ?></td>                                           
                                        <td align="center"><?php echo $s['kokel']."-".$s['XKodeJurusan']; ?></td> 
                                        <td align="center"><?php echo "$ttglujian $tjamujian"; ?></td>
                                        <td align="center">
                                       
                                        <?php echo "$stu[XSesi]"; ?>
                                        </td>
										<td align="center">													
                                        <?php if($sttsujian=="1"){ ?>
                                        <input type="button" id="simpan<?php echo $s['Urutan']; ?>" class="btn btn-success" value="Dikerjakan"  disabled>
                                        <?php } else { ?>
                                        <input type="button" id="simpan<?php echo $s['Urutan']; ?>" class="btn btn-default" value="Matikan">                                        <?php } ?>
                                        </td>     
                                        
                                        <td align="center">
                                         <a href="?modul=edit_tes&idtes=<?php echo $s['Urutan']; ?>">
                                       <button type="button" class="btn btn-info btn-small">
                                        <i class="fa fa-clock-o  ">&nbsp;Set</i></button></a>
  							
                                      
                                        </td>     
                                                                                                              
                                    </tr>
									
									

                                 
  <!-- Modal confirm -->
<div class="modal" id="confirmModal" style="display: none; z-index: 1050;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="confirmMessage">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="confirmOk">Ok</button>
                <button type="button" class="btn btn-default" id="confirmCancel">Cancel</button>
            </div>
        </div>
    </div>
</div>

					<?php } ;?>
                              
                                </tbody>
                            </table>
							
					 <div class="well">
					    <h4><span style="color: #1B06CF;"><?php echo $skull; ?>-CBT</span></h4>
						<ul><li><font color="#FF0033">Bank Soal Yang dipakai Seluruh Kelas dan Jurusan harus berdiri sendiri. TIDAK BOLEH AKTIF dengan Bank Soal lain</font></li>
						<li>Beberapa ujian (untuk Kelas dan Jurusan berbeda) bisa di setting waktu bersamaan. </li>
						<li>Apabila Satu kelas ada beberapa Tes bersamaan (untuk kelas dan jurusan yang sama). 
							Akan mengakibatkan Peserta tidak dapat mengikuti Ujian (* Terlambat mengikuti Ujian)</li>
						<li>Daftar diatas merupakan Paket Soal yang sudah diaktifkan oleh Guru. Silahkan melakukan pengaturan Jadwal ujian (Klik tombol 'Set' pada Menu Jadwal)</li>
						<li><font color="#FF0033">Hapus&BackUp database soal-jawab tiap sesi setelah Ujian dan administrasi selesai supaya kerja <b>SERVER TIDAK BERAT/LAMBAT</b></font></li>
						</ul>
					</div> 
                        <!-- /.well -->
            </div>
                    <!-- /.porlet body -->
        </div>

<script>/*
window.onerror = function(errorMsg) {
	$('#console').html($('#console').html()+'<br>'+errorMsg)
}*/
$.noConflict();
jQuery( document ).ready(function( $ ) {
$.datetimepicker.setLocale('en');

$('#datetimepicker_format').datetimepicker({value:'2015/04/15 05:03', format: $("#datetimepicker_format_value").val()});
console.log($('#datetimepicker_format').datetimepicker('getValue'));

$("#datetimepicker_format_change").on("click", function(e){
	$("#datetimepicker_format").data('xdsoft_datetimepicker').setOptions({format: $("#datetimepicker_format_value").val()});
});
$("#datetimepicker_format_locale").on("change", function(e){
	$.datetimepicker.setLocale($(e.currentTarget).val());
});

$('#datetimepicker<?php echo $s['Urutan']; ?>').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
startDate:	'1986/01/05'
});
$('#datetimepicker<?php echo $s['Urutan']; ?>').datetimepicker({value:'2015/04/15 05:03',step:10});
$('.some_class').datetimepicker();
$('#default_datetimepicker<?php echo $s['Urutan']; ?>').datetimepicker({
	formatTime:'H:i',
	//formatDate:'d.m.Y',
	formatDate:'Y.m.d',
	//defaultDate:'8.12.1986', // it's my birthday
	defaultDate:'+03.01.1970', // it's my birthday
	defaultTime:'10:00',
	timepickerScrollbar:false
});
$('#datetimepicker10').datetimepicker({
	step:5,
	inline:true
});
$('#mulai2').datetimepicker({
	datepicker:false,
	format:'H.i',
	step:5
});
$('#datetimepicker_mask<?php echo $s['Urutan']; ?>').datetimepicker({
	mask:'9999/19/39 29:59'
});
$('#datetimepicker_mask<?php echo $s['Urutan']; ?>').datetimepicker({value:'<?php echo "$tglx $jamx"; ?>',step:10});
$('#datetimepicker_dark').datetimepicker({theme:'dark'})
        }); 
</script>
                                    
<script>    
$(document).ready(function(){
	$("#txt_durasi<?php echo $s['Urutan']; ?>").change(function(){
		var txt_durasi = $("#txt_durasi<?php echo $s['Urutan']; ?>").val();
		$.ajax({
		url: "ambil_token.php",
		data: "txt_ujian="+txt_durasi,
		cache: false,
		success: function(msg){
		$("#txt_token<?php echo $s['Urutan']; ?>").val(msg);
		}
		});
	});

 $("#kirim<?php echo $s['Urutan']; ?>").click(function(){
 //alert("tes");
 var txt_ujian = $("#txt_ujian<?php echo $s['Urutan']; ?>").val();
 var txt_semester = $("#txt_semester<?php echo $s['Urutan']; ?>").val();
 var txt_waktu = $("#datetimepicker_mask<?php echo $s['Urutan']; ?>").val();
 var txt_token = $("#txt_token<?php echo $s['Urutan']; ?>").val();
 var txt_durasi = $("#txt_durasi<?php echo $s['Urutan']; ?>").val();
 var txt_kodesoal = $("#txt_kodesoal<?php echo $s['Urutan']; ?>").val();
 var txt_sesi = $("#txt_sesi<?php echo $s['Urutan']; ?>").val();
 var txt_hasil = $("#txt_hasil<?php echo $s['Urutan']; ?>").val();
 var txt_statustoken = $("#txt_statustoken<?php echo $s['Urutan']; ?>").val();
 var mulai2 = $("#mulai2").val();
 var txt_pdf = $("#txt_pdf<?php echo $s['Urutan']; ?>").val();
 var txt_filepdf = $("#txt_filepdf<?php echo $s['Urutan']; ?>").val();
 var txt_listen = $("#txt_listen<?php echo $s['Urutan']; ?>").val();
 
 if(txt_durasi==""){
 alert("Durasi Ujian masih KOSONG");
 return false;
 }
 
$.ajax({
     type:"POST",
     url:"simpan_jadwal.php",    
     data: "aksi=simpan&txt_ujian=" + txt_ujian + "&txt_waktu=" + txt_waktu + "&txt_token=" + txt_token + "&txt_durasi=" + txt_durasi  + "&txt_filepdf=" + txt_filepdf + "&txt_pdf=" + txt_pdf+ "&txt_listen=" + txt_listen
	  + "&txt_kodesoal=" + txt_kodesoal + "&txt_semester=" + txt_semester + "&txt_hasil=" + txt_hasil + "&txt_sesi=" + txt_sesi + "&txt_statustoken=" + txt_statustoken + "&mulai2=" + mulai2,
	 success: function(data){
	  $("#infoz").html(data);
	  document.getElementById("ndelik").style.display = "block";
	  //alert(txt_waktu);
		//tampildata();
	 }
	 });
	 });
	

});
</script>                            
                                           
<script>    
$(document).ready(function(){
$("#simpan<?php echo $s['Urutan']; ?>").click(function(){
//alert("<?php echo $s['Urutan']; ?>");
 var txt_ujian = $("#txt_ujian").val();
 var txt_jawab = $("#txt_jawab").val();
 var txt_acak = $("#switch_left").val();
 var txt_durasi = $("#txt_durasi").val();
 var txt_telat = $("#txt_telat").val();
 var txt_soal = $("#txt_soal").val();  
 var txt_mapel = $("#txt_mapel<?php echo $s['Urutan']; ?>").val();
 var txt_level = $("#txt_level").val(); 
 var txt_nama = $("#txt_nama").val();  
 var txt_sesi = $("#txt_sesi").val();    
 
 
 $.ajax({
     type:"POST",
     url:"simpan_soal.php",    
     data: "aksi=simpan&txt_ujian=" + txt_ujian + "&txt_jawab=" + txt_jawab + "&txt_acak=" + txt_acak + "&txt_telat=" + txt_telat + "&txt_durasi=" + txt_durasi + "&txt_soal=" + txt_soal + "&txt_level=" + txt_level + "&txt_mapel=" + txt_mapel + "&txt_nama=" + txt_nama + "&txt_sesi=" + txt_sesi,
	 success: function(data){
		if( $("#simpan<?php echo $s['Urutan']; ?>").hasClass( "btn-success" ) )
		{
		 $("#simpan<?php echo $s['Urutan']; ?>").removeClass("btn-success").addClass("btn-default");
		 $("#simpan<?php echo $s['Urutan']; ?>").val("Aktif");
		} else {	 	
	 	 $("#simpan<?php echo $s['Urutan']; ?>").removeClass("btn-info").addClass("btn-success");
		 $("#simpan<?php echo $s['Urutan']; ?>").val("Matikan");		 

		}
	  document.location.reload();
		loading.fadeOut();
		tampilkan.html(data);
		tampilkan.fadeIn(100);
	 tampildata();
	 }
	 });
	 });
	 
$("#acak<?php echo $s['Urutan']; ?>").click(function(){
//alert("<?php echo $s['Urutan']; ?>");
 var txt_ujian = $("#txt_ujian").val();
 var txt_jawab = $("#txt_jawab").val();
 var txt_acak = $("#switch_left").val();
 var txt_durasi = $("#txt_durasi").val();
 var txt_telat = $("#txt_telat").val();
 var txt_soal = $("#txt_soal").val();  
 var txt_mapel = $("#txt_mapel<?php echo $s['Urutan']; ?>").val();
 var txt_level = $("#txt_level").val(); 
 var txt_nama = $("#txt_nama").val(); 
 var txt_sesi = $("#txt_sesi").val();  
  
 $.ajax({
     type:"POST",
     url:"simpan_soal.php",    
     data: "aksi=acak&txt_ujian=" + txt_ujian + "&txt_jawab=" + txt_jawab + "&txt_acak=" + txt_acak + "&txt_telat=" + txt_telat + "&txt_durasi=" + txt_durasi + "&txt_soal=" + txt_soal + "&txt_level=" + txt_level + "&txt_mapel=" + txt_mapel + "&txt_nama=" + txt_nama + "&txt_sesi=" + txt_sesi,
	 success: function(data){

		if( $("#acak<?php echo $s['Urutan']; ?>").hasClass( "btn-success" ) )
		{
		 $("#acak<?php echo $s['Urutan']; ?>").removeClass("btn-success").addClass("btn-warning");
		 $("#acak<?php echo $s['Urutan']; ?>").val("Tidak");
		} else {	 	
	 	 $("#acak<?php echo $s['Urutan']; ?>").removeClass("btn-warning").addClass("btn-success");
		 $("#acak<?php echo $s['Urutan']; ?>").val("Acak");
		}

		loading.fadeOut();
		tampilkan.html(data);
		tampilkan.fadeIn(100);
	 tampildata();
	 }
	 });
	 });	 


$("#hapus<?php echo $s['Urutan']; ?>").click(function(){
//	 alert("<?php echo $s['Urutan']; ?>");
 var txt_ujian = $("#txt_ujian").val();
 var txt_jawab = $("#txt_jawab").val();
 var txt_acak = $("#switch_left").val();
 var txt_durasi = $("#txt_durasi").val();
 var txt_telat = $("#txt_telat").val();
 var txt_soal = $("#txt_soal").val();  
 var txt_mapel = $("#txt_mapel<?php echo $s['Urutan']; ?>").val();
 var txt_level = $("#txt_level").val(); 
  var txt_nama = $("#txt_nama").val();  
  
 $.ajax({
     type:"POST",
     url:"hapus_soal.php",    
     data: "aksi=hapus&txt_ujian=" + txt_ujian + "&txt_jawab=" + txt_jawab + "&txt_acak=" + txt_acak + "&txt_telat=" + txt_telat + "&txt_durasi=" + txt_durasi + "&txt_soal=" + txt_soal + "&txt_level=" + txt_level + "&txt_mapel=" + txt_mapel + "&txt_nama=" + txt_nama,
	 success: function(data){

		loading.fadeOut();
		tampilkan.html(data);
		tampilkan.fadeIn(100);
	 tampildata();
	 }
	 });
	 });

$('#btnDelete<?php echo $s['Urutan']; ?>').on('click', function(e){
    confirmDialog("Apakah yakin akan menghapus Bank Soal ini? ", function(){
        //My code to delete
		var txt_ujian = $("#txt_ujian").val();
 var txt_jawab = $("#txt_jawab").val();
 var txt_acak = $("#switch_left").val();
 var txt_durasi = $("#txt_durasi").val();
 var txt_telat = $("#txt_telat").val();
 var txt_soal = $("#txt_soal").val();  
 var txt_mapel = $("#txt_mapel<?php echo $s['Urutan']; ?>").val();
 var txt_level = $("#txt_level").val(); 
  var txt_nama = $("#txt_nama").val();  
  
 $.ajax({
     type:"POST",
     url:"hapus_soal.php",    
     data: "aksi=hapus&txt_ujian=" + txt_ujian + "&txt_jawab=" + txt_jawab + "&txt_acak=" + txt_acak + "&txt_telat=" + txt_telat + "&txt_durasi=" + txt_durasi + "&txt_soal=" + txt_soal + "&txt_level=" + txt_level + "&txt_mapel=" + txt_mapel + "&txt_nama=" + txt_nama,
	 success: function(data){
	  document.location.reload();
	 // alert("hapus");

		loading.fadeOut();
		tampilkan.html(data);
		tampilkan.fadeIn(100);
	 tampildata();
	 }
	 });
    });
});

function confirmDialog(message, onConfirm){
    var fClose = function(){
        modal.modal("hide");
    };
    var modal = $("#confirmModal");
    modal.modal("show");
    $("#confirmMessage").empty().append(message);
    $("#confirmOk").one('click', onConfirm);
    $("#confirmOk").one('click', fClose);
    $("#confirmCancel").one("click", fClose);
}



});


</script>

<script>
function myFunction() {
   document.location.reload();
}
</script>




<!--		
<div class="modal fade bs-modal-lg in" id="myJadwal<?php echo $s['Urutan']; ?>" tabindex="-1" role="dialog" aria-labelledby="myJadwalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Setting Jadwal Ujian</h4>
      </div>
      <div class="modal-body">
	  
	 <form action="?modul=datar_tesbaru&kirim=yes" method="post" >
	  <div id="infoz" class="infoz"></div>
		<div class="row">
		<div class="col-md-6">
		<div class="form-group">
		<label class="control-label">Jenis Ujian</label>
			<select class="form-control" id="txt_ujian<?php echo $s['Urutan']; ?>">
				<?php	$sqlkelas = mysqli_query($GLOBALS["___mysqli_ston"], "select * from cbt_tes order by Urut");
						while($k = mysqli_fetch_array($sqlkelas)){
							echo "<option value='$k[XKodeUjian]'>$k[XNamaUjian]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>";
				} ?>
			</select>
		</div>
		</div>
		<div class="col-md-6">
		<div class="form-group">
		<label class="control-label">Semester</label>       
			<select class="form-control" id="txt_semester<?php echo $s['Urutan']; ?>">
				<?php	echo "<option value='1'>1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>";
						echo "<option value='2'>2</option>";
				?>
			</select>
		</div>
		</div>
		</div>
		<div class="row">
		<div class="col-md-6">
		<div class="form-group">
		<label class="control-label">Listening</label>        
			<select class="form-control" id="txt_listen<?php echo $s['Urutan']; ?>">
				<?php	echo "<option value='1'>Sekali</option>";
						echo "<option value='2'>Dua Kali</option>";
						echo "<option value='3'>terusan</option>";
				?>
			</select>
		</div>
		</div>
		
		<div class="col-md-6">
		<div class="form-group">
		<label class="control-label">Soal PDF</label>                              
			<select class="form-control" class="form-control" id="txt_pdf<?php echo $s['Urutan']; ?>">
				<?php 	echo "<option value='0'>Bukan PDF</option>";
						echo "<option value='1'>Soal PDF</option>";
				 ?>
			</select>
		</div>
		</div>
		</div>
		<div class="row">
		<div class="col-md-6">
		<div class="form-group">
		<label class="control-label">Nama File PDF</label>
			<input class="form-control" type="text" size="25" id="txt_filepdf<?php echo $s['Urutan']; ?>"/>
		</div>
		</div>
		<div class="col-md-6">
		<div class="form-group">
		<label class="control-label">Sesi Ujian</label>
			<select class="form-control" id="txt_sesi<?php echo $s['Urutan']; ?>">
			<option value='ALL'>Semua</option>
				<?php	$sqlsesi = mysqli_query($GLOBALS["___mysqli_ston"], "select * from cbt_siswa group by XSesi");
						while($sk = mysqli_fetch_array($sqlsesi)){echo "<option value='$sk[XSesi]'>$sk[XSesi]</option>";}
				?>
			
			</select>
		</div>
		</div>
		</div>
		<div class="row">
		<div class="col-md-6">
		<div class="form-group">
		<label class="control-label">Waktu Pelaksanaan</label>
			<input class="form-control" type="text" size="25" value="" id="datetimepicker_mask<?php echo $s['Urutan']; ?>"/>
		</div>
		</div>
		<div class="col-md-6">
		<div class="form-group">
		<label class="control-label">Durasi Tes</label>	
			<input class="form-control" type="text" size="10" id="txt_durasi<?php echo $s['Urutan']; ?>" placeholder="(dalam menit)"/> 
		
		</div>
		</div>
		</div>
		<div class="row">
		<div class="col-md-6">
		<div class="form-group">
		<label class="control-label">Ujian ditutup</label>
			<input class="form-control" type="text" size="10" value='' id="mulai2"/><td>
		</div>
		</div>
		<div class="col-md-6">
		<div class="form-group">
		<label class="control-label">NILAI</label>
			<select class="form-control" id="txt_hasil<?php echo $s['Urutan']; ?>">
				<?php	echo "<option value='0'>NILAI Tidak Ditampilkan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>";
                        echo "<option value='1'>NILAI Ditampilkan</option>";	 
				?> 
			</select>
		</div>
		</div>
		</div>
		<div class="row">
		<div class="col-md-6">
		<div class="form-group">
		<label class="control-label">Status TOKEN</label>   
			<input class="form-control" type="hidden" size="3" id="txt_kodesoal<?php echo $s['Urutan']; ?>" value="<?php echo $s['XKodeSoal']; ?>"/>
				<select class="form-control" id="txt_statustoken<?php echo $s['Urutan']; ?>">
                    <?php	echo "<option value='0'>TOKEN Tidak Ditampilkan &nbsp;&nbsp;&nbsp;&nbsp;</option>";
							echo "<option value='1'>TOKEN Ditampilkan</option>";	 
					?>
				</select>
		</div>
		</div>
		<div class="col-md-6">
		<div class="form-group">
		<label class="control-label">TOKEN</label>
			<input class="form-control"type="text" size="10" id="txt_token<?php echo $s['Urutan']; ?>">
		</div>
		</div>
		</div>
        <button type="button" class="btn btn-default" data-dismiss="modal" onClick="myFunction()">Close</button>
			<button type="button" class="btn btn-info btn-small" id="kirim<?php echo $s['Urutan']; ?>"> Rilis Token </i></button>
			<a href="?modul=daftar_tesbaru">
			<button type="button" class="btn btn-default" data-dismiss="modal" >Kembali
			</button></a>	
       <div style="background-color:#f2f1e8; padding:5px;"> 
       <p><font color="#cd0202">* Perhatian </font></p>
	    <p>- <b>Penggunaan Soal PDF </b>form template soal hanya perlu isi kunci jawaban, soal dan jawaban tidak boleh diacak</p>
		<p>- <b>Penggunaan Soal PDF </b>belum didukung pada pengguna Android, masih terbatas untuk desktop/laptop saja.</p>
       <p>- Siswa dianggap terlambat apabila ada dua jawal bersamaan</p>
       <p>- Siswa dinyatakan terlambat bila login setelah waktu Ujian ditutup</p>
       </div>

		 <div class="modal-footer">
			
		  </div>
		</form>
	  </div>
    </div>
  </div>
</div>


 <!-- BEGIN CORE PLUGINS -->
        <script src="../../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
		   
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    
	
	
	});
    </script>
    <script>$(document).ready(function() {
    var table = $('#example').DataTable();
 
    $('#example tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
 
    $('#button').click( function () {
        table.row('.selected').remove().draw( false );
    } );
} );</script>
    
 
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Buat Bank Soal Baru</h4>
      </div>
      <div class="modal-body">
        <?php include "buat_banksoalbaru.php";?>
      </div>
      <div class="modal-footer">
	       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



  <!-- Button trigger modal -->
  <!-- Modal -->
  <!-- Modal

                            

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
	$('#myModal').on('shown.bs.modal', function () {
	  $('#myInput').focus()
	})
	$('#myModal').on('hidden.bs.modal', function () {
	  document.location.reload();
	 // alert("tes");
	})
	
	$('#confirmModal').on('hidden.bs.modal', function () {
	  document.location.reload();
	  //alert("hapus");
	})
</script> -->


