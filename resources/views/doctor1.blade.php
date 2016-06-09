<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<html >
  <head>
    <meta charset="UTF-8">
    <title>IdentCard</title>
    <link href="https://fontastic.s3.amazonaws.com/koZpYWicqpccnhbmDcBiTG/icons.css" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/normalize.css">

    <link rel='stylesheet prefetch' href='https://cdn.jsdelivr.net/foundation/5.5.0/css/foundation.css'>

        <link rel="stylesheet" href="assets/css/style.css">

    
    
    
  </head>

  <body>

    <section class="card">
  <figure class="panel meta">
    <picture>
      <img class="avatar" src="pic06.jpg" width="128" height="128"/>
    </picture>
    <figcaption>
        
      <h1 class="name">Doctor</h1>
      <h3 class="title"><?php $name = \DB::table('users')->select('name')->where('id', $doctor->user_id)->distinct()->first(); echo $name->name; ?> </h3>
   
    </figcaption>
  </figure>
  
  <div class="panel info">
    <dl class="skillz">
      
      <dt>First Name  :  <?php $name = \DB::table('users')->select('First_name')->where('id', $doctor->user_id)->distinct()->first(); echo $name->First_name; ?></dt>
      <dt>Last Name  :  <?php $name = \DB::table('users')->select('Last_name')->where('id', $doctor->user_id)->distinct()->first(); echo $name->Last_name; ?></dt>
      <dt>Age    :  <?php $name = \DB::table('users')->select('Age')->where('id', $doctor->user_id)->distinct()->first(); echo $name->Age; ?></dt>
      <dt>EmaiL  :  <?php $name = \DB::table('users')->select('email')->where('id', $doctor->user_id)->distinct()->first(); echo $name->email; ?></dt>

    </dl>
    
    <ul class="social">
      
      
    </ul>
    
  </div>
  
</section>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>

    
    
    
  </body>
</html>
@endsection
