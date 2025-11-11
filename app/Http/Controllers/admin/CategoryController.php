<?php

namespace App\Http\Controllers\admin;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    //Redirect to Category Page and Search Category Function
    public function index(Request $request){
        $searchKey = $request->searchKey;

        $categories = Category::query();

        if ($searchKey) {
            $categories->where('name', 'like', '%' . $searchKey . '%')
                       ->orWhere('description', 'like', '%' . $searchKey . '%');
        }

        $categories = $categories->orderBy('created_at', 'desc')->paginate(5);

        // Append search key to pagination links to maintain search state
        $categories->appends(request()->query());

        return view('admin.category.categoryList', compact('categories'));
    }

    //Store the created cateogry
    public function store(Request $request){

        $this->validation($request);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        //Sweet Alert
        Alert::success('Category Created', 'New Category Created successfully.');

        return back();
    }

    //Category Delete
    public function delete($id){
        Category::destroy($id);

        Alert::success('Category Deleted', 'Category deleted successfully.');

        return back();
    }

    //Category View
    public function view($id){
        $category = Category::find($id);

        //Get the count of the books the same category
        $booksCount = Book::where('category_id', $id)->count();

        //Get the latest uploaded books in the same category
        $recentBooks = Book::where('category_id', $id)
                                       ->orderBy('created_at', 'desc')
                                       ->take(5)
                                       ->get();

        return view('admin.category.categoryView', compact('category', 'booksCount', 'recentBooks'));
    }

    //Go Category Edit Page
    public function edit($id){
        $category = Category::find($id);

        return view('admin.category.categoryEdit',compact('category'));
    }

    //Update the category
    public function update(Request $request){
        $this->validation($request); //Validate the values from the $request

        //Validated data to update
        $data = [
            'name' => $request->name,
            'description' => $request->description
        ];

        Category::where('id',$request->id)->update($data);

        Alert::success('Category Deleted', 'Category deleted successfully.');

        return back();
    }

    private function validation($request){
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,'.$request->id,
            'description' => 'required|string|max:1000',
        ], [
            'name.required' => 'Category name is required.',
            'name.unique' => 'This category name already exists.',
            'description.required' => 'Description is required.',
        ]);
    }
}
