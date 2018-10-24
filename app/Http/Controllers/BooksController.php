<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Book;
use Session;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.book.index')->with('subjects',Subject::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        if($subjects->count() == 0){
            Session::flash('info','First create a subject of your book');
        }
        return view('admin.book.create')->with('subjects',$subjects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'student_name'=>'required|max:255',
            'student_id'=>'required|max:9',
            'semester'=>'required|max:1',
            'subject_id'=>'required|max:50',
            'book_name'=>'required|max:50',
            'author'=>'required|max:50',
            'price'=>'required|max:4',
            'contact'=>'required|max:10',
        ]);
        $book = new Book;
        $book->student_name = $request->student_name;
        $book->student_id = $request->student_id;
        $book->semester = $request->semester;
        $book->subject_id = $request->subject_id;
        $book->book_name = $request->book_name;
        $book->author = $request->author;
        $book->price = $request->price;
        $book->contact = $request->contact;
        $book->slug = str_slug($request->book_name);
        $book->save();
        Session::flash('success','You succesfully created a subject.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $books = Book::where('subject_id',$id)->where('status',NULL)->get();
        return view('admin.book.view')->with('books',$books);
    }

    public function buy($id)
    {
        $book = Book::find($id);
        $book->status = '1';
        $book->save();
        return redirect()->route('books');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('admin.book.edit')->with('book',$book)->with('subjects',Subject::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'student_name'=>'required|max:255',
            'student_id'=>'required|max:9',
            'semester'=>'required|max:1',
            'subject_id'=>'required|max:50',
            'book_name'=>'required|max:50',
            'author'=>'required|max:50',
            'price'=>'required|max:4',
            'contact'=>'required|max:10',
        ]);
        $book = Book::find($id);
        $book->student_name = $request->student_name;
        $book->student_id = $request->student_id;
        $book->semester = $request->semester;
        $book->subject_id = $request->subject_id;
        $book->book_name = $request->book_name;
        $book->author = $request->author;
        $book->price = $request->price;
        $book->contact = $request->contact;
        $book->slug = str_slug($request->book_name);
        $book->save();
        Session::flash('success','You succesfully updated details of your book.');
        return redirect()->route('books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        Session::flash('success','You succesfully trashed a book.');
        return redirect()->route('books');
    }

    public function trashed()
    {
        $books = Book::onlyTrashed()->get();
        return view('admin.book.trashed')->with('books',$books);
    }

    public function kill($id)
    {
        $books = Book::withTrashed()->where('id',$id)->first();
        $books->forceDelete();
        Session::flash('success','Book deleted permanently.');
        return redirect()->back();
    }

    public function restore($id)
    {
        $books = Book::withTrashed()->where('id',$id)->first();
        $books->restore();
        Session::flash('success','Book restored succesfully.');
        return redirect()->route('books');
    }
}
