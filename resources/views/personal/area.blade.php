<!DOCTYPE html>
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
          <li><a href="">Английский</a></li>
          <li><a href="">Французский</a></li>
          <li><a href="">Немецкий</a></li>
          <li><a href="">Китайский</a></li>      
        </ul>
        

        
      </div>  
      </div>
      
</nav><!-- END main menu -->
        
<!-- ######################## Header (featured posts) ######################## -->
     
<header>
   

        <div class="row">
        
        <h1>Языковая школа LINGVO</h1>
        <article class="blog_post">
             
          <div class="three columns">
          <a href="#" class="th"><img src="{{asset("images/{$LoggedUserInfo->avatar}")}}" alt="desc" /></a>
          </div>
          <div class="nine columns">
          <h4>{{$LoggedUserInfo->FIO}}</h4>
           
           
          
            <div><a href="{{route('logout')}}">Выйти из профиля</a></div>
              
           

           </div>
          
           
       </article>
        
</header>
      
<!-- ######################## Section ######################## -->

<section>

  <div class="section_main">
   
      <div class="row">
      
          <section class="eight columns">          
         
           
            {{-- {{$LoggedUserInfo->email}} --}}
        
            @foreach ($courses as $course)
            <article class="blog_post">
             
             <div class="three columns">
             <a href="#" class="th"><img src="{{asset("images/{$course->img}")}}" alt="desc" /></a>
             </div>
             <div class="nine columns">
               <h4>{{$course->name}}</h4>
              
               <p> {{$course->desc}}</p>
               @if ($course ->unRecording == true)
               <div > <a href="{{route('unrecordingrourse',['id' => $course->id])}}" >Отписаться от курса</a></div>
                 
               @endif
               {{$course->date_of_start}}
               {{$time}}
   
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