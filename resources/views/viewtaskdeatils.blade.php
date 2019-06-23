@include('welcome')

<div class="container-fluid" style="">
<table class="table table-striped table-bordered table-success table-sm	" style="border:1px solid black; border-collapse: collapse;width:100%">
		<thead class="thead-inverse" style="background-color: #dff0d8">
	  <tr>
        

        <th style="padding: 3px;border-bottom: 1px solid black;width:15%">Task Name</th>
        <th style="padding: 3px;border-bottom: 1px solid black;">Task Created by</th>
        <th style="padding: 3px;border-bottom: 1px solid black;">Task Assigned to</th>
      </tr>
</thead>


@foreach($data as $datas)
	  <tr>
		
<th style="padding: 15px;border-bottom: 1px solid black;">{{$datas->task_name}} </th>
<th style="padding: 15px;border-bottom: 1px solid black;">{{$datas->created_by}}</th>
<th style="padding: 15px;border-bottom: 1px solid black;">{{$datas->assigned_to}}</th>
      </tr>
      @endforeach
 </table>

<h4> Time line for task</h4> 

<table class="table table-striped table-bordered table-success table-sm	" style="border:1px solid black; border-collapse: collapse;width:100%">
		<thead class="thead-inverse" style="background-color: #dff0d8">
	  <tr>
        

        <th style="padding: 3px;border-bottom: 1px solid black;width:15%">subtask Name</th>
        <th style="padding: 3px;border-bottom: 1px solid black;">Subtask done by</th>
        <th style="padding: 3px;border-bottom: 1px solid black;">Start date</th>
        <th style="padding: 3px;border-bottom: 1px solid black;">End date</th>
      </tr>
</thead>

@foreach($data1 as $datas)
	  <tr>
<th style="padding: 15px;border-bottom: 1px solid black;">{{$datas->subtask_name}} </th>
<th style="padding: 15px;border-bottom: 1px solid black;">{{$datas->done_by}}</th>
<th style="padding: 15px;border-bottom: 1px solid black;">{{$datas->start_date}}</th>
<th style="padding: 15px;border-bottom: 1px solid black;">{{$datas->end_date}}</th>
		
      </tr>
      @endforeach
 </table>



</div>

