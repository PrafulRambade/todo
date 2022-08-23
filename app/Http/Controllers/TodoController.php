<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use DataTables;
use Illuminate\Support\Facades\Validator;


class TodoController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Todo::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn='';
                    if ($row->status == 0){
                    $btn =
                        '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' .
                        $row->id .
                        '" data-original-title="Edit" class="edit btn btn-primary btn-sm edittodo"><i class="fa fa-edit"></i></a>';

                    $btn =
                        $btn .
                        ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' .
                        $row->id .
                        '" data-original-title="Delete" class="btn btn-danger btn-sm deletetodo"><i class="fa fa-trash"></i></a>';
                    // if ($row->status == 0){
                    $btn =
                        $btn .
                        ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' .
                        $row->id .
                        '" data-original-title="Delete" class="btn btn-success btn-sm completetask_todo"><i class="fa fa-check"></i></a>';
                    // }
                }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('todo_view');
    }
    public function completed(Request $request)
    {
        if ($request->ajax()) {
            $data = Todo::where("status", "=", 1)->latest()->get();
            // return($data);
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('todo_view');
    }
    public function pending(Request $request){
        if ($request->ajax()) {
            $data = Todo::where("status", "=", 0)->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn =
                        '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' .
                        $row->id .
                        '" data-original-title="Edit" class="edit btn btn-primary btn-sm edittodo" title="Edit"><i class="fa fa-edit"></i></a>';

                    $btn =
                        $btn .
                        ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' .
                        $row->id .
                        '" data-original-title="Delete" class="btn btn-danger btn-sm deletetodo" title="Delete"><i class="fa fa-trash"></i></a>';
                    if ($row->status == 0){
                    $btn =
                        $btn .
                        ' <a href="javascript:void(0)" data-toggle="tooltip" title="Complete Task"  data-id="' .
                        $row->id .
                        '" class="btn btn-success btn-sm completetask_todo"><i class="fa fa-check"></i></a>';
                    }
                    
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('todo_view');
    }
    public function store(Request $request){
        // return $request;
        $validator = Validator::make($request->all(), [
            'title'=> 'required',
            'detail'=>'required',
        ],
        [
            'title.required' => 'Please Enter Task Name',
            'detail.required' => 'Please Enter Task Details'
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status'=>422,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $todo = new Todo;
            $todo->title = $request->input('title');
            $todo->detail = $request->input('detail');
            $todo->save();
            return response()->json([
                'status'=>200,
                'message'=>'TODO task Added Successfully.'
            ]);
        }
    }
    public function edit($id){
        $todo = Todo::find($id);
        if($todo)
        {
            return response()->json([
                'status'=>200,
                'todo'=> $todo,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No TODO task Found.'
            ]);
        }
    }
    public function update(Request $request){

        $validator = Validator::make($request->all(), [
            'title'=> 'required',
            'detail'=>'required',
        ],
        [
            'title.required' => 'Please Enter Task Name',
            'detail.required' => 'Please Enter Task Details'
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status'=>422,
                'errors'=>$validator->messages()
            ]);
        }
        else{
            $id = $request->input('id');
            $todo = Todo::find($id);
            if($todo)
            {
                $todo->title = $request->input('title');
                $todo->detail = $request->input('detail');
                $todo->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'TODO task Updated Successfully.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No TODO task Found.'
                ]);
            }
        }
    }
    public function destroy($id){
        $todo = Todo::find($id);
        if($todo)
        {
            $todo->delete();
            return response()->json([
                'status'=>200,
                'message'=>'TODO task Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No TODO task Found.'
            ]);
        }
    }
    public function completed_todo($id){
        $todo = Todo::find($id);
        if($todo)
        {
            Todo::where('id', $id)->update(array('status' => 1));
            return response()->json([
                'status'=>200,
                'message'=>'Status Completed Successfully.'
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'No TODO task Found.'
            ]);
        }
    }
    public function alltodos(){
        $todo = Todo::latest()->get();
        if($todo)
        {
            return response()->json([
                'status'=>200,
                'data'=>$todo
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'No TODO task Found.'
            ]);
        }
    }
    public function todo_pending(){
        $todo = Todo::where("status", "=", 0)->latest()->get();
        if($todo)
        {
            return response()->json([
                'status'=>200,
                'data'=>$todo
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'No TODO task Found.'
            ]);
        }
    }
    public function todo_completed(){
        $todo = Todo::where("status", "=", 1)->latest()->get();
        if($todo)
        {
            return response()->json([
                'status'=>200,
                'data'=>$todo
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'No TODO task Found.'
            ]);
        }
    }
}
