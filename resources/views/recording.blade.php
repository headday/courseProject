<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Языковая школа LINGVO</title>
  
  <!-- Included CSS Files (Uncompressed) -->
  <!--
  <link rel="stylesheet" href="stylesheets/foundation.css">
  -->
  
  <!-- Included CSS Files (Compressed) -->
  <link rel="stylesheet" href="{{asset('stylesheets/foundation.min.css')}}">
  <link rel="stylesheet" href="{{asset('stylesheets/main.css')}}">
  <link rel="stylesheet" href="{{asset('stylesheets/app.css')}}">

  <script src="{{asset('javascripts/modernizr.foundation.js')}}"></script>
  
  <link rel="stylesheet" href="{{asset('fonts/ligature.css')}}">
  
  <!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Playfair+Display:400italic' rel='stylesheet' type='text/css' />

  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>

<body>

<!-- ######################## Main Menu ######################## -->
 
<nav>

     <div class="twelve columns header_nav">
     <div class="row">
      
           <ul id="menu-header" class="nav-bar horizontal">
        
          <li><a href="index.html">Главная</a></li>     
          <li><a href="">Английский</a></li>
          <li><a href="">Французский</a></li>
          <li><a href="">Немецкий</a></li>
          <li><a href="">Китайский</a></li>      
        </ul>       

        
      </div>  
      </div>
      
</nav><!-- END main menu -->
        
<!-- ######################## Header ######################## -->
     
    <header>
       
            <div class="row">
               <h4> </h4>
              <article>
                      
                      <div class="twelve columns">
                          <h1>{{$course ->name}}</h1>
                                <p class="excerpt">
                              Начало курса: <b>{{$course ->date_of_start}}</b>.
                                </p>    
            <p class="excerpt">
                              Количество мест: <b>{{$course ->count}}</b>.
                                </p>    
                      </div>
                      
              </article>
    
    
            </div>
            @foreach ($users as $user)
            <article class="blog_post">
             

             <div class="nine columns">
               {{-- <a href='{{route('getDetailCourse',['id'=>$course->id])}}'><h4>{{$course->name}}</h4></a>
              
               <p> {{$course->desc}}</p>
               @if ($course ->unRecording == true)
               <div > <a href="{{route('recordingCourse',['id' => $course->id])}}" >Отписаться от курса</a></div>
                 
               @endif
               {{$course->date_of_start}}
               {{$time}} --}}
               {{$user->FIO}}
               <div > <a href="{{route('unrecording_with_user',['course_id' => $user->course_id,'user_id'=>$user->user_id])}}" >Отписать от курса</a></div>
   
              </div>
             
              
          </article>
            @endforeach
            
    </header>
      
<!-- ######################## Section ######################## -->

<section class="section_light">

      


      
      

<!-- ######################## Footer ######################## -->  
      
<footer>

      <div class="row">
      
          <div class="twelve columns footer">
              <a href="" class="lsf-icon" style="font-size:16px; margin-right:15px" title="twitter">Twitter</a> 
              <a href="" class="lsf-icon" style="font-size:16px; margin-right:15px" title="facebook">Facebook</a>
              <a href="" class="lsf-icon" style="font-size:16px; margin-right:15px" title="pinterest">Pinterest</a>
              <a href="" class="lsf-icon" style="font-size:16px" title="instagram">Instagram</a>
          </div>
          
      </div>

</footer>		  

<!-- ######################## Scripts ######################## --> 

    <!-- Included JS Files (Compressed) -->
    <script src="{{asset('javascripts/foundation.min.js')}}" type="text/javascript"></script> 
    <!-- Initialize JS Plugins -->
     <script src="{{asset('javascripts/app.js')}}" type="text/javascript"></script>
</body>
</html>