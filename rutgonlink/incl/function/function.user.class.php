<?php
/**
 *		[HoaKhuya] (C)2010-2099 Hacking simple source Orzg.
 *		Drark license payto BitcoinAddress: 1HikvH2jnMNg4rDJHykMMk31gpyr2qrhU4
 *		Coders : develop@execs.com;yuna.elin@yandex.ru;tonghua@dr.com;
 *
 *		$Id: function.user.class.php [BuildDB.155478522] 10/07/2017 5:20 CH $
	
*/


class user {
#_________________________________________________________________________________________
	function topmenu(){
	
	return '<a class="btn btn-info btn-xs" href="?user=login">Login</a>  <a class="btn btn-warning btn-xs" href="?user=register">Register</a>';
	
	
		
	}
#_________________________________________________________________________________________
	function register ($user,$email,$pass)
	{
		return "any";
	}
#_________________________________________________________________________________________
	function register_theme()
	{
		return '
	
<div class="col-md-6">
	

<div class="widget widget-table">
								<div class="widget-header">
									<h3><i class="fa fa-desktop"></i> Register </h3>
									<div class="btn-group widget-header-toolbar">
										<a href="#" title="Focus" class="btn-borderless btn-focus"><i class="fa fa-eye"></i></a>
										<a href="#" title="Expand/Collapse" class="btn-borderless btn-toggle-expand"><i class="fa fa-chevron-up"></i></a>
									</div>
								</div>
								<div class="widget-content">

<form>
					<input type="email" placeholder="email" class="form-control"></br>
					<input type="password" placeholder="password" class="form-control"></br>
					<input type="password" placeholder="repeat password" class="form-control"></br>
					<label class="fancy-checkbox">
						<input type="checkbox">
						<span>I accept the <a href="#">Terms &amp; Agreements</a></span>
					</label>
					<button class="btn btn-custom-primary btn-lg btn-block btn-auth"><i class="fa fa-check-circle"></i> Create Account</button>
				</form>


								</div>
							</div>


</div>

		';
		
	}
#_________________________________________________________________________________________
	function theme ()
	{
		if ($_GET['user']=='register' && !$_SESSION['loged']) { return user::register_theme();}
		
		
		
	}
#_________________________________________________________________________________________

	
	
}


?>