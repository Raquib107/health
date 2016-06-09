
@extends('layouts.app')


@section('content')

<div class="col-md-12 col-md-offset-0">

    <div class="panel panel-default">

        <div class="panel-body">
                    
                         

               <?php $x = 0;?>
<div class="gray-bg">
  <section id="blog" class="section container blog-columns blog-preview">
    <div class="row">
        
      <header class="sec-heading">
        <h2>Up Coming Schedules</h2>
        <span class="subheading"></span>
        

    </header>
   

    <div class="panel-body">
        <table class="table table-striped task-table">

            <thead class="thin-border-bottom">
               
               <th width="100" >Availbale Date</th>
               <th width="100" >Chamber Name</th>
                <th width="100" >Day</th>
                <th width="100" >Time</th>
                <th width="100" >Patients</th>
                <th width="100" >Actions</th>
               



            </thead>
            <tbody>

           
                @foreach ($schedules as $task)
                <tr>
                   

                    <?php $count = \DB::table('appointments')->where('Schedule_id', $task->id)->count();  ?>
                    @if($count!=0)

                    
                     <td class="table-text"><div><?php $days = \DB::table('days')->select('day')->where('id', $task->day_id)->first(); $d=strtotime("next ".$days->day);
echo date("M d", $d) . "<br>"; ?> </div></td> 
                    <td class="table-text"><div><?php $chambers1 = \DB::table('chambers')->select('Chamber_name')->where('Chamber_id', $task->Chamber_id)->first();echo $chambers1->Chamber_name;  ?></div></td>
                    <td class="table-text"><div><?php echo $days->day;  ?></div></td>

                    <td class="table-text"><div><?php echo $task->Time ?></div></td>
                    <td class="table-text"><div><?php echo $count ?></div></td>
                    
                    <td>
                        <form action="{{url('doc/schedule/delete/')}}={{ $task->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                                <i class="fa fa-btn fa-trash"></i>Delete
                            </button>
                        </form>
                    </td>

                   @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    
</div>



      </div>

       <?php $x = 0;?>
<div class="gray-bg">
  <section id="blog" class="section container blog-columns blog-preview">
    <div class="row">
        
      <header class="sec-heading">
        <h2>My CHambers</h2>
        <span class="subheading"></span>
        

    </header>
   

    <div class="panel-body">
        <table class="table table-striped task-table">

            <thead class="thin-border-bottom">
               
               
               <th width="100" >Chamber Name</th>
                <th width="100" >Fulss Address</th>
                <th width="100" >Phone</th>
                

               



            </thead>
            <tbody>

           
                @foreach ($chambers as $task)
                <tr>
                   
                    
                    <td class="table-text"><div><?php echo $task->Chamber_name;  ?></div></td>
                    <td class="table-text"><div><?php echo $task->Full_address;  ?></div></td>

                    <td class="table-text"><div><?php echo $task->phone ?></div></td>
                    
                    
                    <!-- Task Delete Button, doctor table er id send kori-->
                   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    
</div>



      </div>



                         
           
                                    
                        
                     
        </div>

    </div>
</div>




@endsection