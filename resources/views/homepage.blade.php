@include('welcome')

<div class="jumbotron">
<form action="/tasknamesearch" method="POST">
        {{ csrf_field() }}

        <div class="form-group" >
            

        
            <input type="text" class="form-control" id="name"  name="name" placeholder="Type Search...."> 
          
        </div>

        <div class="form-group">
            <label for="description">Search By</label><br/>
            <label class="radio-inline"><input type="radio" name="filter" value="1"> Task Name</label>
            <label class="radio-inline"><input type="radio" name="filter" value="2"> Task created by</label>
            <label class="radio-inline"><input type="radio" name="filter" value="3"> Task Assigned to</label>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>

<a href={{('taskdetails')}}> <button class="btn btn-success" > Add Task </button> </a>

<a href={{('completedtaskdetails')}}> <button class="btn btn-primary" > Completed task </button> </a>

