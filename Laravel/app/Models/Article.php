<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Article extends Model
{
    protected $fillable = ['id', 'title', 'body'];

    // Tạm thời mock data
    protected static $data = [
        1 => ['id' => 1, 'title' => 'Bài viết demo 1', 'body' => 'Nội dung bài viết demo 1...'],
        2 => ['id' => 2, 'title' => 'Bài viết demo 2', 'body' => 'Nội dung bài viết demo 2...'],
    ];

    public static function findOrFail($id)
    {
        if (isset(self::$data[$id])) {
            return (object) self::$data[$id]; // ép kiểu object để giống model thật
        }

        throw new ModelNotFoundException("Không tìm thấy bài viết #$id");
    }
}
