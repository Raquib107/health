

@extends('layouts.app')


@section('content')

{{$msg or ''}}
<div class="col-md-5 col-md-offset-1">



    <div class="panel-panel-info">

        <header class="sec-heading">
            <h2><?php $doctors = \DB::table('users')->select('First_name','Last_name')->where('id', $newdoctor->user_id)->first();echo "Dr. ".$doctors->First_name." ".$doctors->Last_name."'s Chambers"; ?></h2>



        </header>


        <?php $x = 0;?>
        <?php foreach ( $chambers as $option ) : ?>

            <div class="panel panel-info">



               <?php  echo $x = $x+1,". ",$option->Chamber_name,'<br>',"Address: ",$option->Full_address,'<br>',"Phone: ",$option->Phone; ?>

           </div>

       <?php endforeach; ?>

   </div>


</div>
<div class="col-md-12 col-md-offset-0">

    <div class="panel panel-default">

        <div class="panel-body">



         <?php $x = 0;?>
         <div class="gray-bg">
          <section id="blog" class="section container blog-columns blog-preview">
            <div class="row">
               @if (!empty($schedules))
               <header class="sec-heading">
                <h2><?php $doctors = \DB::table('users')->select('First_name','Last_name')->where('id', $newdoctor->user_id)->first();echo "Dr. ".$doctors->First_name." ".$doctors->Last_name."'s Schedule"; ?></h2>
                <span class="subheading">Chambers Details are above</span>


            </header>


            <div class="panel-body">
                <table class="table table-striped task-table">

                    <thead class="thin-border-bottom">

                     <th width="100" >Availbale Date</th>
                     <th width="100" >Chamber Name</th>
                     <th width="100" >Day</th>
                     <th width="100" >Time</th>
                     <th width="100" >Empty</th>

                     <th width="3" > Action</th>



                 </thead>
                 <tbody>


                    @foreach ($schedules as $task)
                    <tr>


                        <?php $count = \DB::table('appointments')->where('Schedule_id', $task->id)->count();  ?>
                        @if($count>=0)
                        @if($count < $task->Up_limit)
                        <td class="table-text"><div><?php $days = \DB::table('days')->select('day')->where('id', $task->day_id)->first(); $d=strtotime("next ".$days->day);
                            echo date("M d", $d) . "<br>"; ?> </div></td> 
                            <td class="table-text"><div><?php $chambers = \DB::table('chambers')->select('Chamber_name')->where('Chamber_id', $task->Chamber_id)->first();echo $chambers->Chamber_name;  ?></div></td>
                            <td class="table-text"><div><?php echo $days->day;  ?></div></td>

                            <td class="table-text"><div><?php echo $task->Time ?></div></td>
                            <td class="table-text"><div><?php echo $task->Up_limit- $count ?></div></td>
                            <td class="table-text"><div>

                                <form action="{{url('appointment/make')}}={{ $task->id }}" method="POST">
                                    {{ csrf_field() }}

                                    <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-info">
                                        <i class="fa fa-hand-pointer-o" aria-hidden="true"></i></i>Make Appointment
                                    </button>
                                </form>

                            </div></td>
                            <!-- Task Delete Button, doctor table er id send kori-->
                            @endif
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @endif
        </div>



    </div>







</div>

</div>
</div>




@endsection