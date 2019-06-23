@include('welcome')

<h4> Add timeline for task</h4>
<div class="table-responsive">
	 @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
                <form  action="/subtasksubmit" method="POST" id="dynamic_form">        
                 
    <div class="form-group">
            
            <input type="hidden" class="form-control" id="task_name"  name="task_id" value={{$lastinsertid}}>
        </div>
                 <table class="table table-bordered table-striped" id="user_table">

        
               <thead>
                <tr>
                    <th width="18%">Subtask Name</th>
                    <th width="18%">Subtask Done by</th>
                    <th width="18%">Start date</th>
                    <th width="18%">End Date</th>
                    <th width="18%">Main task completed</th>
                    <th width="10%">Action</th>
                </tr>
               </thead>
               <tbody>

               </tbody>
               <tfoot>
                <tr>
                                <td colspan="5" align="right">&nbsp;</td>
                                <td>
                  @csrf
          <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
                 </td>
                </tr>
               </tfoot>
           </table>

                </form>
   </div>

   <script>
$(document).ready(function(){

 var count = 1;

 dynamic_field(count);

 function dynamic_field(number)
 {
  html = '<tr>';
        html += '<td><input type="text" name="subtask_name[]" class="form-control" required/></td>';
        html += '<td><input type="text" name="done_by[]" class="form-control" required /></td>';
        html += '<td><input type="date" required name="start_date[]" class="form-control" /></td>';
        html += '<td><input type="date"required name="end_date[]" class="form-control" /></td>';
        html += '<td><input type="checkbox" value="1" name="subtask_completed[]" class="form-control" /></td>';

        if(number > 1)
        {
            html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
            $('tbody').append(html);
        }
        else
        {   
            html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
            $('tbody').html(html);
        }
 }

 $(document).on('click', '#add', function(){
  count++;
  dynamic_field(count);
 });

 $(document).on('click', '.remove', function(){
  count--;
  $(this).closest("tr").remove();
 });

});
</script>