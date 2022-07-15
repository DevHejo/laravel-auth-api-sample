<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Http\Resources\BooksResource;
use App\Http\Requests\BooksRequest;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BooksResource::collection(Book::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(BooksRequest $request)
    {
        // $faker = \Faker\Factory::create(1);
        // $book = Book::create([
        //     'name' => $faker->name,
        //     'description' => $faker->sentence,
        //     'publication_year' => $faker->year
        // ]);

        // return new BooksResource($book);

        $validated = $request->validated();

        $book = Book::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'publication_year' => $validated['publication_year']
        ]);

        return new BooksResource($book);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BooksRequest $request, Book $book)
    {
        $validated = $request->validated();

        $book = Book::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'publication_year' => $validated['publication_year']
        ]);

        // $faker = \Faker\Factory::create(1);
        // $book = Book::create([
        //     'name' => $faker->name,
        //     'description' => $faker->sentence,
        //     'publication_year' => $faker->year
        // ]);

        return new BooksResource($book);
        // return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        // return new BooksResource($book);
        // return $book->author;
        return new BooksResource($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BooksRequest $request, Book $book)
    {
        $validated = $request->validated();
        $book->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'publication_year' => $validated['publication_year']
        ]);
        return new BooksResource($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response(null, 204);
    }
}
