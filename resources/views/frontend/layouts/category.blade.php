<div class="widget">
    <div class="widget--title">
        <h2 class="h4">Category</h2> <i class="icon fa fa-folder-open-o"></i> </div>
    <div class="nav--widget">
        <ul class="nav">
            @if(!empty($category_list))
                @foreach($category_list as $key => $categories)
                @php
                $count = App\Models\Category::with('posts')->where('id',$categories->id)->first();

                @endphp
                <li><a href="{{ route('category', $categories->slug) }}"><span>{{ $categories->name }}</span><span>({{ count($count->posts) }})</span></a></li>
                @endforeach
            @endif
        </ul>
    </div>
</div>
