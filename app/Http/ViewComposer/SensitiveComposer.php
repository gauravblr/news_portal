<?php
namespace App\Http\ViewComposer;

use App\Models\Post;
use App\Models\Social;
use App\Models\Website;
use App\Models\Category;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\View\View;
use DB;

class SensitiveComposer
{
    public function compose(View $view){
        $recent_post = Post::orderBy('created_at', 'desc')->take(5)->get();
        $sports = Category::getPostByCategory(6, 5);
        $technology = Category::getPostByCategory(12, 5);
        $world = Category::getPostByCategory(1, 8);
        $politics = Category::getPostByCategory(8, 5);
        $lifestyle = Category::getPostByCategory(11, 5);
        $health = Category::getPostByCategory(5, 11); //dd($health);
        $social_data = Social::first();
        $website_data = Website::first();
        $social_info = Social::first();
        $website_info = Website::first();
        $category = Category::orderBy('priority', 'asc')->get();
        $featured_news = Post::where('is_featured', 1)->where('status', 'publish')->orderBy('created_at', 'desc')->take(5)->get();
        $writers = User::get();
        if(!empty($writers)){
            $writerpost = array();
            foreach($writers as $key => $writer){
                $writerpost[] = Post::where('author_id', $writer->id)->where('status', 'publish')
                ->first();
                $writerpost[$key]['writer_image'] = implode(' ', User::where('id', $writer->id)->pluck('image')->toArray());
            }
        }
        $view->with('recent_posts', $recent_post)
        ->with('social_media', $social_data)
        ->with('website_data', $website_data)
        ->with('category_list', $category)
        ->with('sports', $sports)
        ->with('technology', $technology)
        ->with('world', $world)
        ->with('politics', $politics)
        ->with('lifestyle', $lifestyle)
        ->with('health', $health)
        ->with('featured_news', $featured_news)
        ->with('social_info', $social_info)
        ->with('website_info',$website_info)
        ->with('writerpost', $writerpost);
    }
}
