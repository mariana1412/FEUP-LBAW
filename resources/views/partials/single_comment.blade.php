@if(!$isThread)
<span class="comment-container" >
                <div class="row justify-content-center px-4 mx-1">
                <div class="col-10 post-page-comment pt-3 pb-2 px-3 mt-2">
                    <div class="row px-2 py-0">
                        <div class="col-auto p-0 m-0">
                            <h3 class="post-page-comment-body m-0">{!! nl2br(e($comment['comment']->content)) !!}</h3>
                        </div>
                        <div class="col-auto p-0 m-0 ms-auto">
                            <span class="comment_id COMMENTID" hidden>{{$comment['comment']->id}}</span>
                            
                               
                            
                            @if($user_id==$comment['comment']->user_id)
                            <div class="dropdown">
                                <a class="btn fa-cog-icon"   data-bs-toggle="dropdown" aria-expanded="false">
                                    <i  class="fas fa-cog ms-auto" ></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item edit_comment_button">Edit Comment</a>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <a class="dropdown-item delete_comment_button" >Delete Comment</a>
                                </ul>
                            </div>
                            @endif
                            
                        </div>
                    </div>
                    <div class="row align-items-end px-2 py-1">
                        <div class="col-lg-auto col-12 px-0 py-1 m-0 align-self-end">
                            <h3 class="post-page-comment-author-date p-0 m-0">by <a href="{{route('profile',['id'=>$comment['comment']['user_id']])}}">{{$comment['author']}}</a>, {{$comment['date']}}</h3>
                        </div>
                        <div class="col-lg-auto col-12 px-0 py-1 m-0 align-self-end ms-auto">
                            <div class="row">
                                <div class="d-flex">
                                    <h3 class="post-page-comment-interactions pe-3 my-0">{{$comment['likes']}} <i title="Like comment" class="far fa-thumbs-up"></i></h3>
                                    <h3 class="post-page-comment-interactions pe-3 my-0">{{$comment['dislikes']}} <i title="Dislike comment" class="far fa-thumbs-down"></i></h3>
                                    @if($user_id != $comment['comment']->user_id)
                                    <i title="Report comment" class="fas fa-ban my-0 pe-3 post-page-report-comment"></i>
                                    @endif
                                    <h3 class="post-page-comment-interactions my-0">{{$comment['thread_count']}} <i class="far fa-comments"></i></h3>
                                    <h3 class="post-page-comment-interactions my-0 px-3 show-hide-replies"> <i class="fas fa-chevron-right my-0" style="cursor:pointer;"></i>Show</h3>
                                    
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <span class="comment_thread_section">
            @foreach($comment['threads'] as $thread)
                <span class="thread-container">
                    <div hidden class="row justify-content-center px-4 mx-1 thread-section">
                        <div class="col-10 mx-0 px-0">
                            <div class="row justify-content-end comment-replies mx-0 px-0">
                                <div class="col-11 post-page-comment-reply reply py-2 pt-2 pb-1 mt-1">
                                    <div class="row px-2 py-0">
                                        <div class="col-auto p-0 m-0">
                                            <h3 class="post-page-comment-reply-body m-0">{{$thread['comment']->content}}</h3>
                                        </div>
                                        <div class="col-auto p-0 m-0 ms-auto">
                                            <span class="comment_id THREADID" hidden>{{$thread['comment']->id}}</span>
                                            <span class="parent_id" hidden>{{$comment['comment']->id}}</span>
                                            @if($user_id==$thread['comment']->user_id)
                                            
                                            <div class="dropdown">
                                                <a class="btn fa-cog-icon"  style="font-size:30%;" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-cog ms-auto" style="font-size:3em;"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item edit_comment_button">Edit Thread</a>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <a class="dropdown-item delete_comment_button" >Delete Thread</a>
                                                </ul>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row align-items-end px-2 py-0">
                                        <div class="col-lg-auto col-12 px-0 py-1 m-0 align-self-end">
                                            <h3 class="post-page-comment-reply-author-date p-0 m-0">by <a href="{{route('profile',['id'=>$thread['comment']['user_id']])}}">{{$thread['author']}}</a>, {{$thread['date']}}</h3>
                                        </div>
                                        <div class="col-lg-auto col-12 px-0 py-1 m-0 align-self-end ms-auto">
                                            <div class="row">
                                                <div class="d-flex">
                                                    <h3 class="post-page-comment-interactions pe-3 my-0">{{$thread['likes']}} <i title="Like comment" class="far fa-thumbs-up"></i></h3>
                                                    <h3 class="post-page-comment-interactions pe-3 my-0">{{$thread['dislikes']}} <i title="Dislike comment" class="far fa-thumbs-down"></i></h3>
                                                    @if($user_id != $thread['comment']->user_id)
                                                        <i title="Report comment" class="fas fa-ban my-0 post-page-report-comment"></i>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
             </span>
            @endforeach
            </span>
            @auth
            <div class="row justify-content-center px-4 mx-1 thread-reply" hidden>
                <div class="col-10 mx-0 px-0">
                    <div class="row justify-content-end comment-replies mx-0 px-0">
                        <div class="col-11 post-page-comment-reply-editor px-0 mx-0 mt-1">
                            <div class="row px-0 mx-0">
                                <div class="col-11 d-flex mx-0 px-0">
                                        <textarea class="container form-control post-page-add-comment-reply w-100 add-thread" id="add-comment" rows="1"
                                                  placeholder="Answer in thread"></textarea>
                                </div>
                                <div class="col-1 d-flex mx-0 px-0">
                                    <span class="thread_comment_id" hidden>{{$comment['comment']->id}}</span>
                                    <button class="post-page-comment-button btn-sm btn-block m-0 mt-0 add_thread_button">Comment</button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            @endauth
            </span>
