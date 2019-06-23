 @include('welcome')


<form action="/subtaskdetails" method="POST">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="title">Task Name</label>
            <input type="text" class="form-control" id="task_name"  name="task_name">
        </div>

         <div class="form-group">
            <label for="title">Task Created by</label>
            <input type="text" class="form-control" id="created_by"  name="created_by">
        </div>

         <div class="form-group">
            <label for="title">Task Assigned to</label>
            <input type="text" class="form-control" id="assigned_to"  name="assigned_to">
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Add Timeline to Task</button>
    </form>