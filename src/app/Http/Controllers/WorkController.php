<?php

namespace App\Http\Controllers;
use App\Http\Resources\Work as Resource;
use App\Models\Work;
use Illuminate\Http\Request;
use DB;

class WorkController extends Controller
{

    /**
     * middlewareのテスト用アクション
     *
     * @param int $id
     * @return int
     */
    public function test(int $id) {
        return $id;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        return Resource::collection(
//            Work::All()
//        );
        // https://readouble.com/laravel/5.5/ja/eloquent-relationships.html#eager-loading
        DB::enableQueryLog();
        $result = Resource::collection(
//            Work::All()
            Work::with(['owner'])->get()
        );
        $json = $result->toJson();
        dd(DB::getQueryLog());
        return $json;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // https://readouble.com/laravel/5.5/ja/routing.html#route-model-binding
//    public function show(Work $work)
//    {
//        return new Resource($work);
//    }
    public function show($id)
    {
        $work = new Work();
        return new Resource($work->find($id));
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
    public function destroy($id)
    {
        //
    }
}
