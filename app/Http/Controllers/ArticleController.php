<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Cgy;
use Carbon\Carbon;
use Illuminate\Http\Request;
use index;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $artible = Article::all();
        // $artible = Article::select('sort')->where('id', '>', 5)->sum('sort');
        $date = Carbon::createFromFormat('Y-m-d h:i:s', '2022-12-14 00:00:00');
        $artible = Article::where('enabled_at', '>', $date)->get();

        return $artible;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = ['1' => '分類1', '2' => '分類2', '3' => '分類3'];
        $data = '2';
        return view('articles.create', compact('datas', 'data'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(ArticleRequest $request)
    public function store(Request $request)
    {
        // dd($request);

        if ($request->hasFile('pic')) {
            $file = $request->file('pic'); //取得upload檔案
            if ($file->isValid()) { //判斷檔案室否有
                $extension = $file->getClientOriginalExtension(); //取得副檔名
                $filename = time() . '.' . $extension; //檔名加上時間
                $savepath = $file->storeAs('pic', $filename); //預設路徑在storage/app下
            }
        }

        $article = new Article();
        $article = Article::create($request->all());

        // $article->subject = $request->input('subject');
        // $article->content = $request->input('content');
        // $article->cgy_id = $request->input('cgy_id');
        // $article->enabled = $request->input('enabled');
        // $dt = new Carbon($request->enabled_at);
        // $article->enabled_at = $dt;
        // $article->sort = $request->input('sort');
        // $article->pic = $filename;

        // $article->save();

        // return 'ok';

        return redirect(url('/articles'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $artible = Article::find($id);
        // $artible = Article::findOrFail($id);
        // $artible = Article::findOrFail([1, 2]);
        // $artible = Article::where('id', 1)->first();
        //$artible = Article::where('enabled', true)->orderBy('id', 'desc')->get();
        //$artible = Article::whereBetween('id', [1, 5])->orderBy('id', 'desc')->get();
        $artible = Article::whereIn('id', $id)->orderBy('id', 'desc')->get();

        return $artible;
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cgy $cgy)
    {
        $cgy->delete();
        // Cgy::destroy($cgy->id);

    }
}