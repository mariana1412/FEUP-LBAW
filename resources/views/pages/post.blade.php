@extends('layouts.altart-app')

@section('content')
<div class="container post">
    <div class="row" style="margin-top: 7em; margin-bottom: 7em;">
        <div class="card post-page-post-card justify-content-center pb-5" style="border-radius:5px;">

            <div class="my-post-page-settings btn-group dropdown">
                <a class="btn fa-cog-icon" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-cog" style="font-size:3em;"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="editpost.php">Edit Post</a>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <a class="dropdown-item" data-bs-toggle="modal"
                       data-bs-target="#confirm">Delete Post</a>
                </ul>
            </div>

            <div class="container-fluid d-flex justify-content-center">
                <div class="mt-2 col-10 justify-content-center d-flex">
                    <div class="row thumbnail-image">
                        <img src="https://d15v4l58k2n80w.cloudfront.net/file/1396975600/25413991727/width=1600/height=900/format=-1/fit=crop/crop=394x0+6541x3684/rev=3/t=443967/e=never/k=756accaa/Untitled_Panorama6.jpg"
                             class="justify-content-conter" alt="Royal Albert Hall">
                    </div>
                </div>
            </div>

            <div class="container-fluid d-flex col-10 justify-content-left mt-3">
                <h1 class="post-page-post-title">Mick Jagger Celebrates 150 Years of the Royal Albert Hall in New Video</h1>
            </div>

            <div class="container-fluid d-flex col-10 justify-content-left mt-1">
                <h2 class="post-page-post-author-date">by <a href="./myprofile.php">Ana Sousa</a>, FEBRUARY 23, 2021</h2>
            </div>

            <div class="container-fluid d-flex col-10 justify-content-left mt-1">
                <div class="pe-3">
                    <h3 class="post-page-post-interactions">4 <i class="far fa-eye"></i></h3>
                </div>
                <div class="pe-3">
                    <h3 class="post-page-post-interactions">1 <i class="far fa-thumbs-up"></i></h3>
                </div>
                <div class="pe-3">
                    <h3 class="post-page-post-interactions">0 <i class="far fa-thumbs-down"></i></h3>
                </div>
                <div class="pe-3">
                    <h3 class="post-page-post-interactions">2 <i class="far fa-comments"></i></h3>
                </div>
            </div>

            <div class="container-fluid d-flex col-10 justify-content-left mt-2">
                <p class="post-page-post-text">Mick Jagger narrates a new film on London’s Royal Alberts Hall in
                    celebration
                    of the iconic venue’s 150th birthday. Directed by Tom Harper, the 90-second film includes scenes
                    of the empty venue during the pandemic.
                    <br>“I would like to take this opportunity to wish the Royal Albert Hall a very happy 150th
                    birthday and look forward to the future, seeing and listening to many fantastic artists and
                    musicians performing onstage at this iconic venue,” Jagger says.
                    <br>“I have desperately missed live performance — there is something electric and fundamentally
                    human about the shared experience of being in a room surrounded by other people, part of an
                    audience,” Harper added. “The Royal Albert Hall is a magnificent building even when it’s empty,
                    but what makes it truly special is the connection it fosters through those shared experiences.
                    That is what this film is about: Not only a celebration of performances from the Hall’s glorious
                    past, but also the sense of anticipation of some of the things to look forward to when we can be
                    together again.”
                    <br>...<br>... <br>“I have desperately missed live performance — there is something electric and
                    fundamentally human about the shared experience of being in a room surrounded by other people,
                    part of an audience,” Harper added. “The Royal Albert Hall is a magnificent building even when
                    it’s empty, but what makes it truly special is the connection it fosters through those shared
                    experiences. That is what this film is about: Not only a celebration of performances from the
                    Hall’s glorious past, but also the sense of anticipation of some of the things to look forward
                    to when we can be together again.”
                </p>
            </div>

            <div class="row justify-content-center mt-3 mb-3 px-4 mx-1">
                <div class="col-10">
                    <div class="row justify-content-start align-items-center">
                        <h2 class="col-auto post-page-post-tags-indicator m-0 p-0">Tags: </h2>
                        <div class="col-auto post-page-tag-container px-2 m-1">
                            <a class="post-page-post-tag" href="advanced_search.php">Music</a>
                        </div>
                        <div class="col-auto post-page-tag-container px-2 m-1">
                            <a class="post-page-post-tag" href="advanced_search.php">News</a>
                        </div>
                        <div class="col-auto post-page-tag-container px-2 m-1">
                            <a class="post-page-post-tag" href="advanced_search.php">Band</a>
                        </div>
                        <div class="col-auto post-page-tag-container px-2 m-1">
                            <a class="post-page-post-tag" href="advanced_search.php">Performance</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mt-5 px-4 mx-1">
                <div class="col-10 post-comment-indicator">
                    <div class="row justify-content-between align-items-center comment-indicator-row mb-3">
                        <div class="col-auto m-0 p-0">
                            <h3 class="mt-0 py-0 mb-1">Comments</h3>
                        </div>
                        <div class="col-auto p-0 m-0">
                            <div class="dropdown p-0 m-0">
                                <button class="btn btn-secondary dropdown-toggle comment-sort-by-button p-0 m-0" type="button" id="comments-sort-by" data-bs-toggle="dropdown" aria-expanded="false">Sort by</button>
                                <ul class="dropdown-menu comments-sort-by" aria-labelledby="comments-sort-by">
                                    <li><a class="dropdown-item">Most popular</a></li>
                                    <li><a class="dropdown-item">Newest</a></li>
                                    <li><a class="dropdown-item">Oldest</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center px-4 mx-1">
                <div class="col-10 post-page-comment pt-3 pb-2 px-3 mt-2">
                    <div class="row px-2 py-0">
                        <div class="col-auto p-0 m-0">
                            <h3 class="post-page-comment-body m-0">Really good article!</h3>
                        </div>
                        <div class="col-auto p-0 m-0 ms-auto">
                            <i class="fas fa-chevron-down ms-auto"></i>
                        </div>
                    </div>
                    <div class="row align-items-end px-2 py-1">
                        <div class="col-lg-auto col-12 px-0 py-1 m-0 align-self-end">
                            <h3 class="post-page-comment-author-date p-0 m-0">by <a href="./userprofile.php">João Santos</a>, FEBRUARY 23, 2021</h3>
                        </div>
                        <div class="col-lg-auto col-12 px-0 py-1 m-0 align-self-end ms-auto">
                            <div class="row">
                                <div class="d-flex">
                                    <h3 class="post-page-comment-interactions pe-3 my-0">1 <i title="Like comment" class="far fa-thumbs-up"></i></h3>
                                    <h3 class="post-page-comment-interactions pe-3 my-0">0 <i title="Dislike comment" class="far fa-thumbs-down"></i></h3>
                                    <i title="Report comment" class="fas fa-ban my-0 pe-3 post-page-report-comment"></i>
                                    <h3 class="post-page-comment-interactions my-0">2 <i class="far fa-comments"></i></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center px-4 mx-1">
                <div class="col-10 post-page-comment pt-3 pb-2 px-3 mt-2">
                    <div class="row px-2 py-0">
                        <div class="col-auto p-0 m-0">
                            <h3 class="post-page-comment-body m-0">Really good article!</h3>
                        </div>
                        <div class="col-auto p-0 m-0 ms-auto">
                            <i class="fas fa-chevron-down ms-auto"></i>
                        </div>
                    </div>
                    <div class="row align-items-end px-2 py-1">
                        <div class="col-lg-auto col-12 px-0 py-1 m-0 align-self-end">
                            <h3 class="post-page-comment-author-date p-0 m-0">by <a href="./userprofile.php">Joyce Rodrigues</a>, FEBRUARY 22, 2021</h3>
                        </div>
                        <div class="col-lg-auto col-12 px-0 py-1 m-0 align-self-end ms-auto">
                            <div class="row">
                                <div class="d-flex">
                                    <h3 class="post-page-comment-interactions pe-3 my-0">1 <i title="Like comment" class="far fa-thumbs-up"></i></h3>
                                    <h3 class="post-page-comment-interactions pe-3 my-0">0 <i title="Dislike comment" class="far fa-thumbs-down"></i></h3>
                                    <i title="Report comment" class="fas fa-ban my-0 pe-3 post-page-report-comment"></i>
                                    <h3 class="post-page-comment-interactions my-0">2 <i class="far fa-comments"></i></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center px-4 mx-1">
                <div class="col-10 post-page-comment pt-3 pb-2 px-3 mt-2">
                    <div class="row px-2 py-0">
                        <div class="col-auto p-0 m-0">
                            <h3 class="post-page-comment-body m-0">Really good article!</h3>
                        </div>
                        <div class="col-auto p-0 m-0 ms-auto">
                            <i class="fas fa-chevron-down ms-auto"></i>
                        </div>
                    </div>
                    <div class="row align-items-end px-2 py-1">
                        <div class="col-lg-auto col-12 px-0 py-1 m-0 align-self-end">
                            <h3 class="post-page-comment-author-date p-0 m-0">by <a href="./userprofile.php">Beatrice Layne</a>, FEBRUARY 21, 2021</h3>
                        </div>
                        <div class="col-lg-auto col-12 px-0 py-1 m-0 align-self-end ms-auto">
                            <div class="row">
                                <div class="d-flex">
                                    <h3 class="post-page-comment-interactions pe-3 my-0">1 <i title="Like comment" class="far fa-thumbs-up"></i></h3>
                                    <h3 class="post-page-comment-interactions pe-3 my-0">0 <i title="Dislike comment" class="far fa-thumbs-down"></i></h3>
                                    <i title="Report comment" class="fas fa-ban my-0 pe-3 post-page-report-comment"></i>
                                    <h3 class="post-page-comment-interactions my-0">2 <i class="far fa-comments"></i></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10 mx-0 px-0">
                    <div class="row justify-content-end comment-replies mx-0 px-0">
                        <div class="col-11 post-page-comment-reply reply py-2 pt-2 pb-1 mt-1">
                            <div class="row px-2 py-0">
                                <div class="col-auto p-0 m-0">
                                    <h3 class="post-page-comment-reply-body m-0">Agreed!</h3>
                                </div>
                            </div>
                            <div class="row align-items-end px-2 py-0">
                                <div class="col-lg-auto col-12 px-0 py-1 m-0 align-self-end">
                                    <h3 class="post-page-comment-reply-author-date p-0 m-0">by <a href="./userprofile.php">John Doe</a>, FEBRUARY 21, 2021</h3>
                                </div>
                                <div class="col-lg-auto col-12 px-0 py-1 m-0 align-self-end ms-auto">
                                    <div class="row">
                                        <div class="d-flex">
                                            <h3 class="post-page-comment-interactions pe-3 my-0">1 <i title="Like comment" class="far fa-thumbs-up"></i></h3>
                                            <h3 class="post-page-comment-interactions pe-3 my-0">0 <i title="Dislike comment" class="far fa-thumbs-down"></i></h3>
                                            <i title="Report comment" class="fas fa-ban my-0 post-page-report-comment"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-11 post-page-comment-reply-editor px-0 mx-0 mt-1">
                            <div class="row px-0 mx-0">
                                <div class="d-flex mx-0 px-0">
                                        <textarea class="container form-control post-page-add-comment-reply w-100" id="add-comment" rows="1"
                                                  placeholder="Answer in thread"></textarea>
                                </div>
                            </div>
                            <div class="row px-0 mx-0 justify-content-end">
                                <div class="col-auto px-0">
                                    <button class="post-page-comment-button btn m-0 mt-1">Comment</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center px-4 mx-1">
                <div class="row justify-content-center mt-4 mb-2 mx-0 p-0">
                    <div class="col-10">
                        <div class="row">
                            <button class="post-page-load-comments-button btn m-0 mt-1">Load 2 more  comments</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection