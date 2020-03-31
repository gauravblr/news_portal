<div class="post--items post--items-5 pd--30-0">
    <ul class="nav">
        @if($data)
            @foreach($data as $value)
            <li>
                <div class="post--item post--title-larger">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-4 col-xxs-12">
                            <div class="post--img">
                                <a href="{{ route('single',$value->slug) }}" class="thumb"><img src="{{ $value->image }}" alt=""></a> </div>
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-8 col-xxs-12">
                            <div class="post--info">
                                <ul class="nav meta">
                                    <li><a href="{{ route('writer',$value->writer->slug ) }}">{{ $value->writer->name }}</a></li>
                                    <li><a href="">{{ date('d F Y', strtotime($value->created_at)) }}</a></li>
                                </ul>
                                <div class="title">
                                    <h3 class="h4"><a href="{{ route('single',$value->slug) }}" class="btn-link">{{ $value->title }}</a></h3> </div>
                            </div>
                            <div class="post--content">
                                <p>{{ shortContent($value->description, 30) }}</p>
                            </div>
                            <div class="post--action"> <a href="{{ route('single',$value->slug) }}">Continue Reading...</a> </div>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        @endif
    </ul>
</div>
<div class="pagination--wrapper clearfix bdtop--1 bd--color-2 ptop--60 pbottom--30 text-right">
    {{ $data->links() }}
</div>