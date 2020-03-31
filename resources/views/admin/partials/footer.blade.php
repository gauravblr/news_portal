</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
{{ flashSession() }}
<script type="text/javascript" src="{{ asset('/admin/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admin/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admin/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admin/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admin/js/jquery.slimscroll.js') }}"></script>
{{--
<script src="{{ asset('/admin/js/amcharts.js') }}" type="text/javascript"></script>
<script src="{{ asset('/admin/js/serial.js') }}" type="text/javascript"></script>
--}}
<script src="{{ asset('/admin/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/admin/js/dataTables.buttons.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/admin/js/jszip.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/admin/js/pdfmake.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/admin/js/vfs_fonts.js') }}" type="text/javascript"></script>
<!--<script src="{{ asset('/admin/js/dataTables.colReorder.min.js') }}" type="text/javascript"></script>-->
<script src="{{ asset('/admin/js/buttons.print.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/admin/js/buttons.html5.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/admin/js/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/admin/js/dataTables.responsive.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/admin/js/responsive.bootstrap4.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/admin/js/colreorder-custom.js') }}" type="text/javascript"></script>

<script src="{{ asset('/admin/js/bootstrap-growl.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/admin/js/jquery.mCustomScrollbar.concat.min.js') }}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="{{ asset('/admin/js/pcoded.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/admin/js/vartical-layout.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('/admin/js/script.min.js') }}"></script>
<script src="{{ asset('/admin/js/rocket-loader.min.js') }}" data-cf-settings="213206604d9df2b1fb521c3e-|49" defer=""></script>
<script src="{{ asset('/vendor/fancybox/jquery.fancybox.pack.js') }}"></script>
<script src="{{ asset('/vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('/admin/js/okh.js') }}"></script>
<script>
    setTimeout(function(){
        $(".alert").removeClass('fadeInRight');
        $(".alert").addClass('fadeOutRight');
    }, 5000);

    $(function () {

        $('.iframe-btn').fancybox({
            'width'		: 900,
            'height'	: 600,
            'type'		: 'iframe',
            'autoScale'    	: false
        });

        tinymce.PluginManager.add('twitter_url', function(editor, url) {
        var icon_url='/admin/img/twitter.png';

            editor.on('init', function (args) {
                editor_id = args.target.id;
    
            });
            editor.addButton('twitter_url',
                {
                    text:false,
                    icon: true,
                    image:icon_url,
    
                    onclick: function () {
    
                        editor.windowManager.open({
                            title: 'Twitter Embed',
    
                            body: [
                                {   type: 'textbox',
                                    size: 40,
                                    height: '100px',
                                    name: 'twitter',
                                    label: 'twitter'
                                }
                            ],
                            onsubmit: function(e) {
    
                                var tweetEmbedCode = e.data.twitter;
    
                                $.ajax({
                                    url: "https://publish.twitter.com/oembed?url="+tweetEmbedCode,
                                    dataType: "jsonp",
                                    async: false,
                                    success: function(data){
                                        // $("#embedCode").val(data.html);
                                        // $("#preview").html(data.html)
                                        tinyMCE.activeEditor.insertContent(
                                            '<div class="div_border" contenteditable="false">' +
                                                '<img class="twitter-embed-image" src="'+icon_url+'" alt="image" />'
                                                +data.html+
                                            '</div>');
    
                                    },
                                    error: function (jqXHR, exception) {
                                        var msg = '';
                                        if (jqXHR.status === 0) {
                                            msg = 'Not connect.\n Verify Network.';
                                        } else if (jqXHR.status == 404) {
                                            msg = 'Requested page not found. [404]';
                                        } else if (jqXHR.status == 500) {
                                            msg = 'Internal Server Error [500].';
                                        } else if (exception === 'parsererror') {
                                            msg = 'Requested JSON parse failed.';
                                        } else if (exception === 'timeout') {
                                            msg = 'Time out error.';
                                        } else if (exception === 'abort') {
                                            msg = 'Ajax request aborted.';
                                        } else {
                                            msg = 'Uncaught Error.\n' + jqXHR.responseText;
                                        }
                                        alert(msg);
                                    },
                                });
                                setTimeout(function() {
                                    iframe.contentWindow.twttr.widgets.load();
    
                                }, 1000)
                            }
                        });
                    }
                });
        });

        var editor_config = {
            path_absolute : "/",
            selector: "textarea.editor",
            height: 400,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality imagetools",
                "emoticons template paste textcolor responsivefilemanager colorpicker textpattern preview twitter_url"
            ],
            menubar: false,
            branding: false,
            toolbar: "responsivefilemanager | insertfile | styleselect | bold italic | alignleft aligncenter alignright alignjustify | hr | forecolor backcolor blockquote | bullist numlist outdent indent | link image media | code | preview | twitter_url",
            valid_elements : '+*[*]',

            extended_valid_elements: "+iframe[width|height|name|align|class|frameborder|allowfullscreen|allow|src|*]," +
            "script[language|type|async|src|charset]" +
            "img[*]" +
            "embed[width|height|name|flashvars|src|bgcolor|align|play|loop|quality|allowscriptaccess|type|pluginspage]" +
            "blockquote[dir|style|cite|class|id|lang|onclick|ondblclick"
            +"|onkeydown|onkeypress|onkeyup|onmousedown|onmousemove|onmouseout"
            +"|onmouseover|onmouseup|title]",
    
            content_css: ['/admin/css/twitter.css?' + new Date().getTime(),
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'
            ],
            relative_urls: false,
            filemanager_access_key:"061e0de5b8d667cbb7548b551420eb821075e7a6" ,
            filemanager_sort_by: "date",
            filemanager_descending: 1,
            external_filemanager_path:"/vendor/filemanager",
            filemanager_title:"File Manager" ,
            external_plugins: { "filemanager" : "/vendor/filemanager/plugin.min.js"},
            image_class_list: [
                {title: 'img-responsive', value: 'img-responsive'},
            ],
            image_caption: true
        };

        tinymce.init(editor_config);

    });


    function responsive_filemanager_callback(field_id){
        var url=jQuery('#'+field_id).val();
        $("#holder").attr("src",url);
        $('#thumbnail').val(url.replace('http://gokarna.local',''));
    }

    $('#set_featured').change(function(){
        if(this.checked){
            var featuredPhoto = $('#thumbnail').val().length;
            if(featuredPhoto === 0){
                $('#set_featured').prop('checked',false);
                alert('Please upload a featured image first.');
            }
        }
    });

    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Assign category to the user"
        });
    });
</script>
@yield('scripts')
</body>
</html>