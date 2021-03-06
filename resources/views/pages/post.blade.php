@extends('layouts.app')

@section('content')
    <script  src="{{ URL::asset('js/toaster.js') }}" defer></script>
    <script  src="{{ URL::asset('js/post_comments/comments_aux.js') }}" defer></script>
    <script  src="{{ URL::asset('js/delete_confirm.js') }}" defer></script>
    <script  src="{{ URL::asset('js/save_post.js') }}" defer></script>
    <script  src="{{ URL::asset('js/report_content.js') }}" defer></script>
    <script  src="{{ URL::asset('js/post_comments/add_thread.js') }}" defer></script>
    <script  src="{{ URL::asset('js/post_comments/add_comment.js') }}" defer></script>
    <script  src="{{ URL::asset('js/post_comments/delete_comment.js') }}" defer></script>
    <script  src="{{ URL::asset('js/post_comments/edit_comment.js') }}" defer></script>
    <script  src="{{ URL::asset('js/post_comments/show_threads.js') }}" defer></script>
    <script  src="{{ URL::asset('js/post_comments/load_more.js') }}" defer></script>
    <script  src="{{ URL::asset('js/post_comments/follow_tag.js') }}" defer></script>
    <script  src="{{ URL::asset('js/votePost.js') }}" defer></script>
    <script  src="{{ URL::asset('js/voteComment.js') }}" defer></script>
    <div class="container post">
        <p hidden id="post_ID">{{$post->id}}</p>
        <p hidden id="user_ID">{{$user_id}}</p>
        <div class="row" style="margin-top: 7em; margin-bottom: 7em;">
            <div class="card post-page-post-card justify-content-center pb-5" style="border-radius:5px;">

                @auth
                    @if($isOwner)
                        <div class="my-post-page-settings btn-group dropdown" data-toggle="tooltip" data-placement="right" title="Actions">
                            <a class="btn fa-cog-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-cog" style="font-size:3em;"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ url("editpost/".$post->id) }}">Edit Post</a>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <a class="dropdown-item" data-bs-toggle="modal"
                                   data-bs-target="#confirm">Delete Post</a>
                            </ul>
                        </div>
                    @else
                        <div class="post-page-save-post-bookmark savePost">
                            <span class="save_post_id" hidden>{{$post->id}}</span>
                            <i class="bi {{$metadata['isSaved']?"bi-bookmark-check-fill":"bi-bookmark-plus-fill"}}"
                               title="Save/unsave post" style="font-size:3em; cursor:pointer;"></i>
                        </div>
                    @endif
                @endauth

                <div class="container-fluid d-flex justify-content-center">
                    <div class="mt-2 col-10 justify-content-center d-flex">
                        <div class="row thumbnail-image">
                            <img src="{{route('retrieve_post_image', ['id'=>$post->id])}}"
                                 class="justify-content-center" alt="Post thumbnail" >
                        </div>
                    </div>
                </div>

                <div class="container-fluid d-flex col-10 justify-content-left mt-3">
                    <h1 class="post-page-post-title">{{$post->is_spoiler?"[SPOILER]":""}}{{$post->title}}</h1>
                </div>

                <div class=" container-fluid row px-0 justify-content-center">
                    <div class="container-fluid d-flex px-0 mt-1 px-2 col-5">
                        <span class="post-page-post-author-date">by <a
                                href="{{route('profile',['id'=>$metadata['author']->id])}}">{{$metadata['author']->name}}</a>, {{$metadata['date']}}
                        </span>
                    </div>

                    <div class="container-fluid d-flex col-2 mt-1">
                        <div class="pe-3">
                            <h3 class="post-page-post-interactions" data-toggle="tooltip" data-placement="bottom" title="Views">{{$metadata['views']}} <i class="far fa-eye"></i>
                            </h3>
                        </div>
                        <div class="pe-3">
                            <h3 class="post-page-post-interactions" data-toggle="tooltip" data-placement="bottom" title="Likes"><span class="up">{{$metadata['likes']}}</span> <i
                                    class="far fa-thumbs-up"></i></h3>
                        </div>
                        <div class="pe-3">
                            <h3 class="post-page-post-interactions" data-toggle="tooltip" data-placement="bottom" title="Dislikes"><span class="down">{{$metadata['dislikes']}}</span>
                                <i class="far fa-thumbs-down"></i></h3>
                        </div>
                        <div class="pe-3">
                            <h3 class="post-page-post-interactions"
                                id="post_comment_count" data-toggle="tooltip" data-placement="bottom" title="Comments">{{$metadata['comment_count']}} <i class="far fa-comments"></i>
                            </h3>
                        </div>
                    </div>

                </div>

                <div class="container-fluid col-10 justify-content-left mt-2">
                    <p class="post-page-post-text">{!!  $post['content'] !!}
                    </p>
                </div>

                <div class="row justify-content-center mt-3 mb-3 px-4 mx-1">
                    <div class="col-10">
                        <div class="row justify-content-start align-items-center">
                            <h2 class="col-auto post-page-post-tags-indicator m-0 p-0">Type: </h2>
                            <div class="col-auto px-2 m-1">
                                <a style="color:#0C1D1C;font-weight:400;"
                                   href="{{route("homepage")."/search/filters?peopleFollow=false&tagFollow=false&myPosts=false&" . "type=" . rawurlencode(ucfirst($post->type))}}" data-toggle="tooltip" data-placement="bottom" title="Search post by type"><b>{{ucfirst($post->type)}}</b></a>

                            </div>

                            <h2 class="col-auto post-page-post-tags-indicator m-0 p-0">Category: </h2>
                            <div class="col-auto  px-2 m-1">
                                <a style="color:#0C1D1C;font-weight:400;"
                                   href="{{route("homepage")."/search/filters?peopleFollow=false&tagFollow=false&myPosts=false&" . "category=" . rawurlencode(ucfirst($post->category))}}" data-toggle="tooltip" data-placement="bottom" title="Search post by category"><b>{{ucfirst($post->category)}}</b></a>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center mt-3 mb-3 px-4 mx-1">
                    <div class="col-10">
                        <div class="row justify-content-start align-items-center">
                            <h2 class="col-auto post-page-post-tags-indicator m-0 p-0">Tags: </h2>
                            @foreach($metadata['tags'] as $tag)
                                <div class="col-auto post-page-tag-container px-2 m-1">
                                    <span hidden class="tag_id">{{$tag->id}}</span>
                                    <a class="post-page-post-tag"
                                       href="{{route("homepage")."/search/filters?peopleFollow=false&tagFollow=false&myPosts=false&" . "search=" . rawurlencode($tag->name)}}" data-toggle="tooltip" data-placement="bottom" title="Search post by tag">{{$tag->name}}</a>
                                    @auth
                                        <i class="{{$tag->isSaved?"fas":"far"}} fa-star follow_tag_icon"
                                           style="cursor:pointer;"
                                           title="{{$tag->isSaved?"Unfollow tag":"Follow Tag"}}"></i>
                                    @endauth
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                @if(!$isOwner) {{-- User is not the owner of the post --}}
                <div class="row justify-content-center mt-3 px-4 mx-1">
                    <div class="col-10 mx-0 px-0">
                        <div class="row justify-content-start align-items-center px-0 mx-0">
                            @auth
                                @if($metadata['liked'] == 2)
                                    <div class="col-auto px-0 mx-0">
                                        <button
                                            class="post-page-post-thumbs-up-button  btn ms-0 me-4 px-0 post-up-vote"><i
                                                title="Liked post" class="fas fa-thumbs-up"></i></button>
                                    </div>
                                @else
                                    <div class="col-auto px-0 mx-0">
                                        <button class="post-page-post-thumbs-up-button btn ms-0 me-4 px-0 post-up-vote">
                                            <i title="Like post" class="far fa-thumbs-up"></i></button>
                                    </div>
                                @endif
                                @if($metadata['liked'] == 1)
                                    <div class="col-auto px-0 mx-0">
                                        <button
                                            class="post-page-post-thumbs-down-button btn ms-0 me-4 px-0 post-down-vote">
                                            <i title="Disliked post" class="fas fa-thumbs-down m-0"></i></button>
                                    </div>
                                @else
                                    <div class="col-auto px-0 mx-0">
                                        <button
                                            class="post-page-post-thumbs-down-button btn ms-0 me-4 px-0 post-down-vote">
                                            <i title="Dislike post" class="far fa-thumbs-down m-0"></i></button>
                                    </div>
                                @endif
                                @if(!$post->reported)
                                    <div class="col-auto px-0 mx-0 ms-auto">
                                        <span hidden class="content_id post_content">{{$post->id}}</span>
                                        <button
                                            class="post-page-post-report-button btn ms-0 me-0 py-0 px-0 report_action report_post_button"
                                            data-bs-toggle="modal" data-bs-target="#report"><i title="Report post"
                                                                                               class="far fa-flag m-0 report_post_icon"></i>
                                        </button>
                                    </div>
                                @else
                                    <div class="col-auto px-0 mx-0 ms-auto">
                                        <span hidden class="content_id post_content">{{$post->id}}</span>
                                        <button
                                            class="post-page-post-report-button btn ms-0 me-0 py-0 px-0 reported report_action report_post_button"
                                            ><i title="Reported post"
                                                                                               class="fas fa-flag m-0 report_post_icon" style="color:darkred;"></i>
                                        </button>
                                    </div>
                                @endif
                            @endauth
                            @guest
                            @endguest
                        </div>

                    </div>
                </div>
                @endif


                <div class="row justify-content-center mt-5 px-4 mx-1">
                    <div class="col-10 post-comment-indicator">
                        <div class="row justify-content-between align-items-center comment-indicator-row mb-3">
                            <div class="col-auto m-0 p-0">
                                <h3 class="mt-0 py-0 mb-1">Comments</h3>
                            </div>
                        </div>
                    </div>
                </div>
                @auth
                    @if(!$isOwner) {{-- User is not the owner of the post --}}
                    <div class="row justify-content-center px-4 mx-1">
                        <div class="col-10 mx-0 px-0" style="border-radius:5px;">

                        <form>
                            <div class="row m-0 p-0">

                                <div class="d-flex mx-0 px-0">
                                    <label hidden for="add-comment">Enter a comment:</label>
                                    <textarea class="container form-control post-page-add-comment w-100 add-comment"
                                              id="add-comment" rows="2" placeholder="Join the discussion"></textarea>
                                </div>
                            </div>
                            <div class="row px-0 mx-0 justify-content-end">
                                <div class="col-auto px-0">
                                    <button id="add_comment_button" class="post-page-comment-button btn mt-1 mb-2" data-toggle="tooltip" data-placement="bottom" title="Add comment">
                                        Comment
                                    </button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    @endif
                @endauth
                <div id="comment-section">
            @if(count($metadata['comments']) > 0)
                        @include("partials.comments",["comments"=>$metadata['comments']])
                    @else
                        <div class="container-fluid d-flex col-10 justify-content-center mt-3">
                    <p><b id="empty-comments">
                    @if($user_id!=$post->id)
                    There are no comments in this post. Be the first to leave your thoughts!
                    @else
                    There are no comments in your post.
                    @endif
                    </b></p>
                </div>
                    @endif
            </div>


                @if($metadata['comment_count']>5)
                    <div class="row justify-content-center px-4 mx-1">
                        <div class="row justify-content-center mt-4 mb-2 mx-0 p-0">
                            <div class="col-2">
                                <div class="row">
                                    <button id="load_more" class="post-page-load-comments-button btn m-0 mt-1">Load
                                        more
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
@include('pages.confirm')
@include('partials.report_modal')
@include('partials.error')
@include('partials.postpage_toaster')
@endsection

