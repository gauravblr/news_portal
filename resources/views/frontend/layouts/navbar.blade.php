@php
if($key == 4){ return false; }
$category_detail = App\Models\Category::where('id', $value->pivot->category_id)->first();
@endphp
<li class="col-md-3"> <div class="img"> <a href="{{route('single', $value->slug)}}" class="thumb"> <img src="{{$value->image}}" alt=""> </a> <a href="{{route('category', $category_detail->slug)}}" class="cat">{{$category_detail->name}}</a> <a href="#" class="icon"><i class="fa fa-eye"></i></a> </div><a href="{{route('single', $value->slug)}}" class="title">{{$value->title}}</a></li>
