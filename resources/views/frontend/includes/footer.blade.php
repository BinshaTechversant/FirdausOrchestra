@php   
  $footer_menus = DB::table('menus')->where('group_name','Footer')->where('status',1)->whereNull('deleted_at')->get();
  $social_icons = DB::table('menus')->where('group_name','Social')->where('status',1)->whereNull('deleted_at')->get();       
  $connect_menus = DB::table('menus')->where('group_name','Connect')->where('status',1)->whereNull('deleted_at')->get(); 
  $expo_menus = DB::table('menus')->where('group_name','Expo')->where('status',1)->whereNull('deleted_at')->get(); 
  $footerData = DB::table('generals')->where('status',1)->first();
  $footerLogo = $footerData->footer_logo ?? '#';
  $footerContent = $footerData->footer_content ?? '';
  $copyRight = $footerData->copyright ?? '';
@endphp
<section class="footer">
<button
        type="button"
        class="btn btn-floating btn-lg"
        id="btn-back-to-top"
        >
  <i class="fa fa-arrow-up btm-top-arrow"></i>
</button>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 " style="padding-left:6%;">          
           <a href="/"> <img src="{{ $footerLogo }}" class="img-fluid footer-logo" ></a>          
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <ol class="fir-connect">          
            <ul class="fir-connect-hd"> Box Office & Customer Service</ul>           
              <ul>{!! htmlspecialchars_decode($footerContent) !!}            
            </ul>             
          </ol>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-6" >
          <ol class="fir-connect legal-ol" >
            <ul class="fir-connect-hd">Legals</ul>
            @foreach($footer_menus as $menu)
              <ul><a href="{{$menu->url}}" class="no-style-link @if($menu->name == 'Careers') fir-connect-hd @endif">{{ $menu->name }}</a></ul>
            @endforeach
          </ol>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6" style="padding-left:3%;">
          <ol class="fir-connect">
            <ul class="fir-connect-hd">More From Expo City Dubai</ul>            
            @foreach($expo_menus as $menu)
              <ul><a href="{{$menu->url}}" class="no-style-link" target="_blank">{{ $menu->name }}</a></ul>
            @endforeach         
          </ol>
        </div>
      </div>
      <!---<marquee behavior="slide" direction="left">-->
        <div class="row mt-footer">
          @foreach($social_icons as $icons)
            <div class="col d-flex justify-content-center mt-2">
              <img src="{{ $icons->featured_image}}" class="h-8">
            </div>
          @endforeach        
        </div>
      <!---</marquee> --->
      <hr>
      <div class="row copyright-footer" style="padding-bottom:1rem;">
        <div class="col-md-7 d-flex align-items-center" style="padding-left:6%;">
          {{$copyRight}}          
        </div>        
        <!---<div class="col-md-5 col-md-5 px-5 d-flex align-items-center justify-content-end"> --->
        <div class="col-md-5 d-flex footer-icon-pos align-items-center justify-content-center" style="padding-right:3%;">
          <ul class="list-inline footer-ul-margin" >
            @foreach($connect_menus as $menu)
              <li class="list-inline-item footer-li-margin"><a href="{{$menu->url}}"  class="no-style-link"><img src="{{ $menu->featured_image }}" class="footer-icons"></a></li>
            @endforeach            
          </ul>
        </div>
      </div>
    </div>
    </div>
  </section>