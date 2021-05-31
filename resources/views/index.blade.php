﻿<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>

  <meta charset="utf-8" />
  
  <meta name="viewport" content="width=device-width" />

  <title>Языковая школа LINGVO</title>
  
  <!-- Included CSS Files (Compressed) -->
  <link rel="stylesheet" href="{{asset('stylesheets/foundation.min.css')}}">
  <link rel="stylesheet" href="{{asset('stylesheets/main.css')}}">
  <link rel="stylesheet" href="{{asset('stylesheets/app.css')}}">

  <script src="{{asset('javascripts/modernizr.foundation.js')}}"></script>
  
  <link rel="stylesheet" href="{{asset('fonts/ligature.css')}}">
  
  <!-- Google fonts -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Playfair+Display:400italic' rel='stylesheet' type='text/css' />

</head>

<body>

<!-- ######################## Main Menu ######################## -->
 
<nav>

     <div class="twelve columns header_nav">
     <div class="row">
      
        <ul id="menu-header" class="nav-bar horizontal">
        
          <li><a href="/">Главная</a></li>     
          <li><a href="{{route('filter',['type' => 'active'])}}">Активны для записи</a></li>     
          <li><a href="{{route('filter',['type' => 'count'])}}">Мест нет</a></li>     
          <li><a href="{{route('filter',['type' => 'not_active'])}}">Запись прошла</a></li>     
          @if (session()->get('role') == 1)
          <li><a href="{{route('admin_page')}}">Админ панель</a></li>    
          @endif   
        </ul>
        

        
      </div>  
      </div>
      
</nav><!-- END main menu -->
        
<!-- ######################## Header (featured posts) ######################## -->
     
<header>
   

        <div class="row">
        
        <h1>Языковая школа LINGVO</h1>
        
</header>
      
<!-- ######################## Section ######################## -->

<section>

  <div class="section_main">
   
      <div class="row">
      
          <section class="eight columns">          
         @foreach ($courses as $course )
         <article class="blog_post">
          
          <div class="three columns">
          <a href="#" class="th"><img src="{{asset("images/{$course->img}")}}" alt="desc" /></a>
          </div>
          <div class="nine columns">
            <a href='{{route('getDetailCourse',['id'=>$course->id])}}'><h4>{{$course->name}}</h4></a>
           
            <p> {{$course->desc}}</p>

           </div>
          
           
       </article>
         @endforeach
          
               
                   
          </section>
          
      
         
          
      </div>
      
    </div>
      
</section>


<!-- ######################## Section ######################## -->

   <section>
   
      <div class="section_dark">
      <div class="row"> 
      
      <h2></h2>
      
          <div class="two columns">
          <img src="images/thumb1.jpg" alt="desc" />
          </div>
          
          <div class="two columns">
          <img src="images/thumb2.jpg" alt="desc" />
          </div>
          
          <div class="two columns">
          <img src="images/thumb3.jpg" alt="desc" />
          </div>
          
          <div class="two columns">
          <img src="images/thumb4.jpg" alt="desc" />
          </div>
          
          <div class="two columns">
          <img src="images/thumb5.jpg" alt="desc" />
          </div>
          
          <div class="two columns">
          <img src="images/thumb6.jpg" alt="desc" />
          </div>

      
      </div>
      </div>
      
    </section>


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