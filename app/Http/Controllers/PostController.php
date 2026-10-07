<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Menampilkan semua daftar postingan (Read)
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Menampilkan form untuk membuat postingan baru (Create)
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Menyimpan postingan baru ke database (Store)
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required'
        ]);

        // Otomatis membuat slug dari title
        $validatedData['slug'] = Str::slug($request->title);

        Post::create($validatedData);

        return redirect('/posts')->with('success', 'Postingan baru berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail postingan tertentu (Show)
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Menampilkan form untuk mengedit postingan (Edit)
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Memperbarui data postingan di database (Update)
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'body' => 'required'
        ];

        $validatedData = $request->validate($rules);
        $validatedData['slug'] = Str::slug($request->title);

        $post->update($validatedData);

        return redirect('/posts')->with('success', 'Postingan berhasil diperbarui!');
    }

    /**
     * Menghapus postingan dari database (Destroy)
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/posts')->with('success', 'Postingan berhasil dihapus!');
    }
}