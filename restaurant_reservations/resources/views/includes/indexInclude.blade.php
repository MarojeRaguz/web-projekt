<style> 
   @import url(https://fonts.googleapis.com/css2?family=Beau+Rivage&display=swap); 
</style>

<link href="{{ asset('css/indexInclude.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Beau+Rivage&display=swap" rel="stylesheet">

<script src="{{ asset('js/index.js') }}" defer></script>

@for($i=0; $i<sizeof($restaurants);$i++)
   @if ($i%2==0)
      <div class="row">

         <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12" onclick="openMenu({{ $restaurants[$i]->id }})">
            <div class="hovereffect">
                  <img class="img-responsive" src={{ $restaurants[$i]->imagePath }} alt="">
                        <div class="overlay">
                           <h2 id="top-title">{{ $restaurants[$i]->name }}</h2>                  
                        </div>
            </div>
         </div> 
   @else
      <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12" onclick="openMenu({{ $restaurants[$i]->id }})">
         <div class="hovereffect">
               <img class="img-responsive" src={{ $restaurants[$i]->imagePath }} alt="">
                     <div class="overlay">
                        <h2 id="top-title">{{ $restaurants[$i]->name }}</h2>                  
                     </div>
         </div>
      </div> 
      </div>
   <br>   
   @endif
@endfor
  
   
   

