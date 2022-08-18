<?php
/**
 *		[HoaKhuya] (C)2010-2099 Hacking simple source Orzg.
 *		Drark license payto BitcoinAddress: 1HikvH2jnMNg4rDJHykMMk31gpyr2qrhU4
 *		Coders : develop@execs.com;yuna.elin@yandex.ru;tonghua@dr.com;
 *
 *		$Id: function.class.php [BuildDB.155478522] 10/07/2017 5:20 CH $
	
*/

function encrypt($string) {global $C_CONFIG_KEY; $key=$C_CONFIG_KEY;$result = '';for($i=0; $i<strlen($string); $i++) {$char = substr($string, $i, 1);$keychar = substr($key, ($i % strlen($key))-1, 1);$char = chr(ord($char)+ord($keychar));$result.=$char;}return base64_encode($result);}
function decrypt($string) {global $C_CONFIG_KEY; $key=$C_CONFIG_KEY;$result = '';$string = base64_decode($string);for($i=0; $i<strlen($string); $i++) {$char = substr($string, $i, 1);$keychar = substr($key, ($i % strlen($key))-1, 1);$char = chr(ord($char)-ord($keychar));$result.=$char;}return $result;}

class shorten {
#_________________________________________________________________________________________
	function submiturl ($url,$pass)
	{
	$conf = explode("|",file_get_contents(config));
	$now = $conf[1]+1;
	$data	= base_convert($now, 10, 36);   # 'a'
	$cur = '|'.$now.'|'.$conf[2].'|'.$conf[3].'|'.$conf[4].'|'.$conf[5].'';
	$crypt = encrypt($url);
	if ($pass != "null") {$pass = md5(sha1($pass));}
	$contents = "|0|COUNTRY|REFER|PLANFORM|$crypt|$pass|-9|CLICK|";
	$crypt = ".crypt";
	#custom_ 
	$custom = $_SESSION['customurl'];
	if ($custom !="") {
	$datid = $this->thiscustom($custom);
				if ($datid=="n")
				{
					$data = substr(md5 ($custom),3,12);
					$crypt = ".cus";
				}
	
	
	}
	else {
		$checkid = $this->thiscustom($data);
		if ($checkid !="n") 
		{
			$letter = substr(md5(sha1(time().rand(0,9999))),4,10);
			$data = $letter;
		}
		
	}
		
	
	
	
	
	file_put_contents (config,$cur);
	file_put_contents (database.$data.$crypt,$contents);
	$_SESSION['customurl']="";if ($crypt ==".cus") { return $custom;}
	return $data;
	}
#_________________________________________________________________________________________

