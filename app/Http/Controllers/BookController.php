<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
class BookController extends Controller
{
    private $bookModel;

    public function __construct(Book $book) {
        $this->bookModel = $book;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('stores')->get();

        return response()->json($books, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate($this->bookModel->rules());

            $createdBook = $this->bookModel->create($request->all());

            if ($request->has('store_id')) {

                DB::table('book_store')->insert([
                    'book_id' => $createdBook->id,
                    'store_id' => $request->store_id,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
    
            return response()->json($createdBook, 201);

        } catch (ValidationException $exception) {
            return response()->json(['errors' => $exception->validator->errors()], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $book = Book::findOrFail($id);

        
        if ($book->books()->exists()) {
            
            return response()->json($book->load('stores'), 200);

        } else {
            
            return response()->json($book, 200);
        }
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
        $book = Book::findOrFail($id);

        $book->update($request->all());

        return response()->json($book, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        $book->delete();

        return response()->json(['message' => 'Book successfully deleted'], 200);
    }
}
