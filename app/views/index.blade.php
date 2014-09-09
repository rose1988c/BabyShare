@section('content')

<div class="contentpanel">

	<div id="babylist" class="row">
		@foreach( $photos as $photo)
		<div class="col-xs-6 col-sm-4 col-md-3">
			<div class="blog-item">
				<a href="javascript:void(0);" class="blog-img"> <img
					src="{{QiniuImageViewUrl($photo['file_name'], array(2, 'w', 263))}}"
					class="img-responsive" alt="">
				</a>
				<div class="blog-details">
					<h4 class="blog-title">
						<a href="javascript:void(0);">{{Str::limit($photo['title'], $limit
							= 20, $end = '')}}</a>
					</h4>
					<ul class="blog-meta">
						<li>By: <a href="">{{ isset($babys[ $photo['bid']]) ? $babys[
								$photo['bid']] : '' }}</a></li>
						<li>{{ date('Y-m-d', strtotime($photo['take_at']))}}</li>
					</ul>
					<div class="blog-summary">
						<p>{{$photo['desc']}}</p>
					</div>
				</div>
			</div>
		</div>
		@endforeach

	</div>
	<!-- row -->

</div>

@stop @section('css') {{ HTML::style('assets/simplex/css/bloglist.css?'
. date("Ymd", time()) . '.css') }} @stop @section('ext')

{{HTML::script('assets/bracket/js/masonry.pkgd.min.js')}}

<script>
  jQuery(window).load(function(){
  
    var container = document.querySelector('#babylist');
    var msnry = new Masonry( container, {
      // options
      columnWidth: '.col-xs-6',
      itemSelector: '.col-xs-6'
    });
    
    // check on load
    if(jQuery(window).width() <= 480 )
        msnry.destroy();

    // check on resize
    jQuery(window).resize(function(){
        if(jQuery(this).width() <= 480 )
            msnry.destroy();
    });
    
    // relayout items when clicking chat icon
//     jQuery('#chatview, .menutoggle').click(function(){
//        msnry.layout();
//     });

  });
</script>
@stop
