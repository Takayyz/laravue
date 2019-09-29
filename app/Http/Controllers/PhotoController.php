<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhoto;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 写真投稿
     *
     * @param StorePhoto $request
     * @return \Illuminate\Http\Response
     */
    public function create(StorePhoto $request)
    {
        // 投稿写真の拡張子を取得
        $extension = $request->photo->extension();

        $photo = new Photo();

        // インスタンス生成時に割り振られたランダムなID値と取得した拡張子を組み合わせてファイル名生成
        $photo->filename = $photo->id . '.' . $extension;

        // S3にファイル保存
        // 第四引数の'public'はファイルを公開状態で保存するため
        Storage::cloud()->putFileAs('', $request->photo, $photo->filename, 'public');

        // DBエラー時にファイル削除を行うためトランザクションを利用
        DB::beginTransaction();

        try {
            Auth::user()->photos()->save($photo);
            DB::commit();
        } catch(\Exception $exception) {
            DB::rollback();
            // DBとの整合性保つためアップロードしたファイル削除
            Storage::cloud()->delete($photo->filename);
            throw $exception;
        }

        // リソースの新規作成のため、レスポンスコード201(CREATED)を返す
        return response($photo, 201);
    }
}
