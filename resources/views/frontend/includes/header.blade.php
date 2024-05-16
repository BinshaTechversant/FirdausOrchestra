@php 
    $header = DB::table('generals')->where('status',1)->first();
    if($header){
        $headerLogo = $header->header_logo;
        $buyTickets = $header->buy_tickets ?? 0;
        $signIn = $header->sign_in ?? 0;
        $search = $header->search ?? 0;
    }else{
        $headerLogo ="#";
        $buyTickets = 0;
        $signIn = 0;
        $search = 0;
    }
@endphp
    <nav class="navbar navbar-expand-sm fir-nav nav-tops">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{$headerLogo}}" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <div class="me-auto"></div>
                <ul class="navbar-nav d-flex">
                @if($buyTickets == 1)
                <li class="nav-item">
                    <a class="nav-link pe-4" href="#">
                    <img src="/img/nav1.png" class="img-fluid me-1 ">Buy Tickets
                    </a>
                </li>
                @endif
                @if($signIn == 1)
                <li class="nav-item">
                    <a class="nav-link pe-4" href="#">
                    <img src="/img/nav2.png" class="img-fluid me-1">Sign in
                    </a>
                </li>
                @endif
                @if($search == 1)
                <li class="nav-item">
                    <a class="nav-link pe-4" href="#">
                    <img src="/img/nav3.png" class="img-fluid me-1">Search
                    </a>
                </li>
                @endif
                </ul>
            </div>
        </div>
    </nav>
 
<?php
$header_menus = DB::table('menus')->where('group_name', 'Header')->where('is_featured', 1)->where('status',1)->whereNull('deleted_at')->orderBy('menu_order')->get();   
$subMenus = DB::table('menus')->where('group_name', 'SubMenu')->where('status',1)->whereNull('deleted_at')->orderBy('menu_order')->get();
$menuHierarchy = [];

// Combine menus from both groups
$allMenus = array_merge($header_menus->toArray(), $subMenus->toArray());

foreach ($allMenus as $menuItem) {
    if ($menuItem->parent_menu === null) {
        $menuHierarchy[$menuItem->id] = [];
        $menuHierarchy[$menuItem->id]['name'] = $menuItem->name;
        $menuHierarchy[$menuItem->id]['children'] = []; // Initialize the 'children' array
        //$menuHierarchy[$menuItem->id]['url'] = $menuItem->url;
    } else {
        if (isset($menuHierarchy[$menuItem->parent_menu])) {
            $menuHierarchy[$menuItem->parent_menu]['children'][] = $menuItem;
        }
    }
}
?>

<nav class="navbar navbar-expand-sm justify-content-center btm-nav shift nav-tops">
    <div class="collapse navbar-collapse justify-content-center" id="mynavbar">
        <ul class="navbar-nav list-inline">
            @foreach ($header_menus as $menuItem)
                @if (isset($menuHierarchy[$menuItem->id]))
                    @if (count($menuHierarchy[$menuItem->id]['children']) == 0)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ $menuItem->url }}" id="{{ strtolower(str_replace(' ', '-', $menuItem->name)) }}">{{ $menuItem->name }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" id="{{ strtolower(str_replace(' ', '-', $menuItem->name)) }}">{{ $menuItem->name }} <i class="fa fa-sort-down menu-icon"></i></a>
                            <ul class="dropdown-menu header_dropdown">
                                @foreach ($menuHierarchy[$menuItem->id]['children'] as $child)
                                    <li><a class="dropdown-item" href="{{ $child->url }}">{{ $child->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endif
            @endforeach
        </ul>
    </div>
</nav>
<section class="containr container-fluid p-0 m-0 sub-nav-css" id="sub-menu" style="overflow: hidden;">
    @foreach($subMenus as $menu)
        <div class="section" style="background-image: url('{{ $menu->featured_image }}');">           
            <div class="cont_title">
                <a href="{{$menu->url}}" class="text-decoration-none text-white"> 
                    <h1>{{ strtoupper($menu->name) }}</h1>
                    <h3 class="text-decoration-none text-white">{{ strtoupper($menu->bottom_string) }}</h3>
                    <h3><i class="fa fa-arrow-right arrow-white" aria-hidden="true"></i></h3>
                </a>
            </div>        
        </div>
    @endforeach    
  </section>
