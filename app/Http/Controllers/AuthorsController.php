<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;

use App\Http\Resources\AuthorsResource;
use App\Http\Requests\AuthorsRequest;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $AuthorsResource = AuthorsResource::collection(Author::all());
        // return response()->json([
        //     'data' => $AuthorsResource,
        //     'status' => 200,
        // ]);

        return AuthorsResource::collection(Author::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAuthorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorsRequest $request, Author $author)
    {
        // $author->create([
        //     'name' => $request->input('name')
        // ]);

        $validated = $request->validated();

        $result = $author->create([
            'name' => $validated['name'],
        ]);

        return new AuthorsResource($result);
        // return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        // all the below methods works.
        // return $author;

        // return response()->json($author);

        // return response()->json([
        //     'data' => [
        //         'id' => $author->id,
        //         'type' => 'Author',
        //         'attributes' => [
        //             'name' => $author->name,
        //             'created_at' => $author->created_at,
        //             'updated_at' => $author->updated_at,
        //         ],
        //     ],
        //     'status' => 200,
        //     'headers' => [],
        //     'options' => 0,
        // ]);

        // $AuthorsResource = new AuthorsResource($author);
        // return response()->json([
        //     'data' => $AuthorsResource,
        //     'status' => 200,
        //     'headers' => [],
        //     'options' => 0,
        // ]);

        // return response()->json($AuthorsResource);

        return new AuthorsResource($author);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAuthorRequest  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorsRequest $request, Author $author)
    {
        $author->update([
            'name' => $request->input('name'),
        ]);

        // all these methods works
        // return response()->json($author);
        // return response()->json(new AuthorsResource($author));
        return new AuthorsResource($author);
        // end of methods

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return response(null, 204);
        
    }
}