@endif
@if($isThread)
<span class="thread-container">
                    <div hidden class="row justify-content-center px-4 mx-1 thread-section">
                        <div class="col-10 mx-0 px-0">
                            <div class="row justify-content-end comment-replies mx-0 px-0">
                                <div class="col-11 post-page-comment-reply reply py-2 pt-2 pb-1 mt-1">
                                    <div class="row px-2 py-0">
                                        <div class="col-auto p-0 m-0">
                                            <h3 class="post-page-comment-reply-body m-0">{{$comment['comment']->content}}</h3>
                                        </div>
                                        <div class="col-auto p-0 m-0 ms-auto">
                                            <span class="comment_id THREADID" hidden>{{$comment['comment']->id}}</span>
                                            <span class="parent_id" hidden>{{$comment['comment']->comment_id}}</span>
                                            @if($user_id==$comment['comment']->user_id)
                                            
                                            <div class="dropdown">
                                                <a class="btn fa-cog-icon"  style="font-size:30%;" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-cog ms-auto" style="font-size:3em;"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item edit_comment_button">Edit Thread</a>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <a class="dropdown-item delete_comment_button" >Delete Thread</a>
                                                </ul>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row align-items-end px-2 py-0">
                                        <div class="col-lg-auto col-12 px-0 py-1 m-0 align-self-end">
                                            <h3 class="post-page-comment-reply-author-date p-0 m-0">by <a href="{{route('profile',['id'=>$comment['comment']['user_id']])}}">{{$comment['author']}}</a>, {{$comment['date']}}</h3>
                                        </div>
                                        <div class="col-lg-auto col-12 px-0 py-1 m-0 align-self-end ms-auto">
                                            <div class="row">
                                                <div class="d-flex">
                                                    <h3 class="post-page-comment-interactions pe-3 my-0">{{$comment['likes']}} <i title="Like comment" class="far fa-thumbs-up"></i></h3>
                                                    <h3 class="post-page-comment-interactions pe-3 my-0">{{$comment['dislikes']}} <i title="Dislike comment" class="far fa-thumbs-down"></i></h3>
                                                    @if($user_id != $comment['comment']->user_id)
                                                        <i title="Report comment" class="fas fa-ban my-0 post-page-report-comment"></i>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
             </span>
@endif