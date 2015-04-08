<?php

class HomeController extends BaseController {

	public function getIndex(){
		/* Accessing item property instead of item() method in 
		User.php. This is possible with larvel's eco loading,
		so that it can be called only once. A method would make it 
		possible to call more than once which is unnecessary. */
		$items = Auth::user()->items;

		/* Could also use:
		return View::make('home')->with('items', $items)->withItems($items);
		OR 
		return View::make('home', compact('items'));*/
		return View::make('home', array(
			'items' => $items
		));
	}

	public function postIndex(){
		$id = Input::get('id');
		$userId = Auth::user()->id;
		
		$item = Item::findOrFail($id);
		//echo $id;

		if ($item->owner_id == $userId) {
			$item->mark();	
		}

		return Redirect::route('home');
	}

}
