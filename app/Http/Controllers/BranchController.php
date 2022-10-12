<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    public function index(Request $request){

        $branches = Branch::get();

        return view('admin.branch.index', compact('branches'));
    }

    public function create(Request $request){
        return view('admin.branch.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
        ]);

        Branch::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.branch.index');
    }
    public function edit($id){
        $branch= Branch::find($id);
       
        return view('admin.branch.edit', compact('branch'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required',
            
        ]);

        $branch = Branch::find($id);
        $branch->name = $request->name;
        $branch->update();
    
        return redirect()->route('admin.branch.index')->with('success', 'Successfully update branch.');
    }


    public function delete($id){
        $branch = Branch::find($id);

        $branch->delete();

        return redirect()->route('admin.branch.index');
}
}