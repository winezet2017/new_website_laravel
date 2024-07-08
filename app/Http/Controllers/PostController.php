<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(10); // Retrieve 10 posts per page
        return view('posts.index', compact('posts'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|string',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|max:2048', // Adjust max file size as needed
            'is_featured' => 'boolean',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post = new Post([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'photo' => $request->file('photo') ? $request->file('photo')->store('photos', 'public') : null,
            'is_featured' => $request->has('is_featured'),
            'user_id' => Auth::id(),
            'category_id' => $request->input('category_id'),
        ]);

        $post->save();

        return redirect()->route('posts.index')->with("message", "Post created successfully");
    }
    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // Assuming you have a view for editing a post

        $categories = Category::all();

        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    { {

            $validated = $request->validated();


            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoPath = $photo->store('photos', 'public');


                if ($post->photo) {
                    Storage::disk('public')->delete($post->photo);
                }

                $validated['photo'] = $photoPath;
            }

            // Update the post model with validated data
            $post->fill($validated);
            $post->save();

            // Redirect back to the edit form with a success message
            return Redirect::route('posts.index', $post->id)->with('success', 'Post updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return redirect()->route('posts.index')->with("message", "post deleted");
    }
}
