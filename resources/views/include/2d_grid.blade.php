<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style type="text/css">
  .twod_grid{
    padding-top: 100px; 
  }
  .card{
  	background: #ff9900;
	-webkit-filter: grayscale(0%));
	filter: grayscale(0%);
	 -webkit-box-shadow: 0 0 10px #595959; 
	  -moz-box-shadow:  0 0 10px #595959; 
	  box-shadow:  0 0 10px #595959; 
  }

  .list-group-item{
  	background: #ff9900;
  	text-align: center;
  }

  .list-group-item:hover{
  	background: #996633;
  	-webkit-filter: grayscale(0%);
	filter: grayscale(0%);
	-webkit-box-shadow: 0 0 10px #8c8c8c; 
	-moz-box-shadow:  0 0 10px #8c8c8c; 
	box-shadow:  0 0 10px #8c8c8c;
  }

  .btn{
  	background: #996633;
  	font-family: 'times';
  	color: black;
  }

  p{
  	font-family: 'times';
  	color: #ff9900;
  }

  h5{
  	color: #ff9900;
  }

  hr{
  	color: #ff9900;
  }
  
</style>

<section class="twod_grid fixed">
  	<div class="container">
    	<div class="row">
      		<div class="col-6 col-sm-4" id="tour_list">
        		<div class="card" >
		  			<div class="card-body">
		    			<h5 class="card-title"></h5>
	    				<ul class="list-group">
	    					@foreach ($areas as $area)
	    						@php 
	    							$stack = []; 
	    							$i=0;

	    						@endphp

								<li class="list-group-item" id="country" onclick="change('{{$area->text}}', '{{$area->id}}','{{$area->name}}')">
									{{$area->name}}
								</li>
							@endforeach
						</ul>
		  			</div>
				</div>
      		</div>

      		<div class="col-6 col-sm-8"  id="tour_des">
        		<div class="card" >
        			<div class="card-title " id="tour_title">
		  				<button type="button" class="btn btn-dark float-right" data-toggle="modal" data-target="#exampleModalLong"  id="gallery">Gallery</button>
		  			</div>

		  			<div class="card-body" id="tour_des_body" style="font-family: times; background-color: white; opacity: .8; ">	
		  			</div>
				</div>
      		</div>
    	</div>

    	<div class="modal fade " id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		  	<div class="modal-dialog" role="document">
		    	<div class="modal-content" style="background: rgba(200, 54, 54, 0.0);">
		      		<div class="modal-header">
		        		<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
		        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #996633">&times;</span>
		        		</button>
		      		</div>
		      		<div class="modal-body" id="modal-body">
		        
		      		</div>
		      		<div class="modal-footer">
		        		<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
		      		</div>
		    	</div>
		  	</div>
		</div>
  	</div>
</section>


<script>

	function change(text,id,name){
		var x = document.getElementById("country");
		document.getElementById("tour_des_body").innerHTML = text;
		var modalBody = document.getElementById("modal-body");
		var exampleModalLongTitle = document.getElementById("exampleModalLongTitle");
		exampleModalLongTitle.innerHTML = name;
		$.ajax({
 
					type:"GET",
					url:"/des/"+id,
					success: function(datas) {
						var i;
						var string='';
						var l='Like';
						for (i = 0; i < datas.photos.length; i++) { 
							var j;
							@if(Auth::check())
								for(j=0; j < datas.like_photos[i].length; j++ ){
									if(datas.like_photos[i][j].user_id == {{Auth::user()->id}}){
										l='Liked';
									}
								}
							@endif
							
							
							 string+= '@guest<div class="col-md-12"><img src="/uploads/images/'+datas.photos[i].photo_name+'.jpg" class="rounded img-fluid" onclick="imageZoom(this);"><p>'+datas.photos[i].photo_cap+'</p></div>@else<div class="col-md-12"><img src="/uploads/images/'+datas.photos[i].photo_name+'.jpg" class="rounded img-fluid" onclick="imageZoom(this);"><p>'+datas.photos[i].photo_cap+'<button type="button" class="btn btn-dark" style="float:right;" id="'+datas.photos[i].id+'" name="'+datas.photos[i].id+'" onclick="like({{ Auth::user()->id }},'+datas.photos[i].id+')">'+l+'</button></p></div>@endguest';
							}

						modalBody.innerHTML = string;

					}
				})

	}
</script>

<script type="text/javascript">
	function like(user_id, image_id){ 

		console.log(image_id);
		console.log(user_id);
		$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '<?= csrf_token() ?>'
                }
            });

            $.ajax({
                url: '/like/',
                data: {'image_id': image_id, 'user_id': user_id},
                type: 'POST',
                datatype: 'JSON',
                success: function (response) {
    				if(response == "sorry"){
    					alert("You Alredy Liked It");

    					
    				}else{
    					document.getElementById(image_id).innerHTML = "Liked";			
    				}
                },
                error: function (response) {
                    console.log(response);
                }
            });

	}
	
</script>

<script>
	function imageZoom(imgs) {
    	window.open(imgs.src);
	}
</script>

<script>
	function myFunction() {
	    var x = document.getElementById("tour_list");
	    var y = document.getElementById("tour_des");
	    if (x.style.display === "none") {
	        x.style.display = "block";
	        y.className = "col-sm-8";
	    } else {
	        x.style.display = "none";
	        y.className = "col-sm-12";
	    }
	}
</script>