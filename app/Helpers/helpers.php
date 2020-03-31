<?php

function flashSession(){
    if (session()->has('success')){
        $message = session()->get('success');
        echo '<div data-growl="container" class="alert alert-inverse alert-dismissable growl-animated animated fadeInRight" role="alert" data-growl-position="top-center" style="position: fixed; margin: 0px 0px 0px -316.601px; z-index: 999999; display: inline-block; top: 60px; right: 10px;color:#fff"><span data-growl="icon" class="fa fa-comments"></span><span data-growl="title">'.$message.'</span></div>';
    } elseif(session()->has('error')){
        $message = session()->get('error');
        echo '<div data-growl="container" class="alert alert-inverse alert-dismissable growl-animated animated fadeInRight" role="alert" data-growl-position="top-center" style="position: fixed; margin: 0px 0px 0px -316.601px; z-index: 999999; display: inline-block; top: 60px; right: 10px;background-color: #e74c3c;color:#fff"><span data-growl="icon" class="fa fa-comments"></span><span data-growl="title">'.$message.'</span></div>';
    }
}

function shortContent($sentence, $count = 10) {
    $data = implode(' ', array_slice(explode(' ', $sentence), 0, $count));
    return strip_tags($data);
}