<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\SelectedItem;
use App\Http\Requests\AddNewItem;

class HomeController extends Controller {

    public function index() {
        $getAllItems = Item::has('getSelectedItem', '!=', '1')->get();
        $selectedItem = SelectedItem::get();
        return view('home.index', compact('selectedItem', 'getAllItems'));
    }

    public function listStore() {
        $input = request()->all();
        $items = $input['items'];
        $action = $input['action'];
        if ($action == 'left') {
            SelectedItem::whereIn('item_id', $items)->delete();
            return $this->jsonResponse(true, 'Item Updated');
        } elseif ($action == 'right') {
            foreach ($items as $item) {
                SelectedItem::create(['item_id' => $item]);
            }
            return $this->jsonResponse(true, 'Item Updated');
        } else {
            return $this->jsonResponse(true, 'Invalid Action');
        }
    }

    public function addNewItem(AddNewItem $request) {
        $input = request()->all();
        $data = Item::create(['name' => $input['name']]);
        return $this->sendResponse(true, '', 'New Item added', $data, 'addNewItem');
    }

}
