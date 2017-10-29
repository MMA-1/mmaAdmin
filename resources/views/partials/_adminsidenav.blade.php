<div id="left">
    <div class="media user-media well-small"><a class="user-link" href="#"> <img
                    class="media-object img-thumbnail img-responsive user-img" alt="User Picture"
                    src="{{asset('assets/img/mma64x48.png')}}"/> </a> <br/>
        <div class="media-body">
            <h5 class="media-heading"> Mazhar</h5>
            <ul class="list-unstyled user-info">
                <li><a class="btn btn-success btn-xs btn-circle"
                       style="width: 10px;height: 12px;"></a> {{Auth::check()? "Logged In":"Logged Out"}} </li>
            </ul>
        </div>
        <br/>
    </div>
    <ul id="menu" class="collapse">
        @if(Auth::check())
            <li class="panel"><a href="{{route('admin.dashboard')}}"> <i class="icon-table"></i> Dashboard </a></li>
            <li class="panel"><a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle"
                                 data-target="#idpost"> <i class="icon-columns"></i> Posts <span class="pull-right"> <i
                                class="icon-angle-left"></i> </span> &nbsp; <span class="label label-success">5</span>&nbsp;
                </a>
                <ul class="collapse" id="idpost">
                    <li class=""><a href="{{route('posts.create')}}"><i class="icon-angle-right"></i>Create Post</a>
                    </li>
                    <li class=""><a href="{{route('posts.index')}}"><i class="icon-angle-right"></i>List Post</a></li>
                </ul>
            </li>
            <li class="panel"><a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle"
                                 data-target="#idcategory"> <i class="icon-sitemap"></i> Categories <span
                            class="pull-right"> <i class="icon-angle-left"></i> </span> &nbsp; <span
                            class="label label-success">7</span>&nbsp; </a>
                <ul class="collapse" id="idcategory">
                    <li class=""><a href="{{route('categories.index')}}"><i class="icon-angle-right"></i>Categories</a>
                    </li>
                    <li class=""><a href="{{route('subcategories.index')}}"><i class="icon-angle-right"></i>Sub
                            Categories</a></li>
                    <li class=""><a href="{{route('tags.index')}}"><i class="icon-angle-right"></i>Tags</a></li>
                </ul>
            </li>
            <li class="panel"><a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle"
                                 data-target="#idgallery"> <i class="icon-film"></i> Gallery <span
                            class="pull-right"> <i class="icon-angle-left"></i> </span> &nbsp; <span
                            class="label label-success">5</span>&nbsp; </a>
                <ul class="collapse" id="idgallery">
                    <li class=""><a href="{{route('gallery.create')}}"><i class="icon-angle-right"></i>Create Photo
                            Gallery</a></li>
                    <li class=""><a href="{{route('gallery.index')}}"><i class="icon-angle-right"></i>List Photo Gallery</a>
                    </li>
                </ul>
            </li>
            <li><a href="{{route('message.index')}}"><i class="icon-envelope-alt"></i> Messages</a></li>
            <li class="panel"><a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#idmediamasters"> <i class="icon-th-large"></i> Media Type Master <span class="pull-right"> <i class="icon-angle-left"></i> </span></a>
                <ul class="collapse" id="idmediamasters">
                    <li class=""><a href="{{route('mediatypes.create')}}"><i class="icon-angle-right"></i>Create Media Type</a></li>
                    </li>
                </ul>
            </li>
            <li class="panel"><a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#idartistmasters"> <i class="icon-user"></i> Artist Master <span class="pull-right"> <i class="icon-angle-left"></i> </span></a>
                <ul class="collapse" id="idartistmasters">
                    <li class=""><a href="{{route('artists.index')}}"><i class="icon-angle-right"></i>List Artist</a>
                    </li>
                    <li class=""><a href="{{route('artists.create')}}"><i class="icon-angle-right"></i>Create Artist</a>
                    </li>
                </ul>
            </li>
            <li class="panel"><a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#idalbummasters"> <i class="icon-book"></i> Album Master <span class="pull-right"> <i class="icon-angle-left"></i> </span></a>
                <ul class="collapse" id="idalbummasters">
                    <li class=""><a href="{{route('albums.index')}}"><i class="icon-angle-right"></i>List Album</a>
                    </li>
                    <li class=""><a href="{{route('albums.create')}}"><i class="icon-angle-right"></i>Create Album</a>
                    </li>
                </ul>
            </li>
            <li class="panel"><a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#idmedia"> <i class="icon-play-circle"></i> Media <span class="pull-right"> <i class="icon-angle-left"></i> </span></a>
                <ul class="collapse" id="idmedia">
                    <li class=""><a href="{{route('media.index')}}"><i class="icon-angle-right"></i>List Media</a>
                    </li>
                    <li class=""><a href="{{route('media.create')}}"><i class="icon-angle-right"></i>Create Media</a>
                    </li>
                </ul>
            </li>
            <li class="panel"><a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#idfateha"> <i class="icon-book"></i> Fateha & News <span class="pull-right"> <i class="icon-angle-left"></i> </span></a>
                <ul class="collapse" id="idfateha">
                    <li class=""><a href="{{route('fateha.index')}}"><i class="icon-angle-right"></i>List Fateha & News</a>
                    </li>
                    <li class=""><a href="{{route('fateha.create')}}"><i class="icon-angle-right"></i>Create Fateha & News</a>
                    </li>
                </ul>
            </li>
            <li><a href="{{route('logout')}}">Logout</a></li>
        @else
            <a href="{{route('login')}}" class="btn btn-success pull-right">Login</a></li>
        @endif
    </ul>
</div>
