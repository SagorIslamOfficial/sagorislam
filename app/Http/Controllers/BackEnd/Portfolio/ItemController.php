<?php

namespace App\Http\Controllers\BackEnd\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Portfolio\Category;
use App\Models\Portfolio\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $indexItem = Item::all();
        return view('backEnd.portfolio.item.index', compact('indexItem'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $getCategories = Category::all();
        return view('backEnd.portfolio.item.create', compact('getCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'image' => 'required|image|max:2000|mimes:jpg,bmp,png,jpeg',
            'name' => 'required',
            'pd_title' => 'required',
            'pd_section' => 'required',
            'pd_s_content' => 'required',
            'pd_link' => 'required',
            'pd_link_text' => 'required',
            'pd_description' => 'required',
            'pd_images' => 'required',
            //This below extra like of code needed for validate multiple files or images. Except this line of code will show ("pd_images" field must be a image)
            'pd_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $storeItem = new Item();

        //Find form Image and storing into a variable
        $itemImage = $request->file('image');
        //Creating image upload time
        $currentDate = Carbon::now()->toDateString();

        //Using if statement and ensuring form data is available
        if (isset($itemImage)){
            //Creating image slug
            $slug = str_slug($request->name);
            //Make unique name for image
            $itemImageName = $slug. '-'. $currentDate. '-'. uniqid(). '.'. $itemImage->getClientOriginalName();

            //Checking image storage folder, if not available then create a folder
            if (!Storage::disk('public')->exists('portfolio/items')){
                Storage::disk('public')->makeDirectory('portfolio/items');
            }

            //Save image and resize image
            $portfolioItemImage = Image::make($itemImage)->stream();
            //And now put the image into storage disk
            Storage::disk('public')->put('portfolio/items/'.$itemImageName,$portfolioItemImage);

            //And save data into the database
            $storeItem->image = $itemImageName;
        }

        $storeItem->category_id = $request->category;
        $storeItem->name = $request->name;
        $storeItem->slug = str_slug($request->name);
        $storeItem->pd_title = $request->pd_title;

        $storeItem->pd_section = implode(',',$request->pd_section);
        $storeItem->pd_s_content = implode(',',$request->pd_s_content);

        $storeItem->pd_link = $request->pd_link;
        $storeItem->pd_link_text = $request->pd_link_text;
        $storeItem->pd_description = $request->pd_description;

        $itemImages = $request->file('pd_images');
        $images = [];
        if (isset($itemImages)){

            foreach ($request->file('pd_images') as $file){
                $slug = str_slug($request->pd_title);
                $itemImageName = $slug. '-'. $currentDate. '-'. uniqid(). '.'. $file->getClientOriginalName();

                if (!Storage::disk('public')->exists('portfolio/itemsDetails')){
                    Storage::disk('public')->makeDirectory('portfolio/itemsDetails');
                }

                $portfolioItemImage = Image::make($file)->resize(610, 353)->stream();
                Storage::disk('public')->put('portfolio/itemsDetails/'.$itemImageName,$portfolioItemImage);

                $images[] = $itemImageName;
            }
        }
        $storeItem->pd_images = json_encode($images);

        $storeItem->save();
        return redirect()->route('item.index')->with('success', 'Item Saved Successfully :)');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $showItemContents = Item::findOrFail($id);
        if (!empty($showItemContents)){
            $pd_section = explode('|',$showItemContents->pd_section);
            $pd_s_content = explode('|',$showItemContents->pd_s_content);
        }else{
            $pd_section = [];
            $pd_s_content = [];
        }
        $showPortfolioCategory = Category::all();

        return view('backEnd.portfolio.item.show', compact('showItemContents', 'pd_section', 'pd_s_content', 'showPortfolioCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editItemContents = Item::findOrFail($id);
        if (!empty($editItemContents)){
            $pd_section = explode('|',$editItemContents->pd_section);
            $pd_s_content = explode('|',$editItemContents->pd_s_content);
        }else{
            $pd_section = [];
            $pd_s_content = [];
        }
        $editPortfolioCategory = Category::all();

        return view('backEnd.portfolio.item.edit', compact('editItemContents', 'pd_section', 'pd_s_content', 'editPortfolioCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required',
            'image' => 'image|max:2000|mimes:jpg,bmp,png,jpeg',
            'name' => 'required',
            'pd_title' => 'required',
            'pd_section' => 'required',
            'pd_s_content' => 'required',
            'pd_link' => 'required',
            'pd_link_text' => 'required',
            'pd_description' => 'required',
            'pd_images' => 'required',
            //This below extra like of code needed for validate multiple files or images. Except this line of code will show ("pd_images" field must be a image)
            'pd_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $updateItem = Item::findOrFail($id);

        //Find form Image and storing into a variable
        $itemImage = $request->file('image');
        //Creating image upload time
        $currentDate = Carbon::now()->toDateString();

        //Using if statement and ensuring form data is available
        if (isset($itemImage)){
            //Creating image slug
            $slug = str_slug($request->name);
            //Make unique name for image
            $itemImageName = $slug. '-'. $currentDate. '-'. uniqid(). '.'. $itemImage->getClientOriginalName();

            //Checking image storage folder, if not available then create a folder
            if (!Storage::disk('public')->exists('portfolio/items')){
                Storage::disk('public')->makeDirectory('portfolio/items');
            }

            //Delete old image from database
            if (Storage::disk('public')->exists('portfolio/items/'. $updateItem->image)){
                Storage::disk('public')->delete('portfolio/items/'. $updateItem->image);
            }

            //Save image and resize image
            $portfolioItemImage = Image::make($itemImage)->stream();
            //And now put the image into storage disk
            Storage::disk('public')->put('portfolio/items/'.$itemImageName,$portfolioItemImage);

            //And save data into the database
            $updateItem->image = $itemImageName;
        }

        $updateItem->category_id = $request->category;
        $updateItem->name = $request->name;
        $updateItem->slug = str_slug($request->name);
        $updateItem->pd_title = $request->pd_title;

        $updateItem->pd_section = implode(', ',$request->pd_section);
        $updateItem->pd_s_content = implode(', ',$request->pd_s_content);

        $updateItem->pd_link = $request->pd_link;
        $updateItem->pd_link_text = $request->pd_link_text;
        $updateItem->pd_description = $request->pd_description;

        $itemImages = $request->file('pd_images');
        $images = [];
        if (isset($itemImages)){

            foreach ($request->file('pd_images') as $file){
                $slug = str_slug($request->pd_title);
                $currentDate = Carbon::now()->toDateString();
                $itemImageName = $slug. '-'. $currentDate. '-'. uniqid(). '.'. $file->getClientOriginalName();

                if (!Storage::disk('public')->exists('portfolio/itemsDetails')){
                    Storage::disk('public')->makeDirectory('portfolio/itemsDetails');
                }

                $getImages = json_decode($updateItem->pd_images);
                foreach ($getImages as $image){
                    if (Storage::disk('public')->exists('portfolio/itemsDetails/'. $image)){
                        Storage::disk('public')->delete('portfolio/itemsDetails/'. $image);
                    }
                }

                $portfolioItemImage = Image::make($file)->resize(610, 353)->stream();
                Storage::disk('public')->put('portfolio/itemsDetails/'.$itemImageName,$portfolioItemImage);

                $images[] = $itemImageName;
            }
        }
        $updateItem->pd_images = json_encode($images);

        $updateItem->save();
        return redirect()->route('item.index')->with('success', 'Item Updated Successfully :)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $deleteItem = Item::findOrfail($id);

        if (Storage::disk('public')->exists('portfolio/items/'. $deleteItem->image)){
            Storage::disk('public')->delete('portfolio/items/'. $deleteItem->image);
        }

        $getImages = json_decode($deleteItem->pd_images);
        foreach ($getImages as $image){
            if (Storage::disk('public')->exists('portfolio/itemsDetails/'. $image)){
                Storage::disk('public')->delete('portfolio/itemsDetails/'. $image);
            }
        }
        $deleteItem->delete();

        return redirect()->route('item.index')->with('success', 'Portfolio Item Deleted successfully !');
    }
}
