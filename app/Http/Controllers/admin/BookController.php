<?php

namespace App\Http\Controllers\admin;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class BookController extends Controller
{
    //Redirect to the Book upload Page
    public function add(){
        $categories = Category::select('id','name')->get();

        return view('admin.book.addBook',compact('categories'));
    }

    //Save the uploaded Book
    public function bookUpload(Request $request){
        $this->validation($request);

        $data = [
            'name' => $request->name,
            'published_year' => $request->publishedYear,
            'author_name' => $request->authorName,
            'category_id' => $request->categoryId,
        ];

        if ($request->hasFile('coverImg')) {
            $coverImage = $request->file('coverImg');
            $coverImageName = uniqid() . '_' . $coverImage->getClientOriginalName();
            $coverImage->move(public_path('coverImages'), $coverImageName);
            $data['cover'] = $coverImageName;
        }

        if ($request->hasFile('file')) {
            $bookFile = $request->file('file');
            $bookFileName = uniqid() . '_' . $bookFile->getClientOriginalName();
            $bookFile->move(public_path('bookFiles'), $bookFileName);
            $data['file'] = $bookFileName;
        }
        if ($request->description) {
            $data['description'] = $request->description;
        }
        Book::create($data);

        Alert::success('Book Uploaded', 'Book Uploaded successfully.');
        return back();
    }

    //Return to Book List Page
    public function list($action = 'default'){

        $books = Book::leftJoin('categories', 'books.category_id', '=', 'categories.id')
            ->select(
                'books.id',
                'books.name as book_name',
                'books.author_name',
                'books.cover as book_cover',
                'books.description as book_description',
                'books.published_year',
                'books.created_at as created_date',
                'categories.name as category_name'
            )
            // Filter by Category (filterKey)
            ->when(request('action') === 'filter' && request('filterKey') && request('filterKey') != 0, function($query) {
                $query->where('books.category_id', request('filterKey'));
            })
            // Search by Book Name, Author, or Category (searchKey)
            ->when(request('searchKey'), function($query) {
                $query->where(function($q) {
                    $q->where('books.name', 'like', '%' . request('searchKey') . '%')
                      ->orWhere('books.author_name', 'like', '%' . request('searchKey') . '%')
                      ->orWhere('categories.name', 'like', '%' . request('searchKey') . '%');
                });
            })
            ->orderBy('books.created_at', 'desc')
            ->paginate(5);



        $categories = Category::select('name','id')->get();


        return view('admin.book.bookList',compact('books','categories'));
    }

    //Book Delete
    public function delete($bookId){
        Book::destroy($bookId);

        Alert::success('Book Deleted', 'Book Deleted Successfully.');
        return back();

    }

    //Redirect to book View Page
    public function bookView($bookId){
        $book = Book::leftJoin('categories','books.category_id','=','categories.id')
                ->select(
                    'books.*',
                    'categories.name as category_name'
                )
                ->where('books.id',$bookId)
                ->first();

        return view('admin.book.viewBook',compact('book'));
    }

    //Redirect to book editing page
    public function edit($bookId){
        $book = Book::leftJoin('categories','books.category_id','=','categories.id')
                ->select(
                    'books.*',
                    'categories.name as category_name'
                )
                ->where('books.id',$bookId)
                ->first();

        $categories = Category::select('id','name')->get();

        return view('admin.book.editBook',compact('book','categories'));
    }

    //Validate the uploaded Book
    private function validation($request){
        $request->validate([
            'name' => 'required|string|max:255',
            'authorName' => 'required|string|max:255',
            'categoryId' => 'required|integer|exists:categories,id', //Must exists in categories table
            'publishedYear' => 'nullable|integer|min:1800|max:2100',
            'file' => 'required|mimes:pdf|max:51200', // Max 50MB for PDF
            'coverImg' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB for image
            'description' => 'nullable|string',
        ], [
            'name.required' => 'The book name is required.',
            'name.max' => 'The book name may not be greater than 255 characters.',

            'authorName.required' => 'The author name is required.',
            'authorName.max' => 'The author name may not be greater than 255 characters.',

            'categoryId.required' => 'Please select a category for the book.',
            'categoryId.exists' => 'The selected category is invalid.',

            'publishedYear.integer' => 'The published year must be a number.',
            'publishedYear.min' => 'The published year must be at least 1800.',
            'publishedYear.max' => 'The published year must not exceed 2100.',

            'file.required' => 'Please upload the book file.',
            'file.mimes' => 'The uploaded file must be a valid PDF file',
            'file.max' => 'The book file size must not exceed 50MB.',

            'coverImg.image' => 'The cover image must be an image file.',
            'coverImg.mimes' => 'The cover image must be a JPEG, PNG, JPG, or GIF.',
            'coverImg.max' => 'The cover image size must not exceed 2MB.',
        ]);
    }

}
