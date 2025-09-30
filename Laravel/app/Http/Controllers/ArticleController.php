<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Tạm thời dùng mảng giả dữ liệu
        $articles = [
            ['id' => 1, 'title' => 'Giới thiệu Laravel 12', 'body' => 'Nội dung A'],
            ['id' => 2, 'title' => 'Blade Components', 'body' => 'Nội dung B'],
        ];

        return view('articles.index', compact('articles'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body'  => ['required', 'string', 'min:10'],
        ]);

        // Demo: chưa lưu DB
        return redirect()->route('articles.index')
                         ->with('success', 'Tạo bài viết thành công (demo).');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return "Xem chi tiết bài viết ID: " . (int) $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         // Dữ liệu giả
        $article = [
            'id'    => $id,
            'title' => 'Tiêu đề mẫu',
            'body'  => 'Nội dung mẫu',
        ];

        return view('articles.edit', compact('article'));
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
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body'  => ['required', 'string', 'min:10'],
        ]);

        return redirect()->route('articles.index')
                         ->with('success', "Cập nhật bài viết #$id thành công (demo).");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->route('articles.index')
                         ->with('success', "Đã xoá bài viết #$id (demo).");
    }
}
