<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
USE Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Validator;
use App\Task;
use App\Subtask;

class todoController extends Controller
{
	public function show(){
            return view('homepage');
}

	public function completedtask(){
$data=DB::table('tasks')
            ->where('completed', '1')
            ->get();
//dd($data);
     $data1=DB::table('tasks')
            ->where('completed', '0')
            ->get();
            return view('completedtasklist')->with('data',$data)->with('data1',$data1);
}


public function taskdetails($task_id){

$id= $task_id;
//dd($id);

$data=DB::table('tasks')
            ->where('task_id', $id)
            ->get();

$data1=DB::table('subtasks')
            ->where('task_id', $id)
            ->get();

      return view('viewtaskdeatils')->with('data',$data)->with('data1',$data1);



}


    public function addtask()
{
	

	return view('taskdetails');
}

    public function addtaskdetail(Request $data)
{

	 $validatedData = $data->validate([
        'task_name' => 'required|max:255',
        'created_by' => 'required',
        'assigned_to' => 'required',
    ]);

	$taskdata=$data->all();

	//Task::insert($taskdata);
       //dd($taskdata);
	$taskdatafill = new Task();
	$taskdatafill->task_name  = $taskdata['task_name'];
	$taskdatafill->created_by  = $taskdata['created_by'];
	$taskdatafill->assigned_to  = $taskdata['assigned_to'];
	$taskdatafill->completed  = '0';

	  if ($taskdatafill->save()) {
            
    $last_insert_id = \Response::json(array('success' => true,'last_insert_id' => $taskdatafill->task_id), 200)->getData()->last_insert_id;
    //dd($last_insert_id);
       return view('subtaskdetails')->with('lastinsertid',$last_insert_id);
   }

}

    public function addsubtasksubmit(Request $data){



$taskdata=$data->all();
//dd($taskdata);
       
       //dd($lastinsertid);
//$data=$taskdata.serialize();
//dd($taskdata);
       //return view('homepage');




$subtask_name = $data->subtask_name;
$done_by = $data->done_by;
$start_date = $data->start_date;
$end_date = $data->end_date;
$subtask_completed = $data->subtask_completed;
//dd($subtask_completed[0]);
$lastinsertid= $data ->task_id;



//dd($subtask_name);
         for($count = 0; $count < count($subtask_name); $count++)
      {
     
       $data = array(

     'subtask_name' => $subtask_name[$count],
      'done_by'  => $done_by[$count],
       'start_date'  => $start_date[$count],
        'end_date'  => $end_date[$count],
        //'subtask_completed' => $subtask_completed[$count],
       'task_id' => $lastinsertid,
                
          );
      // $taskdatafill->save();
       $insert_data[] = $data; 
       Subtask::insert($data);
      }
      //Subtask::insert($insert_data);

      if($subtask_completed[0]==1){

      	DB::table('tasks')
            ->where('task_id', $lastinsertid)
            ->update(['completed' => '1']);
      }
      return redirect('/');

     // return redirect()->route('/');
      //return view('homepage');
       //dd($insert_data);
}


    public function addtasksearch(Request $data)
{
	

	
$taskdata=$data->all();
//dd($taskdata);
$searched= $taskdata['name'];
$filtered= $taskdata['filter'];
//dd($filtered);
if($filtered==1)
{
	$data=DB::table('tasks')
			->where('completed','1')
            ->where('task_name', $searched)
            ->get();
    return view('searcheddata')->with('data',$data);
}
if($filtered==2)
{
	$data=DB::table('tasks')
			->where('completed','1')
            ->where('created_by', $searched)
            ->get();
  return view('searcheddata')->with('data',$data);   
}
if($filtered==3)
{
	$data=DB::table('tasks')
			->where('completed','1')
            ->where('assigned_to', $searched)
            ->get();
     return view('searcheddata')->with('data',$data);
}
}




}