	function customname ($input){
	$strnum = strlen($input);
	$hash = $this->hashcreate('0');
	$hashpost = $_POST['hash'];
	if ($strnum>=16 OR  $hash != $hashpost OR !$hash){$_SESSION['customurl']=''; return '<font color="#ff99cc"><i class="fa fa-exclamation-triangle"></i> Your custom URL has been used by another.</font>';}
	elseif (preg_match("/([^a-zA-Z0-9]+)/",$input)) {$_SESSION['customurl']='';  return '<font color="#ff99cc"><i class="fa fa-exclamation-triangle"></i> Your custom URL is denied.</font>';}
	else {
	
		$convert_input = substr(md5 ($input),3,12);
		$data_file = database.$convert_input.'.cus';
		$sreach = database.$input.'.crypt';
		if (!file_exists($data_file) AND !file_exists($sreach)){$_SESSION['customurl']=$input;return '<font color="#00ffff"><i class="fa fa-check-circle"></i> Your custom URL is ready to use.</font>';}
		else {$_SESSION['customurl']=''; return '<font color="#ff99cc"><i class="fa fa-exclamation-triangle"></i> Your custom URL has been used by another, you can pick another one or we will.</font>';}
		
		
	}
	
	
	}
#_________________________________________________________________________________________
	function thiscustom ($id)
	{
		$convert_id = substr(md5 ($id),3,12).'.cus';
		if (file_exists(database.$convert_id)){return $convert_id;}
		else { return 'n';}
	}
#_________________________________________________________________________________________
	function banlist ($url)
	{
		preg_match('@^(?:http://|https://)?([^/]+)@i',$url, $matches);
		$data = $matches[1];
		$ban = "/(is.gd|bit.do|riffhold.com|bitigee.com|aly.vn|shorte.st|linkshrink.net|adyou.me|uskip.me|blv.me|binbucks.com|spaste.com|ah.pe|ouo.io|cash4files.com|linkbucks.com|fas.li|filesonthe.net|goneviral.com|megaline.co|miniurls.co|seriousdeals.net|theseblogs.com|theseforums.com|tinylinks.co|tubeviral.com|ultrafiles.net|urlbeat.net|whackyvidz.com|qqc.co|yyv.co|erq.io|yko.io|tiny.cc|tinyium.com|microify.com|atomcurve.com|mcaf.ee|picocurl.com|ay.gy|ow.ly|goo.gl|bit.ly|shota.one|j.gs|q.gs|tinyurl.com|thinfi.com)/si";
		if ( preg_match ($ban,$data)) { return 'BANNED';} else { return $data;}
	
	}
#_________________________________________________________________________________________
	function checkurl ($url)
	{
		$num = strlen($url);
		if (preg_match('("|<|>|\')',$url)){ return 'n';}
		elseif ($num>=600 OR $num<=5){ return 'n';}
		elseif(preg_match( '/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}'.'((:[0-9]{1,5})?\\/.*)?$/i' ,$url)){return 'y';}
		else {return 'n';}
	}
#_________________________________________________________________________________________
	function makeurl (){
	$url = $_POST['url'];
	$password = $_POST['protect'];
	$hash = $_POST['hash'];
	$randid = rand(0,9999);
	$checkhash = $this->hashcreate("0");
	$error_return ='<div class="col-md-12"><div class="widget"><div class="widget-content" style="padding-top: 0px;padding-bottom: 0px;padding-right: 0px;padding-left: 0px;"><div class="alert alert-warning"> <i class="fa fa-times" aria-hidden="true"></i> Your url may seem not a url, or that denied</div></div></div>';
	if ($hash!=$checkhash OR !$hash OR !$url) {return  $error_return;}
	else {
	$short = "shota.one/FReA";
	$thisurl = $this->checkurl($url);
	if ($_SESSION['lasturl'] == $url) { $short=$_SESSION['short'];}
	elseif ($thisurl=="n" OR $this->banlist($url) == 'BANNED') { $short='NOT A URL';}
	else  { $short=domain."/".$this->submiturl($url,$password);}
	
	
	#
	if ($short != 'NOT A URL'){
	$_SESSION['lasturl'] = $url;
	$_SESSION['short'] = $short;
	}
	#
	if ($short == 'NOT A URL') {return $error_return;}
	return '<script>$(\'.demo-2'.$randid.'\').click(function(){$(\'.urlcopyed'.$randid.'\').CopyToClipboard();});</script>

	<div class="input-group" style="max-width:400px">
	<input onClick="this.select();" class="form-control input-lg urlcopyed'.$randid.'"  readonly id="yoururl" type="text" value="'.$short.'">
	<span class="input-group-btn"><button onClick="" id="shotaone'.$randid.'" class="btn btn-primary btn-lg demo-2'.$randid.'" type="button">Copy</button></span>
	</div>
	</br>
<script type="text/javascript" charset="utf-8">$(\'#shotaone'.$randid.'\').click( function() {$.gritter.add({title: \'Job done!\',time: 1000,class_name: \'gritter-light\',});flashMsgSound.play();	});</script>

		
		
		
		
		';
	
	
	}
}
#_________________________________________________________________________________________

	function hashcreate ($action) 
	{
		$hash = substr(sha1(md5(time()."shotaonedotcom$#".rand(0,99))),5,8);
		
		if ($action == 'change'){ $_SESSION['hashtime']=time();$_SESSION['hash']=$hash; return $hash;}
		else {return $_SESSION['hash'];}
	}
#_________________________________________________________________________________________
	function hashgo ($action) 
	{
		$hash = substr(sha1(md5(time()."shotaonedotcom$#".rand(0,99))),5,8);
		
		if ($action == 'change'){ $_SESSION['hashtimego']=time();$_SESSION['hashgo']=$hash; return $hash;}
		else {return $_SESSION['hashgo'];}
	}

#_________________________________________________________________________________________

	function short()
	{
		return '
			
			<div class="input-group">
				<input class="form-control input-lg" id="url" type="text" placeholder="URL">
				<input class="form-control input-lg" id="hash" type="hidden" value="'.$this->hashcreate('change').'">
				
				<span class="input-group-btn"><button id="shotaone" class="btn btn-success btn-lg" type="button">Shorten</button></span>
			</div>
				
					<br />

<div class="col-md-6"><div class="widget">	<div class="widget-content" style="padding-bottom: 5px;padding-top: 5px;padding-left: 5px;padding-right: 5px;">
<input style="max-width:100%"  onblur="if(document.getElementById(\'passprotect\').type==\'text\'){document.getElementById(\'passprotect\').type=\'password\';}" onclick="if(document.getElementById(\'passprotect\').type==\'password\'){document.getElementById(\'passprotect\').type=\'text\';}" class="form-control input-lg" id="passprotect" type="text" placeholder="Optional: password protect url">
<small style="color:darkyellow;text-align:center;display: block;">Set your short url is private with password protect.</small>
</div></div></div>



<div class="col-md-6"><div class="widget">	<div class="widget-content" style="padding-bottom: 5px;padding-top: 5px;padding-left: 5px;padding-right: 5px;">
<div class="input-group">
<span class="input-group-addon" style="padding-right: 2px;padding-left: 5px;"><font size="5" >shota.one/</font></span>
<input class="form-control input-lg" id="custom" type="text"  style="padding-left: 3px;" maxlength="15" placeholder="CustomURL">
</div>
<small id="result_shotaone" style="color:darkyellow;text-align:center;display: block;">You can pick your wonderful short-name for long url here, up to 15 characters.</small>
</div></div></div>
	









<script type="text/javascript" charset="utf-8">
	$(\'#custom\').change(function(){
		var uname = document.getElementById("custom").value;
		$.post("return.php?custom_register=true",
					{
						usercustom: uname,
						hash:"'.$this->hashcreate('0').'",
					},function(data,status){
							
						$("#result_shotaone").html(data);
						})
	
				})
</script>





			
					<hr />
					<div id="result"></div>
		<script type="text/javascript" charset="utf-8">
		
			$("#shotaone").click(function(){
				var url = document.getElementById("url").value;
				var protect = document.getElementById("passprotect").value;
				var hash = document.getElementById("hash").value;
				if (!protect) { protect="null";}
					if (url || protect){
					$.post("return.php?makeurl=true",
					{
						url: url,
						protect: protect,
						hash: hash,
					},function(data,status){    
					if (data.match(/(Your url may seem not a url)/) || data.match(/(BANNED)/) ) {$("#result").html(data);document.getElementById("url").value="";}
					else{$("#result").prepend(data);document.getElementById("url").value="";document.getElementById("custom").value="";document.getElementById("result_shotaone").innerHTML="You can pick your wonderful short-name for long url here, up to 15 characters.";
					}
					         }); }

	})
		</script>
';
	}
	
}
#result_shotaone

?>