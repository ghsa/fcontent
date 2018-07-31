<?php

namespace FContent\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use FContent\PageHandler;
use FContent\Models\Page;
use FContent\Models\Field;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class PageController extends Controller
{


    public function __construct()
    {
        $this->middleware(config('fcontent.auth_middleware'));
    }


    public function editContent($id)
    {
        $page = Page::find($id);

        return view('fcontent::page.editContent', compact('page'));

    }

    public function saveContent(Request $request)
    {
        $page = Page::find($request->get('page_id'));

        foreach($page->fields as $field){
            if(!empty($request->get($field->getFormName())) || !empty($request->file($field->getFormName()))) {
                if($field->type == Field::TYPE_TEXT || $field->type == Field::TYPE_HTML) {
                    $field->value = $request->get($field->getFormName());
                }elseif ($field->type == Field::TYPE_IMAGE || $field->type == Field::TYPE_FILE) {
                    $file = $request->file($field->getFormName());
                    $field->uploadAndSaveFile($file);
                }
                $field->save();
            }
        }

        flash("Content successfully saved.")->success();
        return redirect()->back();

    }

    public function index()
    {
   
    
        $pages = Page::with('fields')->paginate(10);

        return view('fcontent::page.index', compact('pages'));
    }

    public function insert()
    {
        return view('fcontent::page.insert', compact('insert'));
    }
    
    public function save(Request $request)
    {
        $request->validate([
            'path' => 'required'
        ]);

        if(!$this->validateFileExists($request->get('path'))) {
            flash("File doesn't exists")->error();
            return redirect()->back();
        }

        $page = Page::getPage($request->get('path'));

        $pageHandler = new PageHandler($page);
        $pageHandler->readPageFields();

        return redirect()->back();
    }


    private function validateFileExists($path)
    {
        $file = base_path().'/resources/views/'.$path;
        if(!file_exists($file)) {
            return false;
        }
        return true;
    }


    public function reload($id)
    {
        $page = Page::find($id);
        $pageHandler = new PageHandler($page);
        $pageHandler->readPageFields();

        flash("Content successfully reloaded.")->success();
        return redirect()->route("fcontent.home");

    }
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function test()
    {

        $page = Page::getPage("site/index.blade.php");
        $pageHandler = new PageHandler($page);

        $pageHandler->readPageFields();

    }



}
