<?php

namespace App\Http\Controllers;

use App\Models\Text;
use App\Http\Requests\StoreTextRequest;
use App\Http\Requests\UpdateTextRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Gate;

class TextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('text_read'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        if ($request->ajax()) {
            $query = Text::where('userID', Auth::user()->userID)->get();
            $table = Datatables::of($query);

            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row){
                $showGate = "text_read";
                $updateGate = "text_update";
                $deleteGate = "text_delete";
                $route = "textEditor";
                $primaryKey = "textID";
                return view('partials.btnActions', compact('showGate', 'updateGate', 'deleteGate', 'route', 'primaryKey', 'row'));
            });

            $table->rawColumns(['actions']);

            return $table->make(true);
        }
        $breadcrumbs = [
            ['link' => "/textEditor", 'name' => "Index"], ['name' => "Index"]
        ];
        return view('text.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('text_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $breadcrumbs = [
            ['link' => "/textEditor", 'name' => "Index"], ['name' => "Create"]

        ];
        return view('text.textEditor', compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTextRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTextRequest $request)
    {
        Text::create([
            'text' => $request->text,
            'userID' => Auth::user()->userID,
            'date' => now()
        ]);
        return redirect()->route('textEditor.index')->with('message', 'Text Added Successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Text  $text
     * @return \Illuminate\Http\Response
     */
    public function show(Text $textEditor)
    {
        abort_if(Gate::denies('text_read'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $breadcrumbs = [
            ['link' => "/textEditor", 'name' => "Index"], ['name' => "Show"]

        ];
        return view('text.show', compact('breadcrumbs', 'textEditor'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Text  $text
     * @return \Illuminate\Http\Response
     */
    public function edit(Text $textEditor)
    {
        abort_if(Gate::denies('text_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $breadcrumbs = [
            ['link' => "/textEditor", 'name' => "Index"], ['name' => "Edit"]

        ];
        return view('text.edit', compact('breadcrumbs', 'textEditor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTextRequest  $request
     * @param  \App\Models\Text  $text
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTextRequest $request, Text $textEditor)
    {
        Text::where('textID', $textEditor->textID)->update([
            'text' => $request->text,
            'userID' => Auth::user()->userID,
            'date' => now()
        ]);
        return redirect()->route('textEditor.index')->with('message', 'Text Edited Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Text  $text
     * @return \Illuminate\Http\Response
     */
    public function destroy(Text $textEditor)
    {
        abort_if(Gate::denies('text_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $textEditor->delete();
        return redirect()->route('textEditor.index')->with('message', 'Text Deleted Successfully!!');
    }
}
