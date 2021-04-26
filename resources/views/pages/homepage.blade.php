@extends('layouts.altart-app')

@section('content')
<div class="homepage row g-0" style="margin-top: 5em; margin-bottom:7em;">
    <div class="homepage-view col-lg-2 col-12 pt-lg-5 pt-2 ps-lg-5">
        <nav class="nav w-100 d-lg-block d-flex justify-content-center">
            <a class="nav-link active fs-5" href="#"><img src="images/bar-chart.svg" height="25">Top</a>
            <a class="nav-link fs-5" href="#"><img src="images/flame.svg" height="25">Hot</a>
            <a class="nav-link fs-5" href="#"><img src="images/calendar.svg" height="25">New</a>
        </nav>
    </div>
    <div class="homepage-center col-12 col-lg-7">
        <div id="topNews" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#topNews" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#topNews" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#topNews" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-7">
                                <img src="https://static.toiimg.com/photo/72975551.cms" class="w-100" alt="...">
                            </div>
                            <div class="col-md-5">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">Green Day Offers Up Punk-Inspired Aerobics in ‘Here
                                        Comes the Shock' Video</h5>
                                    <p class="card-text d-inline">Green Day is whipping fans into shape with its
                                        latest
                                        music video. On Saturday (Feb. 20), the rock band premiered their new song
                                        "Here
                                        Comes the
                                        Shock" as part of the National Hockey </p>
                                    <strong> (read more)</strong>
                                    <p class="card-text mt-3"><small>by <a href="userprofile.php"
                                                                           id="authorName">João Santos</a>,
                                            FEBRUARY 28,
                                            2021</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-7">
                                <img src="https://wallpaperaccess.com/full/2587267.jpg" class="w-100" alt="...">
                            </div>
                            <div class="col-md-5">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">Green Day Offers Up Punk-Inspired Aerobics in ‘Here
                                        Comes the Shock' Video</h5>
                                    <p class="card-text d-inline">Green Day is whipping fans into shape with its
                                        latest
                                        music video. On Saturday (Feb. 20), the rock band premiered their new song
                                        "Here
                                        Comes the
                                        Shock" as part of the National Hockey </p>
                                    <strong> (read more)</strong>
                                    <p class="card-text mt-3"><small>by <a href="userprofile.php"
                                                                           id="authorName">João Santos</a>,
                                            FEBRUARY 28,
                                            2021</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-7">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_Kwz7sjcydklqSsq9kf9hBI4eZwsVO7-dZg&usqp=CAU"
                                     class="w-100" alt="...">
                            </div>
                            <div class="col-md-5">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">Green Day Offers Up Punk-Inspired Aerobics in ‘Here
                                        Comes the Shock' Video</h5>
                                    <p class="card-text d-inline">Green Day is whipping fans into shape with its
                                        latest
                                        music video. On Saturday (Feb. 20), the rock band premiered their new song
                                        "Here
                                        Comes the
                                        Shock" as part of the National Hockey </p>
                                    <strong> (read more)</strong>
                                    <p class="card-text mt-3"><small>by <a href="userprofile.php"
                                                                           id="authorName">João Santos</a>,
                                            FEBRUARY 28,
                                            2021</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="postsCards row">
            @include('partials.card')
            @include('partials.card')
            @include('partials.card')
            @include('partials.card')
            <div class="d-flex justify-content-center">
                <div class="pagination">
                    <a href="#">&laquo;</a>
                    <a href="#" class="active">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">&raquo;</a>
                </div>
            </div>
        </div>
    </div>
    @include('partials.filterbox')
</div>
@endsection
