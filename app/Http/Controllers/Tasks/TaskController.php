<?php

namespace App\Http\Controllers\Tasks;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Models\Status;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{
    public $authors;

    public function __construct()
    {
        $tasks = Task::all();
        $this->authors = $tasks->map(function ($item){
            return $item->author;
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $tasks = Task::paginate(6);
        $statuses = Status::all();
        $authors = $this->authors;
        return view('tasks.index',compact('tasks','authors','statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create():View
    {
        $statuses = Status::all();
        return view("tasks.create",compact("statuses"));
    }

    /**
     * @param StoreTaskRequest $request
     * @return RedirectResponse
     */
    public function store(StoreTaskRequest $request): RedirectResponse
    {
        Task::create([
            "name" => $request->name,
            "author" => $request->author,
            "status_id" => (integer)$request->status
        ]);

        return redirect()->route("index")->with('success','Задача была создана');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {
        $task = Task::find($request->id);
        if (!$task){
            return response()->json([
                "success" => false,
                "message" => "Просим перезагрузить страницу"
            ]);
        }
        $task->delete();
        return response()->json([
            "success" => true,
            "message" => "Задача была удалена"
        ]);
    }
    
    /**
     * To filter data
     *
     * @return View
     */
    public function filter(Request $request):View
    {
        $filterAuthor = $request->author ?? "";
        $filterStatus = $request->status ?? "";
        $where = [];
        if ($request->author !== "all"){
            $where["author"] = $request->author;
        }

        if ($request->status !== "all"){
            $where["status_id"] = $request->status;
        }

        $tasks = Task::where($where)->paginate();
        $statuses = Status::all();
        $authors = $this->authors;
        return view('tasks.index',compact('tasks','authors','statuses','filterAuthor','filterStatus'));
    }
}
