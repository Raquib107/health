@extends('layouts.app')


@section('content')

{{$msg or ''}}
<div class="col-md-12 col-md-offset-0">

    <div class="panel panel-default">

        <div class="panel-body">







 <?php $x = 0;?>
<div class="gray-bg">
  <section id="blog" class="section container blog-columns blog-preview">
    <div class="row">
        
      <header class="sec-heading">
        <h2>MY APPOINTMENTS</h2>
        <span class="subheading">Appointment Details </span>
        

    </header>
   

    <div class="panel-body">
        <table class="table table-striped task-table">

            <thead class="thin-border-bottom">
               
               <th width="10" >#</th>
               <th width="20" >Date</th>
               <th width="100" >Doctor</th>
               <th width="100" >Chamber</th>
               <th width="100" >Full Address</th>
               <th width="100" >Serial</th>
               <th width="20" >Phone</th>
                
                <th width="50" >Time</th>
                <th width="50" >Action</th>


            </thead>
            <tbody>

          
                @foreach ($appointments as $task)

               <?php  $doctor = \DB::table('doctors')->select('User_id','Visit')->where('id', $task->Doctor_id)->first();

               $chamber_id = \DB::table('schedules')->select('Chamber_id','id','day_id','Time')->where('id', $task->Schedule_id)->first();
               
              // echo $chamber_id->Chamber_id;

               $chamber = \DB::table('chambers')->select('Chamber_name','Full_address')->where('Chamber_id',$chamber_id->Chamber_id)->first();
             //  echo $chamber->Chamber_name;


                     
              $doc_data= \DB::table('users')->select('First_name','Last_name','phone')->where('id', $doctor->User_id)->first();
  ?>

                <tr>
                  	<td class="table-text"><div><?php echo $x=$x+1?></div></td>
                  	<td class="table-text"><div><?php  $days = \DB::table('days')->select('day')->where('id', $chamber_id->day_id)->first(); $d=strtotime("next ".$days->day);
echo date("M d", $d) . "<br>"; ?></div></td>
                     <td class="table-text"><div><?php echo $doc_data->First_name." ".$doc_data->Last_name; ?></div></td> 
                    <td class="table-text"><div><?php echo $chamber->Chamber_name; ?> </div></td>
                    <td class="table-text"><div><?php echo $chamber->Full_address; ?></div></td>

                    <td class="table-text"><div><?php echo $task->Serial ; ?></div></td>
                    <td class="table-text"><div><?php echo $doc_data->phone; ?></div></td>
                    <td class="table-text"><div><?php echo $chamber_id->Time; ?></div></td>

                    <td>
                        <form action="{{url('user/appointment/delete/')}}={{ $task->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                                <i class="fa fa-btn fa-trash"></i>Delete
                            </button>
                        </form>
                    </td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    
</div>
 </div>



 			</section>
 			</div>
 		</div>
	</div>

 @endsection