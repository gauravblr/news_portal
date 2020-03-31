@php
$category_detail = App\Models\Category::where('id', $value->pivot->category_id)->first();
@endphp
@if($key == 1 || $key ==3)
<li class="col-xs-12">
    <hr class="divider"> </li>
@endif
<li class="{{ $key ==0 ? 'col-xs-12' : 'col-xs-6' }}">
    <div class="post--item {{ $key ==0 ? 'post--layout-1 first-image' : 'post--layout-2' }}">
        <div class="post--img {{ $key !=0 ? 'layout-two-img' : '' }}">
            <a href="{{route('single', $value->slug)}}" class="thumb"><img src="{{$value->image}}" alt=""></a>@if($key==0) <a href="{{route('category', $category_detail->slug)}}" class="cat">{{$category_detail->name}}</a> <a href="#" class="icon"><i class="fa fa-fire"></i></a> @endif <div class="post--info"> <ul class="nav meta"> <li><a href="{{route('writer', $value->writer->slug)}}">{{$value->writer->name}}</a></li><li><a href="#">{{date('d M Y', strtotime($value->created_at))}}</a></li></ul> <div class="title"> <h3 class="h4"><a href="{{route('single', $value->slug)}}" class="btn-link">{{$value->title}}</a></h3> </div></div></div></div></li>