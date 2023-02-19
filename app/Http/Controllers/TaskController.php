<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Approvement;
use App\Models\Notification;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request): RedirectResponse
    {
        $request->validate([
            'tasks_name' => ['required'],
            'description' => ['required'],
            'file' => ['required']
        ]);
        
        //upload attachment
        $file = $request->file('file');
        $file->storeAs('/public/file', $file->hashName());
        
        $task = Task::create([
            'tasks_name' => $request['tasks_name'],
            'description' => $request['description'],
            'file' => $file->hashName(),
            'user_id' => $request['user_id']
        ]);

        $task->save();

        if($task) {
            $approvement = [
                'task_id' => $task->id,
                'approved_by_id' => $request['user_id'],
                'step' => 1,
                'status' => 'new',
                'notes' => "New by You."
            ];
                    
            $approve = Approvement::create($approvement);
            $manager = User::whereRole('manager')->first();

            $notify = [
                'title' => "New Task from employee",
                'message' => 'for ' . $request['tasks_name'],
                'from_id' => $request['user_id'],
                'to_id' => $manager->id
            ];
            $notification = Notification::create($notify);
            
            if($approve) {
                $notification->save();
            }
        }

        return redirect()->route('dashboard')->with(['success' => 'new task created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task): Response
    {
        //
        $task['approvements'] = $task->approvements;
        return response($task);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): Response
    {
        //
        return response($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task): RedirectResponse
    {
        //
        $request->validate([
            'tasks_name' => ['required'],
            'description' => ['required']
        ]);

        //upload attachment
        $file = $request->file('file');
        if ($file != null) {
            $file->storeAs('/public/file', $file->hashName());
        }
        
        $updateArr = [
            'tasks_name' => $request['tasks_name'],
            'description' => $request['description'],
            'file' => $file ? $file->hashName() : null
        ];

        if ($file == null) {
            unset($updateArr['file']);
        }

        $task->update($updateArr);

        return response($task);

        // return redirect()->route('dashboard')->with(['success' => 'task updated']);
    }

    public function approve(UpdateTaskRequest $request): RedirectResponse
    {
        //
        $request->validate([
            'taskid' => ['required'],
            'task_name' => ['required'],
            'status' => ['required'],
        ]);

        $task = Task::whereId($request['taskid'])->first();

        $approvement = [
            'task_id' => $request['taskid'],
            'approved_by_id' => Auth::user()->id,
            'step' => 1,
            'status' => $request['status'],
            'notes' => $request['task_name'] . " is " . $request['status'] . " by " . Auth::user()->fullname
        ];
        $approve = Approvement::create($approvement);
        $approve->save();
        
        $rejectedTitle = Auth::user()->fullname . ' has rejected Manager Approvement';
        $approvedTitle = Auth::user()->fullname . ' has ' . $request['status'];
        
        $notify = [
            'title' => $request['status'] == 'rejected' ? $rejectedTitle : $approvedTitle,
            'message' => 'for ' . $request['task_name'],
            'from_id' => Auth::user()->id,
            'to_id' => $task['user_id']
        ];
        $notification = Notification::create($notify);
        
        if($approve) {
            $notification->save();
        }

        return redirect()->route('dashboard')->with(['success' => 'task approved']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Approvement::where('task_id', $id)->delete();
        Task::whereId($id)->delete();
        // return response([ 'message' => $id . ' is deleted']);
    }
}
