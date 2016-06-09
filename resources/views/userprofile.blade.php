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
        
      <h1 class="name">User</h1>
      <h3 class="title"><?php echo $user->name; ?> </h3>
   
    </figcaption>
  </figure>
  
  <div class="panel info">
    <dl class="skillz">
      
      <dt>First Name  :  <?php echo $user->First_name; ?></dt>
      <dt>Last Name  :  <?php echo $user->Last_name; ?></dt>
      <dt>Age    :  <?php echo $user->Age; ?></dt>
      <dt>EmaiL  :  <?php echo $user->email; ?></dt>

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
