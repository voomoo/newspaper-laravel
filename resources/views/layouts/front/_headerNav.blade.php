<div class="header-bottom">
    <div class="container">
        <div class="row">


            <!-- Main menu -->
            <div class="megamenu-hori header-bottom-right  col-md-12 col-sm-12 col-xs-12 ">
                <div class="responsive so-megamenu ">
                    <nav class="navbar-default">
                        <div class=" container-megamenu  horizontal">

                            <div class="navbar-header">
                                <button   id="show-megamenu" data-toggle="collapse" class="navbar-toggle">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="megamenu-wrapper">
                                <span id="remove-megamenu" class="fa fa-times"></span>
                                <div class="megamenu-pattern">
                                    <div class="container">
                                        <ul class="megamenu " data-transition="slide" data-animationtime="250">
                                            <li class="home hover">
                                                <p class="close-menu"></p>
                                                <a href="{{route('home')}}" class="clearfix menu1">Home</a>
                                            </li>


                                            <li class="with-sub-menu hover">
                                                <p class="close-menu"></p>
                                                <a href="#" class="clearfix menu1">
                                                    <strong>Categories</strong>
                                                    <span class="label"></span>

                                                </a>
                                                <div class="sub-menu" style="width: 40%; right: auto; display: none; z-index: -1;">
                                                    <div class="content" style="height: 160px; display: none;">
                                                        @foreach($categories as $category)
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <ul class="row-list text-center">
                                                                    <li><a class="subcategory_item" href="{{route('category', $category->id)}}">{{$category->name}}</a></li>
                                                                </ul>
                                                            </div>

                                                        </div>

                                                        @endforeach
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="with-sub-menu hover">
                                                <p class="close-menu"></p>
                                                <a href="{{route('about')}}" class="clearfix menu1">
                                                    <strong>About</strong>
                                                </a>

                                            </li>
                                            <li class="">
                                                <p class="close-menu"></p>
                                                <a href="{{route('contact')}}" class="clearfix menu1">
                                                    <strong>Contact</strong>
                                                </a>
                                            </li>


                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- //end Main menu -->

        </div>
    </div>

</div>
