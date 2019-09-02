<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>My Movies DataBase</title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
		<script src="js/bootstrap.js"></script>	
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
		<script type="text/javascript">
		
		var mtitle,mdesc,myear,mgenre,mrating;
		
        $(document).ready(function(){
		
	    $('#exampleModalCenter').on('show.bs.modal', function(e) {
      
	    $('#exampleModalLongTitle').text(mtitle);
		$('#exampleModalLongTitle2').text('Year: '+myear);
		$('#exampleModalLongTitle3').text('Genre: '+mgenre);
		$('#exampleModalLongTitle4').text('Rate: '+mrating);
		$('#modalText').text(mdesc);
		$('#tlink').attr("href", "https://www.youtube.com/results?search_query="+escape(mtitle+' Trailer'));
	  
         });
		 
		});
		
		function SetModVars(title,desc,year,genre,rating)
		{
		 mtitle=title;
		 if (desc) mdesc=desc; else mdesc='No description';
		 myear=year;
		 mgenre=genre;
		 mrating=rating;
		}
		
		</script>
		
    </head>
    <body id="page-top" class="index">
    
 <!-- Services Section -->
<section id="services">
    <div class="container">
	

 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">MyMoviesDb</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/fill">Fill</a>
      </li>
	     <li class="nav-item">
        <a class="nav-link" href="/clear">Clear</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  <dl>
       <dt> <p class="text-success"  id="exampleModalLongTitle"></p></dt>
		<p class="text-info"     id="exampleModalLongTitle2"></p>
		<p class="text-primary"  id="exampleModalLongTitle3"></p>
		<p class="text-danger"   id="exampleModalLongTitle4"></p>
	   </dl>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modalText">
       
	  
      </div>
	  <div class="modal-body"><a id="tlink" href="#" target="_blank">Try to find Trailer</a></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


	
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">{{$data}}</h2>
            </div>
        </div>
        <div class="row text-center">
		  @foreach($allmovies as $m)
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fa fa-circle fa-stack-2x text-primary"></i>
                    <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="service-heading">{!! $m->title !!}:{!! $m->year !!}</h4>
                <p class="text-muted">
				<button onclick="javascript:SetModVars('{!! $m->title !!}','{!! trim(strip_tags($m->plotoutline)) !!}','{!! $m->year !!}','{!! $m->genre !!}','{!! $m->rating !!}');"  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
				@if ($m->photoThumb)
				<img src="{!! $m->photoThumb !!}" /></button></p>
			    @else
			    <img src="/empty.jpg" />
			    </button></p>
				@endif
            </div>
		  @endforeach	
        </div>
    </div>
</section>
   
        
    
    </body>
</html>