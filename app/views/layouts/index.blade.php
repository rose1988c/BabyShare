<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<title>{{$title=isset($title)?$title:''}}</title>
<meta name="description" content="@yield('description')" />
<meta name="author" content="rose1988.c@gmail.com">
<meta name="keywords" content="@yield('keywords')" />
<link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/png">

{{ HTML::style('assets/simplex/css/bootstrap.min.css?' . date("Ymd", time()) . '.css') }} 
{{ HTML::style('assets/simplex/css/base.css?' .  date("Ymd", time()) . '.css') }}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{asset('assets/bracket/js/html5shiv.js')}}"></script>
    <script src="{{asset('assets/bracket/js/respond.min.js')}}"></script>
    <![endif]-->
    
@section('css')
    {{-- include all required stylesheets --}}
@show

</head>
<body>

	<section>
		<div class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse"
						data-target=".navbar-responsive-collapse">
						<span class="icon-bar"></span> <span class="icon-bar"></span> <span
							class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/">BabyShare</a>
				</div>
				<div class="navbar-collapse collapse navbar-responsive-collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">首页</a></li>
						<li><a href="/baby">我的宝贝</a></li>
						
						{{---
						<li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown">Dropdown <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li class="dropdown-header">Dropdown header</li>
								<li><a href="#">Separated link</a></li>
								<li><a href="#">One more separated link</a></li>
							</ul></li>
					   ---}}
					</ul>
					<ul class="nav navbar-nav navbar-right">
					
					  @if (!Auth::check())
						<li><a href="/login">登录</a></li>
						<li><a href="/signup">注册</a></li>
						@else
						<li class="dropdown">
						    <a href="#" class="dropdown-toggle"	data-toggle="dropdown">{{Auth::user()->username}}<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
							  @if (is_admin())
								<li><a href="/manage">后台管理</a></li>
								@endif
								<li><a href="/baby">我的baby</a></li>
								<li class="divider"></li>
								<li><a href="/logout">退出</a></li>
							</ul></li>
						@endif
					</ul>
				</div>

			</div>
		</div>
	</section>

	<div class="container">
		<section>@yield('content')</section>
	</div>

	<div class="copyrights">
		<!--start copyrights-->
		<div class="row note">
			<div class="top">
				<span><a href="/" title="">- BabyShare</a> Copyright ©
					{{date('Y')}}.</span> By <a href="mailto:rose1988.c@gmail.com">rose1988c</a>&nbsp;<a
					href="#top" class="toplink"> </a>
			</div>
		</div>
		<!--end copyrights-->
	</div>

	<script src="{{asset('/assets/bracket/js/jquery-1.10.2.min.js')}}"></script>
	<script
		src="{{asset('/assets/bracket/js/jquery-migrate-1.2.1.min.js')}}"></script>
	<script src="{{asset('/assets/bracket/js/jquery-ui-1.10.3.min.js')}}"></script>
	<script src="{{asset('/assets/bracket/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('/assets/bracket/js/retina.min.js')}}"></script>
	<script src="{{asset('/assets/bracket/js/jquery.cookies.js')}}"></script>

	@yield('ext')
</body>
</html>