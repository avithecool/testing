<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
class Categoriescontroller extends Controller
{
    //
    public function index()
    {
        $cats =Categories::sortable()->paginate(10);

        return view('manager.categories',compact('cats',$cats));
    }

    public function catlist()
    {
        $cat_model = new Categories();
        $cats = $cat_model->find('id','>',0)->paginate(10);
        return response()->json($cats,200);
    }
    public function create()
    {
        return view('manager.categories_create');
    }
    public function store(Request $request)
    {
        $attr = array('name' => 'required',
                       'description'=>'required',
                       'state'=>'required',
                       'ordering'=>''

                     );
        $data = $request->validate($attr);
        $cat_model = new Categories();
        $data['ordering'] = 0;
        Categories::create($data);
        return redirect('manager/categories')->with('message','Categories Saved');
    }
}
