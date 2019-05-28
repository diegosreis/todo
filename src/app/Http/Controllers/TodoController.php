<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $isDone =  $object = $request->query('is_done');

        return ($isDone === null ? Todo::all():Todo::where('is_done', $isDone)->get());
    }

    public function getDone()
    {
        return Todo::where('is_done', 1)->get();
    }

    public function getTodo()
    {
        return Todo::where('is_done', 0)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $todo = new Todo;
        $todo->description = $request->description;
        $todo->is_done = false;

        $todo->save();

        return $todo;

    }

    /**
     * Set resource as done
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setDone($id)
    {
        $todo = Todo::find($id);
        $todo->is_done =  true;

        $todo->save();

        return $todo;
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
        $todo = Todo::find($id);
        $todo->description = $request->description;
        $todo->is_done =  ($request->is_done === null? false: $request->is_done);

        $todo->save();

        return $todo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
    }

    /**
     * Remove the all resource from storage.
     * @return \Illuminate\Http\Response
     */
    public function deleteAll()
    {
        Todo::all()->each->delete();
    }

    public function deleteAllDone()
    {
        $todoResult = Todo::where('is_done', 1)->get();

        foreach ($todoResult as $todo ){
            $todo->delete();
        }
    }
}
