<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Contact;
use App\Models\Fact;
use App\Models\Feedback;
use App\Models\Heading;
use App\Models\Home;
use App\Models\Portfolio\Category;
use App\Models\Portfolio\Item;
use App\Models\Resume;
use App\Models\Service;
use App\Models\Skill;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        $home = Home::latest()->take(1)->first();
        if (!empty($home)){
            $icons = explode(',',$home->social_icon);
            $links = explode(',',$home->social_link);
        }else{
            $icons = [];
            $links = [];
        }
        return view('frontEnd.home',compact('home','icons', 'links'));
    }

    public function about() {
        $home = Home::first();
        if (!empty($home)){
            $icons = explode(',',$home->social_icon);
            $links = explode(',',$home->social_link);
        }else{
            $icons = [];
            $links = [];
        }

        $headings = Heading::latest()->first();

        $aboutUs = AboutUs::first();
        if (!empty($aboutUs)){
            $about_us_name = explode(',', $aboutUs->name);
            $about_content = explode(',', $aboutUs->about_content);
        }else{
            $about_us_name = [];
            $about_content = [];
        }

        $skills = Skill::all();

        $fact = Fact::first();
        if (!empty($fact)){
            $total = explode(',', $fact->total);
            $name = explode(',', $fact->name);
        }else{
            $total = [];
            $name = [];
        }

        $feedback = Feedback::latest()->get();

        return view('frontEnd.about',compact('home','icons', 'links', 'headings', 'aboutUs', 'about_us_name', 'about_content', 'skills', 'fact', 'total', 'name', 'feedback'));
    }

    public function resume() {
        $home = Home::first();
        if (!empty($home)){
            $icons = explode(',',$home->social_icon);
            $links = explode(',',$home->social_link);
        }else{
            $icons = [];
            $links = [];
        }

        $headings = Heading::latest()->first();

        $resume = Resume::all();

        return view('frontEnd.resume',compact('home','icons', 'links', 'headings', 'resume'));
    }

    public function services() {
        $home = Home::first();
        if (!empty($home)){
            $icons = explode(',',$home->social_icon);
            $links = explode(',',$home->social_link);
        }else{
            $icons = [];
            $links = [];
        }

        $headings = Heading::latest()->first();
        $service = Service::latest()->get();

        return view('frontEnd.services',compact('home','icons', 'links', 'headings', 'service'));
    }

    public function portfolio() {
        //Social links
        $home = Home::first();
        if (!empty($home)){
            $icons = explode(',',$home->social_icon);
            $links = explode(',',$home->social_link);
        }else{
            $icons = [];
            $links = [];
        }
        //Heading & sub heading text
        $headings = Heading::latest()->first();
        //Category
        $categories = Category::all();
        //Item
        $items = Item::all();


        return view('frontEnd.portfolio',compact('home','icons', 'links', 'headings', 'items', 'categories'));
    }

    public function portfolioDetails($slug) {
        //Category
        $category = Category::first();
        //Item
        $item = Item::where('slug',$slug)->first();

        //Multiple image & portfolio details content
        if (!empty($item)){
            $pd_section = explode(',',$item->pd_section);
            $pd_s_content = explode(',',$item->pd_s_content);
            $pd_images = explode(',',$item->pd_images);
        }else{
            $pd_section = [];
            $pd_s_content = [];
            $pd_images = [];
        }

        return view('frontEnd.portfolio-details',compact('category','item', 'pd_section', 'pd_s_content', 'pd_images'));
    }

}
