@extends('layouts.app')

@section('content')


        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/search_service') }}">
            {!! csrf_field() !!}
                <div class="panel-heading">Search for Emergency Service:</div>
                

                <div class="panel-body">
                    
                         Location:
                     <select id="" name="location_new">
                                     <?php foreach ( $locations as $option ) : ?>
                                    <option value="<?php echo $option->Location_id; ?>"><?php echo $option->Location_name; ?></option> 
                                    <?php endforeach; ?></select>
                                    
                        
                     
                </div>
                <div class="panel-body">
                     
                    Emergency Type:
                     <select name="service_type">
                                        <?php foreach ( $types as $option ) : ?>
                                 <option value="<?php echo $option->id; ?>"><?php echo $option->typename; ?></option> 
                            <?php endforeach; ?>

                            </select>
                        
                     
                </div>
                 <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-search" aria-hidden="true"></i></i>Search
                                </button>

                                
                            </div>
                        </div>
                </form>

                <div class="panel-body">


<?php $x = 0;?>

<div class="gray-bg">
  <section id="blog" class="section container blog-columns blog-preview">
    <div class="row">
        @if (!empty($alldata))
      <header class="sec-heading">
        <h2>Service Information list</h2>
        <span class="subheading">AlL the Information are authentic.</span>
    </header>
    

    <div class="panel-body">
        <table class="table table-striped task-table">

            <thead class="thin-border-bottom">
                <th width="10" >#</th>
                <th width="100" >Name</th>
                <th width="100" >Address</th>
                <th width="100" >Contact No</th>
                


            </thead>
            <tbody>
                @foreach ($alldata as $task)
                <tr>
                    <td class="table-text"><div> <?php echo $x = $x+1; ?></div></td>
                    <td class="table-text"><div>{{ $task->name }}</div></td>
                    <td class="table-text"><div>{{ $task->address }}</div></td>
                    <td class="table-text"><div>{{ $task->Contact_no }}</div></td>
                    <!-- Task Delete Button, doctor table er id send kori-->
                    
        
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else

        NO RESULTS!!!!

    @endif
</div>






                    
                        
                     
                </div>
            </div>

            
                     
              {{--searching doctors --}}     

            <div class="panel panel-default">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/search_doc') }}">
            {!! csrf_field() !!}
                <div class="panel-heading">Search for Doctors</div>

                <div class="panel-body">
                     
                   @if (Auth::guest())
                    
                    For searching Doctor.... Please, Log In.

                    @else
                        
                         Select prefered Category:
                         <select id="" name="category">
                             <?php foreach ( $categories as $option ) : ?>
                                 <option value="<?php echo $option->Category_id; ?>"><?php echo $option->Speciality; ?></option> 
                            <?php endforeach; ?>
                        </select>
                        <div class="panel-body">
                            

                       
                            <div class="form-group">
                             <div class="col-md-6 col-md-offset-4">
                                 <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-search" aria-hidden="true"></i></i>Search
                                 </button>
                                </div>
                            </div>


                         </div>
                    </div>



                         </form>

                         <div class="panel-body">


<?php $x = 0;?>
<div class="gray-bg">
  <section id="blog" class="section container blog-columns blog-preview">
    <div class="row">
         @if (!empty($members))
      <header class="sec-heading">
        <h2>Doctors Search Result</h2>
        <span class="subheading">Know Dcotors and make Appointment</span>
    </header>
   

    <div class="panel-body">
        <table class="table table-striped task-table">

            <thead class="thin-border-bottom">
                <th width="10" >#</th>
               <th width="100" >Doctor Name</th>
               <th width="100" >Email</th>
                <th width="100" >Affiliation</th>
                <th width="50" >Visit</th>
                <th width="3" > Action</th>



            </thead>
            <tbody>
                @foreach ($members as $task)
                <tr>
                    <td class="table-text"><div> <?php echo $x = $x+1; ?></div></td>
                    <td class="table-text"><div><?php echo $task->First_name; ?></div></td>
                    <td class="table-text"><div><?php echo $task->email; ?></div></td>

                    <td class="table-text"><div>{{ $task->Affiliation }}</div></td>
                    <td class="table-text"><div>{{ $task->Visit }}</div></td>
                    <!-- Task Delete Button, doctor table er id send kori-->
                    <td>
                        <form action="{{url('profile/doctor')}}={{ $task->doctor_id }}" method="POST">
                            {{ csrf_field() }}
                            

                            <button type="submit" id="delete-task-{{ $task->doctor_id }}" class="btn btn-danger">
                                <i class="fa fa-user" aria-hidden="true"></i></i>Profile
                            </button>
                        </form>
                    </td>
                    <td>
                        <form action="{{url('appointment/doctor')}}={{ $task->doctor_id }}" method="POST">
                            {{ csrf_field() }}
                           
                            <button type="submit" id="delete-task-{{ $task->doctor_id }}" class="btn btn-info">
                                <i class="fa fa-hand-pointer-o" aria-hidden="true"></i></i>Appointment
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @endif
</div>






                         </div>

                        

                    @endif
                     
                </div>
                
                
                

                   
                        
                     
            


           
            


                   
        </div>
   
@endsection