@php
$class= "post--layout-3 tab-image";
if($key == 0){
    $class = "post--layout-1 first-image";
}
$category_detail = App\Models\Category::where('id', $value->pivot->category_id)->first();
@endphp
<li><div class="post--item {{ $class }}"><div class="post--img">
            <a href="{{route('single', $value['slug'])}}" class="thumb"><img src="{{$value->image}}" alt=""></a> @if($key==0) <a href="{{route('category', $category_detail->slug)}}" class="cat">{{$category_detail->name}}</a> <a href="{{route('single', $value->slug)}}" class="icon"><i class="fa fa-eye"></i></a> @endif <div class="post--info"> <ul class="nav meta"> <li><a href="{{route('writer', $value->writer->slug)}}">{{$value->writer->name}}</a></li><li><a href="#">{{date('d F Y', strtotime($value->created_at))}}</a></li></ul> <div class="title"> <h3 class="h4"><a href="{{route('single', $value->slug)}}" class="btn-link">{{$value->title}}</a></h3> </div></div></div></div></li>