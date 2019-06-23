@include('welcome')

<h4> Completed task</h4>
<div class="container-fluid" style="">
<table class="table table-striped table-bordered table-success table-sm	" style="border:1px solid black; border-collapse: collapse;width:100%">
		<thead class="thead-inverse" style="background-color: #dff0d8">
	  <tr>
        

        <th style="padding: 3px;border-bottom: 1px solid black;width:15%">Task Name</th>
        <th style="padding: 3px;border-bottom: 1px solid black;">Task Created by</th>
        <th style="padding: 3px;border-bottom: 1px solid black;">Task Assigned to</th>
      	<th style="padding: 3px;border-bottom: 1px solid black;"> Action </th>
</tr>
</thead>

@foreach($data as $datas)
	  <tr>
<th style="padding: 15px;border-bottom: 1px solid black;">{{$datas->task_name}} </th>
<th style="padding: 15px;border-bottom: 1px solid black;">{{$datas->created_by}}</th>
<th style="padding: 15px;border-bottom: 1px solid black;">{{$datas->assigned_to}}</th>
<th style="padding: 15px;border-bottom: 1px solid black;">
<a href="{{('details/'. $datas->task_id)}}"> 
 View
 </a>
 </th>
		
      </tr>
     @endforeach




 </table>
 





</div>

 