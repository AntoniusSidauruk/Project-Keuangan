$(document).ready(function(){
	$('#keyword').on('keyup', function(){
		$('#container').load('karyawan/karyawan.php?keyword=' + $('#keyword').val());
	});
});