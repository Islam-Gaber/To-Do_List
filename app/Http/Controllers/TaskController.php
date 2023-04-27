<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        Auth::user()->tasks()->create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'completed' => $request->has('completed'),
        ]);

        return redirect()->route('dashboard');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $task->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'completed' => $request->input('completed'),
        ]);

        return redirect()->route('dashboard');
    }

    public function complete(Task $task)
    {
        $task->update([
            'completed' => true,
        ]);

        return redirect()->route('dashboard');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('dashboard');
    }
}
