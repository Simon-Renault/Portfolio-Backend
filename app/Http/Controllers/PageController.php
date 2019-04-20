<?php
namespace App\Http\Controllers;
use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function showAllPages()
    {
        $res = Page::all()->map(function($page){
            return array(
                "id" => $page->id,
                "url" => $page->url,
                "json" => $page->json,
                "content" => ""
            );
        });

        return response()->json($res);
    }

    public function showOnePage($url)
    {
        $page = Page::where('url',$url)->get();
      
        $res = array(
            "id" => $page[0]->id,
            "url" => $page[0]->url,
            "content" => $page[0]->content
        );

       
        return response()->json($res);
    }

    public function create(Request $request)
    {
        $Page = Page::create($request->all());

        return response()->json($Page, 201);
    }

    public function update($id, Request $request)
    {
        $Page = Page::findOrFail($id);
        $Page->update($request->all());

        return response()->json($Page, 200);
    }

    public function delete($id)
    {
        Page::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}