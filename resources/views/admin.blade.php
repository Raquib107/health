@extends('layouts.app')
@section('content')
<?php $x = 0;?>
<div class="gray-bg">
  <section id="blog" class="section container blog-columns blog-preview">
    <div class="row">

      <header class="sec-heading">
        <h2>Unverified Doctor list</h2>
        <span class="subheading">Confirm or Delete</span>
    </header>
    @if (count($members) > 0)

    <div class="panel-body">
        <table class="table table-striped task-table">

            <thead class="thin-border-bottom">
                <th width="100" >#</th>
                <th width="280" >Doctor Name</th>
                <th width="280" >Affiliation</th>
                <th width="200" >Reg No</th>
                <th width="3" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</th>


            </thead>
            <tbody>
                @foreach ($members as $task)
                <tr>
                    <td class="table-text"><div> <?php echo $x = $x+1; ?></div></td>
                    <td class="table-text"><div><?php $name = \DB::table('users')->select('name')->where('id', $task->user_id)->first(); echo $name->name; ?></div></td>
                    <td class="table-text"><div>{{ $task->Affiliation }}</div></td>
                    <td class="table-text"><div>{{ $task->reg_no }}</div></td>
                    <!-- Task Delete Button, doctor table er id send kori-->
                    <td>
                        <form action="{{url('admin/delete/')}}={{ $task->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                                <i class="fa fa-btn fa-trash"></i>Delete
                            </button>
                        </form>
                    </td>
                    <td>
                        <form action="{{url('admin/verify/')}}={{ $task->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-info">
                                <i class="fa fa-btn fa-trash"></i>Confirm
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
<br>

{{--service list--}}
<?php $x = 0;?>
<div class="gray-bg">
  <section id="blog" class="section container blog-columns blog-preview">
    <div class="row">

      <header class="sec-heading">
        <h2>Unverified Service list</h2>
        <span class="subheading">Confirm or Delete</span>
    </header>
    @if (count($service) > 0)

    <div class="panel-body">
        <table class="table table-striped task-table">

            <thead class="thin-border-bottom">
                <th width="100" >#</th>
                <th width="280" >Name</th>
                <th width="280" >Address</th>
                <th width="200" >Reg No</th>
                <th width="3" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</th>


            </thead>
            <tbody>
                @foreach ($service as $task)
                <tr>
                    <td class="table-text"><div> <?php echo $x = $x+1; ?></div></td>
                    <td class="table-text"><div>{{ $task->name }}</div></td>
                    <td class="table-text"><div>{{ $task->address }}</div></td>
                    <td class="table-text"><div>{{ $task->license }}</div></td>
                    <!-- Task Delete Button, doctor table er id send kori-->
                    <td>
                    <form action="{{url('admin/servicedelete/')}}={{ $task->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                                <i class="fa fa-btn fa-trash"></i>Delete
                            </button>
                        </form>
                    </td>
                    <td>
                        <form action="{{url('admin/serviceverify/')}}={{ $task->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-info">
                                <i class="fa fa-btn fa-trash"></i>Confirm
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


{{--all verified service list--}}
<?php $x = 0;?>
<div class="gray-bg">
  <section id="blog" class="section container blog-columns blog-preview">
    <div class="row">

      <header class="sec-heading">
        <h2>Verified Service list</h2>
        <span class="subheading">You can delete any data</span>
    </header>
    @if (count($services2) > 0)

    <div class="panel-body">
        <table class="table table-striped task-table">

            <thead class="thin-border-bottom">
                <th width="100" >#</th>
                <th width="280" >Name</th>
                <th width="280" >Address</th>
                <th width="200" >Reg No</th>
                <th width="3" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</th>


            </thead>
            <tbody>
                @foreach ($services2 as $task)
                <tr>
                    <td class="table-text"><div> <?php echo $x = $x+1; ?></div></td>
                    <td class="table-text"><div>{{ $task->name }}</div></td>
                    <td class="table-text"><div>{{ $task->address }}</div></td>
                    <td class="table-text"><div>{{ $task->license }}</div></td>
                    <!-- Task Delete Button, doctor table er id send kori-->
                    <td>
                    <form action="{{url('admin/servicedelete/')}}={{ $task->id }}" method="POST">
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

    @endif
</div>
</div>

<br>

<?php $x = 0;?>
<div class="gray-bg">
  <section id="blog" class="section container blog-columns blog-preview">
    <div class="row">

      <header class="sec-heading">
        <h2>Verified Doctor list</h2>
        <span class="subheading">Confirm or Delete</span>
    </header>
    @if (count($members2) > 0)

    <div class="panel-body">
        <table class="table table-striped task-table">

            <thead class="thin-border-bottom">
                <th width="100" >#</th>
                <th width="280" >Doctor Name</th>
                <th width="280" >Affiliation</th>
                <th width="200" >Reg No</th>
                <th width="3" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</th>


            </thead>
            <tbody>
                @foreach ($members2 as $task)
                <tr>
                    <td class="table-text"><div> <?php echo $x = $x+1; ?></div></td>
                    <td class="table-text"><div><?php $name = \DB::table('users')->select('name')->where('id', $task->user_id)->first(); echo $name->name; ?></div></td>
                    <td class="table-text"><div>{{ $task->Affiliation }}</div></td>
                    <td class="table-text"><div>{{ $task->reg_no }}</div></td>
                    <!-- Task Delete Button, doctor table er id send kori-->
                    <td>
                        <form action="{{url('admin/delete/')}}={{ $task->id }}" method="POST">
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

    @endif
</div>

@endsection
