<style type="text/css">
.members{
  padding-top: 3%; 
  padding-bottom: 3%; 
  padding-left: 2%; 
  padding-right: 2%
}

.member{
  background-color: #ccffff; 
  -webkit-box-shadow: 0 8px 6px -6px #595959;
  -moz-box-shadow: 0 8px 6px -6px #595959;
  box-shadow: 0 8px 6px -6px #595959;    
}

.member:hover {
  background-color: #b3ffff;
  -webkit-box-shadow: 0 0 10px #595959; 
  -moz-box-shadow:  0 0 10px #595959; 
  box-shadow:  0 0 10px #595959; 
}

</style>

<section class="members" id="members">
  <div class="row">
    @foreach($members as $member)
    <div class="col-xl-3 col-sm-6 mb-3">
      <div class="card text-white o-hidden member">
        <div class="card-head">
          
        </div>
        <div class="card-body-icon" style="font-family:cursive;">
          <div class="card-body" align="center">
            <img class="mem_pic img-fluid" src="image/member/{{$member->image_name}}.jpg" style="
              height:150px; width:150px; 
              border-radius:50%; 
              border:6px solid #66ccff; 
              -webkit-box-shadow: inset 3px 3px 4px #000; 
              -moz-box-shadow: inset 3px 3px 4px #000; 
              box-shadow: inset 3px 3px 4px #000;">
            <hr>
            <span class="float-center">
              <p align="center" style="font-size: 15px; color: #4d2600">{{$member->name}}</p>
            </span>
            <span class="float-center">
              <p align="center" style="font-size: 13px; color: #4d2600">{{$member->email}}</p>
            </span>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</section>