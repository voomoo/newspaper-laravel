
<div class="sidebar-box">
    <h1 class="heading">Popular Posts</h1>
    <div class="post-entry-sidebar">

        <ul>
            @foreach($popular_posts as $post)
                <li>
                    <a href="{{route('post.details', $post->id)}}">
                        <img src="{{asset($post->image)}}" alt="Image placeholder" class="mr-4">
                        <div class="text">
                            <h4>{{$post->title}}</h4>
                            <div class="post-meta">
                                <span class="mr-2">{{date('M d, Y', strtotime($post->published_at))}}</span>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach

        </ul>

    </div>
</div>
<!-- END sidebar-box -->

<div class="sidebar-box">
    <h1 class="heading">Categories</h1>
    <ul class="categories">
        @foreach($categories as $category)
            <li><a href="{{route('category', $category->id)}}">{{ $category->name }} <span>({{$category->post()->count()}})</span></a></li>
        @endforeach
    </ul>
</div>
<!-- END sidebar-box -->
