<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <!--Css default-->
    @include('components.css_default')
    <!--Css default-->
</head><!--/head-->

<body>
	<div class="container text-center">
		<div class="logo-404">
			<a href="/"><img src="{{ asset('Eshopper/images/home/logo.png') }}" alt="" /></a>
		</div>
		<div class="content-404">
			<img src="{{ asset('Eshopper/images/404/404.png') }}" class="img-responsive" alt="" />
			<h1><b>OPPS!</b> We Couldn’t Find this Page</h1>
			<p>Uh... So it looks like you brock something. The page you are looking for has up and Vanished.</p>
			<h2><a href="/">Trở về trang chủ</a></h2>
		</div>
	</div>

  
    <!--Js default-->
    @include('components.js_default') 
    <!--/Js default-->   
</body>
</html>