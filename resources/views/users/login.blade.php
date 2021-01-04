<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>Tong Dung Web</title>
	<!-- Meta-Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Particles Login Form Form a Responsive Web Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web Template, Smartphone Compatible Web Template, Free Webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta-Tags -->
	<!-- Stylesheets -->
	<link href="{{ asset('backend1/css/style.css') }}" rel='stylesheet' type='text/css' />
	<!-- online fonts-->
	<link href="{{ asset('https://fonts.googleapis.com/css?family=Amiri:400,400i,700,700i') }}" rel="stylesheet">
</head>

<body>
	<!--  particles  -->
	<div id="particles-js"></div>
	<!-- //particles -->
	<div class="w3ls-pos">
		<h1>Log in</h1>
		<div class="w3ls-login box">
			<!-- form starts here -->
            <form action="{{ route('users.authenticate') }}" method="post" enctype="multipart/form-data">
                @csrf
				<div class="agile-field-txt">
					<input type="text" name="name" placeholder="user name" class="form-control" required="" />
				</div>
				<div class="agile-field-txt">
					<input type="password" name="password" placeholder="******" required="" id="myInput" />
					<div class="agile_label">
						<input id="check3" name="check3" type="checkbox" value="show password">
						<label class="check" for="check3">Remember me</label>
					</div>
                </div>

				<div class="w3ls-bot">
					<input type="submit" value="LOGIN">
                </div>
                 <div class="w3ls-bot">
                     <a href="{{ route('users.create') }}" class="btn btn-success">Registration</a>
                </div>
            </form>

		</div>
		<!-- //form ends here -->
		<!--copyright-->
		<div class="copy-wthree">
			<p>© 2020 Particles Login Form. All Rights Reserved | Design by
				<a href="http://w3layouts.com/" target="_blank">Tong Dung</a>
			</p>
		</div>
		<!--//copyright-->
	</div>
	<!-- scripts required  for particle effect -->
	<script src='{{ asset('backend1/js/particles.min.js') }}'></script>
	<script src="{{ asset('backend1/js/index.js') }}"></script>
	<!-- //scripts required for particle effect -->
</body>

</html>
