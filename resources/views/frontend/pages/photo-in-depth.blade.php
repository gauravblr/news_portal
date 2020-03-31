@extends('frontend.layouts.master')
@section('content')
<div class="container-fluid feature-image-section">
  <div class="row">
    <img class="photo-feature" src="{{ $data->image }}" alt="">
    <div class="feature-overlay"></div>
    <div class="bottom-right"><h3>{{ $data->title }}</h3></div>
  </div>
</div>
<section id="photo-in-depth">
  <br>
  {!! $data->description !!}
</section>
@endsection
@section('scripts')
<script type="text/javascript">
    $('#photo-in-depth p').addClass('col-lg-6 col-lg-offset-3 col-md-6 offset-md-4 col-sm-12')
</script>
@endsection
