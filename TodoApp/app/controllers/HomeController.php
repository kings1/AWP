<?php

class HomeController extends BaseController {

	public function getIndex(){
		/* Accessing item property instead of item() method in User.php. This is possible with larvel's eco loading, so that it can be called only once. A method would make it possible to call more than once which is unnecessary. */
		$items = Auth::user()->items;

		/* Could also use: return View::make('home')->with('items', $items)->withItems($items);
		OR 
		return View::make('home', compact('items'));*/
		return View::make('home', array(
			'items' => $items
		));
	}

	public function postIndex(){
		$id = Input::get('id');
		
		$item = Item::findOrFail($id);
		//echo $id;

		if ($item->owner_id == Auth::user()->id) {
			$item->mark();	
		}

		return Redirect::route('home');
	}


	public function getNew()
	{
		return View::make('new');
	}

	public function postNew()
	{
		$rules = array('name' => 'required|min:3|max:255');
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('new')->withErrors($validator);
		}

		$item = new Item;
		$item->name = Input::get('name');
		$item->owner_id = Auth::user()->id;
		$item->save();

		return Redirect::route('home');
	}


	public function getDelete(Item $task){
		if ($task->owner_id == Auth::user()->id) {
			$task->delete();
		}

		return Redirect::route('home');
	}

}
