<footer class="footer--section">
    <div class="footer--widgets pd--30-0 bg--color-2">
        <div class="container">
            <div class="row AdjustRow">
                <div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
                    <div class="widget">
                        <div class="widget--title">
                            <h2 class="h4">About Us</h2> <i class="icon fa fa-exclamation"></i> </div>
                        <div class="about--widget">
                            <div class="content">
                                <p>OnlineKhabarHub covers all exclusive and latest news headlines from Kathmandu Nepal. Nepali News Live, including hot topics, latest breaking news on business, politices, education, tourism, health, sports, culture, world and entertainment with exclusive Opinions and Editorials.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
                    <div class="widget">
                        <div class="widget--title">
                            <h2 class="h4">News category</h2> <i class="icon fa fa-expand"></i> </div>
                        <div class="links--widget">
                            <ul class="nav"> @if(!empty($category_list)) @foreach($category_list as $key=> $cat_list) @php if($key===7){break;}@endphp
                                <li><a href="{{route('category', $cat_list->slug)}}" class="fa-angle-right">{{$cat_list->name}}</a></li>@endforeach @endif </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
                    <div class="widget">
                        <div class="widget--title">
                            <h2 class="h4">Contributors</h2> <i class="icon fa fa-bullhorn"></i> </div>
                        <div class="links--widget">
                            <ul class="nav">
                                <li><a class="fa-angle-right">Editor: Hira Lama</a></li>
                                <li><a class="fa-angle-right">News Desk Editor: Bishnu Acharya & Niramala Koirala</a></li>
                                <li><a href="https://trainerjames.edu.np/" target="_blank" class="fa-angle-right">Hello Nepal: Trainer James</a></li>
                                <li><a class="fa-angle-right">Katha byatha: Shreeram Dahal</a></li>
                                <li><a class="fa-angle-right">Multi media: Krishna Khatri & Susan Pakhrin</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
                    <div class="widget">
                        <div class="widget--title">
                            <h2 class="h4">Contact Us</h2> <i class="icon fa fa-user-o"></i> </div>
                        <div class="about--widget">
                            <ul class="nav">
                                <li><a href="#"><i class="fa fa-map"></i>{{$website_info->location}}</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i>{{$website_info->email}}</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i>{{$website_info->primary}}/{{$website_info->secondary}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer--copyright bg--color-3">
        <div class="social--bg"></div>
        <div class="container">
            <p class="text float--left">&copy; 2020 <a href="#">Online Khabar Hub</a>. All Rights Reserved.</p>
            <ul class="nav social float--right">
                <li><a href="{{@$social_info->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a href="{{@$social_info->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a href="{{@$social_info->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <li><a href="{{@$social_info->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="{{@$social_info->youtube}}" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
            </ul>
        </div>
    </div>
</footer>
</div>
<div id="backToTop"> <a href="#"><i class="fa fa-angle-double-up"></i></a> </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<script src="{{asset('frontend/js/jquery.sticky.min.js')}}"></script>
<script src="{{asset('frontend/js/isotope.min.js')}}"></script>
<script src="{{asset('frontend/js/theia-sticky-sidebar.min.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>
<script src="{{asset('frontend/js/online.js')}}"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e69f8e25917db03"></script>
@yield('scripts')
<script>
    $('#trendy-news').hide();
$('.hot-news').on('click', function() {
    $('#hot-news').fadeIn();
    $('.hot-news').addClass('active');
    $('#trendy-news').hide();
    $('.trendy-news').removeClass('active');
});
$('.trendy-news').on('click', function() {
    $('#hot-news').hide();
    $('.hot-news').removeClass('active');
    $('#trendy-news').fadeIn();
    $('.trendy-news').addClass('active');
});
</script>
</body>
</html>
