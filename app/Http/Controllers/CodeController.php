<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Http\Requests\StoreCodeRequest;
use App\Http\Requests\UpdateCodeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Gate;

class CodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('code_read'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($request->ajax()) {
            $query = Code::where('userID', Auth::user()->userID)->get();
            $table = Datatables::of($query);

            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row){
                $showGate = "code_read";
                $updateGate = "code_update";
                $deleteGate = "code_delete";
                $route = "codeEditor";
                $primaryKey = "codeID";
                return view('partials.btnActions', compact('showGate', 'updateGate', 'deleteGate', 'route', 'primaryKey', 'row'));
            });

            $table->rawColumns(['actions']);

            return $table->make(true);
        }
        $breadcrumbs = [
            ['name' => "Index"]
        ];
        return view('code.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('code_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $breadcrumbs = [
            ['link' => "/codeEditor", 'name' => "Index"], ['name' => "Code Editor"]
        ];
        return view('code.create', compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCodeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCodeRequest $request)
    {
        $request->validate([
            'code' => 'required|string',
        ]);

        // Save the code to the database
        Code::create([
            'code' => $request->code,
            'date' => now(),
            'userID' => Auth::user()->userID
        ]);

        // Return JSON response with a redirect URL
        return response()->json([
            'message' => 'Code saved successfully!',
            'redirect' => route('codeEditor.index') // Use the route name for redirection
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Http\Response
     */
    public function show(Code $codeEditor)
    {
        abort_if(Gate::denies('code_read'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $breadcrumbs = [
            ['link' => "/codeEditor", 'name' => "Index"], ['name' => "Show"]
        ];
        return view('code.show', compact('breadcrumbs', 'codeEditor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Http\Response
     */
    public function edit(Code $codeEditor)
    {
        abort_if(Gate::denies('code_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $breadcrumbs = [
            ['link' => "/codeEditor", 'name' => "Index"], ['name' => "Edit"]
        ];
        return view('code.edit', compact('breadcrumbs', 'codeEditor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCodeRequest  $request
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCodeRequest $request, Code $codeEditor)
    {
        $request->validate([
            'code' => 'required|string',
        ]);

        // Save the code to the database
        Code::where('codeID', $codeEditor->codeID)->update([
            'code' => $request->code,
            'date' => now(),
            'userID' => Auth::user()->userID
        ]);

        // Return JSON response with a redirect URL
        return response()->json([
            'message' => 'Code Edited successfully!',
            'redirect' => route('codeEditor.index') // Use the route name for redirection
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Http\Response
     */
    public function destroy(Code $codeEditor)
    {
        abort_if(Gate::denies('code_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $codeEditor->delete();
        return redirect()->route('codeEditor.index')->with('message', 'Code Deleted Successfully!!');
    }
}
