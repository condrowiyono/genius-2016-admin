function Countdown(){
	setTimeout(function(){
		$.post('alat/isisimulasi.php',function(data){
		    $('#simulasi').html(data);
		});
		Countdown();
	}, 1000);
}

$(document).ready(function(){
	Countdown();
});