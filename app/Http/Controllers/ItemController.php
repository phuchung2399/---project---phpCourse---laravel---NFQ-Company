<?php

namespace App\Http\Controllers;

use App\Item;
use App\Http\Requests\ItemRequest;

class ItemController extends Controller
{
    public function getDataDisplayItems()
    {
        // Display data in index.blade
        $item = Item::select('id', 'title', 'description', 'link', 'category', 'comments')->paginate(5);
        return view('index', compact('item'));
    }

    public function getPageAddItem()
    {
        return view('addItem');
    }
    public function postDataAddItem(ItemRequest $request)
    {
        // Add Items
        $item = new Item();
        $item->title = $request->txttitle;
        $item->description = $request->txtdescription;
        $item->link = $request->txtlink;
        $item->category = $request->txtcategory;
        $item->comments = $request->txtcomments;
        $item->save();
        return redirect('/');
    }

    public function getDataUpdateItem($id)
    {
        $item = Item::select('id', 'title', 'description', 'link', 'category', 'comments')->get()->toArray();
        $item = Item::find($id);
        return view('updateItem', compact('item'));
    }
    
    public function postDataUpdateItem($id, ItemRequest $request)
    {
        $item = Item::find($id);
        $item->title =  $request->get('txttitle');
        $item->description = $request->get('txtdescription');
        $item->link = $request->get('txtlink');
        $item->category = $request->get('txtcategory');
        $item->comments = $request->get('txtcomments');
        $item->save();
        return redirect('/');
    }

    public function getDataDeteleItem($id)
    {
        $item = Item::find($id);
        $item->delete($id);
        return redirect('/');
    }
}
