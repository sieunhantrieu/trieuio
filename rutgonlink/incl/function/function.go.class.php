<?php
/**
 *		[HoaKhuya] (C)2010-2099 Hacking simple source Orzg.
 *		Drark license payto BitcoinAddress: 1HikvH2jnMNg4rDJHykMMk31gpyr2qrhU4
 *		Coders : develop@execs.com;yuna.elin@yandex.ru;tonghua@dr.com;
 *
 *		$Id: function.go.class.php [BuildDB.155478522] 10/07/2017 5:20 CH $
	
*/

class go extends shorten {
#_________________________________________________________________________________________
	function read($id)
	{
		$daba = $this->idorcustom($id);
		if ($daba == "id") {$data = explode("|",file_get_contents(database.$id.'.crypt'));}
		else { $data = explode("|",file_get_contents(database.$daba));}
		return $data;
		
	}
#_________________________________________________________________________________________
	function islive ($id)
	{
		$daba = $this->idorcustom($id);
	//	var_dump ($daba);
		if ($daba == "id") {if (file_exists(database.$id.'.crypt')){ return 'y';}else { return 'n';}}
		else { if (file_exists(database.$daba)){ return 'y';}else { return 'n';}}
		
	}
#_________________________________________________________________________________________
	function checkpwd ()
	{
		$time = time();
		$hashtime = $_SESSION['hashtimego'];
		$overlay = $time-$hashtime;
		if ($overlay<=5) {return '<span style="color:orange;"><i class="fa fa-exclamation-triangle" ></i> Wanna try to bug?</span>';}
		$userpw = md5(sha1($_POST['passwd']));
		$hashgo = shorten::hashgo('0');
		$hashpost = $_POST['hash'];
		$id = $_POST['id'];
		$data = go::read($id);
		$passwd = htmlentities($data[6]);
		$url= htmlentities(decrypt($data[5]));
		if ($hashgo !=$hashpost) { return '<span style="color:orange;"><i class="fa fa-exclamation-triangle" ></i> Your input is denied.</span>';}
		if ($passwd == $userpw OR $passwd=="null" ){return '<script type="text/javascript" charset="utf-8">window.location.href = "'.$url.'"</script>
		<span style="color:#99ff33;"><i class="fa fa-refresh fa-spin" ></i> Hold on, you on the way.</span>
		';}
		else { return '<span style="color:orange;"><i class="fa fa-exclamation-triangle" ></i> Your password is denied.</span>';}

	}
#_________________________________________________________________________________________

	function passprotect ()
	{
		return '
		
		
<div class="modal-content"><div class="inset-box" style="height: 70px;overflow: auto;margin-top: 10px;padding-left: 10px;padding-right: 10px;">
	
<div class="input-group">
				<input class="form-control input-lg" onblur="if(document.getElementById(\'passwd\').type==\'text\'){document.getElementById(\'passwd\').type=\'password\';}" onclick="if(document.getElementById(\'passwd\').type==\'password\'){document.getElementById(\'passwd\').type=\'text\';}" id="passwd" type="password" placeholder="Password Protect URL">
				<input class="form-control input-lg" id="hash" type="hidden" value="'.shorten::hashgo('0').'">
				<input class="form-control input-lg" id="id" type="hidden" value="'.htmlentities($_GET['input']).'">
				<span class="input-group-btn"><button id="hit" class="btn btn-success btn-lg" type="button">OK</button></span>
</div>
<small>Enter Password to continutes</small>	
</div></div></div>

<script type="text/javascript" charset="utf-8">
	$("#hit").click(function(){
				var passwd = document.getElementById("passwd").value;
				var id = document.getElementById("id").value;
				var hash = document.getElementById("hash").value;
				if (!passwd) { passwd="null";}
					if (passwd || id || hash){
					$.post("return.php?verfy=true",
					{
						passwd: passwd,
						id: id,
						hash: hash,
					},function(data,status){    
					$("small").html(data);
					
					         }); }

	})
</script>
		
		
		';
		
	}
#_________________________________________________________________________________________

	function work ($id)
	{
		$data = go::read($id);
		$url= htmlentities(decrypt($data[5]));
		$passwd =  htmlentities($data[6]);

		if ( $this->islive($id) == "n" ) { return 'Links nevers exists';}
		if ($passwd!="null") { return '
		<script type="text/javascript" charset="utf-8">
		
		 $(\'#term\').modal({backdrop: \'static\', keyboard: false});  
		 $(\'#term\').modal(\'show\').find(\'.modal-dialog\').load(\'return.php?passwd=true&input='.$id.'\');
		</script>';}
		else {
		
		return '<button type="button" onClick="location.href=\''.$url.'\'" class="btn btn-info">Skip AD <i class="fa fa-arrow-circle-right"></i></button>';
		}
	}
#_________________________________________________________________________________________
	function idorcustom ($id)
	{
		$convert_id = substr(md5 ($id),3,12).'.cus';
		$file  = database.$convert_id;
		
		if (file_exists($file))
		{
			return $convert_id;
		}
		else {
		return "id";	
		}
	}
#_________________________________________________________________________________________

	function check()
	{
	$id = htmlentities($_POST['url']);
	$hash = htmlentities($_POST['hash']);
	$hash1 = shorten::hashgo("0");
	$time = time();
	$hashtime = $_SESSION['hashtimego'];
	$overlay = $time-$hashtime;
	$error = '<script type="text/javascript" charset="utf-8">location.reload();</script>';
	
	if ($hash != $hash1) { return  $error;}
	else {
		if ($overlay>=5) {
		
		return $this->work($id);

		
		
		}
		else { return $error;}
	}
	
	
	
	
	}
	
#_________________________________________________________________________________________

	function theme()
	{
		
		return '
		
		
		
		
		
		

		
		
		
		<wtf><button type="button"  class="btn btn-link"><i class="fa fa-spin fa-refresh"></i><span id="worked">00:05</span></button></wtf>
		
		
		
		
		
		
		<script type="text/javascript">
$(document).ready(function (e) {
    var $worked = $("#worked");

    function update() {
        var myTime = $worked.html();
        var ss = myTime.split(":");
        var dt = new Date();
        dt.setHours(0);
        dt.setMinutes(ss[0]);
        dt.setSeconds(ss[1]);

        var dt2 = new Date(dt.valueOf() - 1000);
        var temp = dt2.toTimeString().split(" ");
        var ts = temp[0].split(":");
		if (ts[2]>=1) {setTimeout(update, 1000);$worked.html(ts[1]+":"+ts[2]);}
		if(ts[2]==0) {
		$.post("return.php?bypass=true",
					{
						url: "'.htmlentities($_GET['goid']).'",
						hash: "'.shorten::hashgo("change").'",
					},function(data,status){
						
						$("wtf").html(data);
						});
		
		}
        
    }

    setTimeout(update, 2500);
});

</script>
		
		
		
		
		
		
		
		';
		
		
		
		
		
		
		
	}
	
}
?>