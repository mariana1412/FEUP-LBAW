<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AltArt</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/45528450c3.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.tiny.cloud/1/08t5y62wss6y2fzascz2trysrq487403jdb54o0kzk3nu9zq/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
    tinymce.init({
        selector: '#mytextarea'

    });
    </script>

    <link rel="stylesheet" href="style/style.css">
</head>

<body>

    <?php
    function draw_edit_post(){
?>
    <div class="container post">
        <div class="row" style="margin-bottom:7em;margin-top:7em;">
            <div class="card edit-post-page-post-card justify-content-center pb-5" style="border-radius:5px;">

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col col-auto mt-5">
                            <h1>Edit Post</h1>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="form-group post-comment-input mb-4">
                            <label class="add-comment-label" for="edit-title">Post title</label>
                            <input class="container form-control w-100" id="edit-title"
                                value="Mick Jagger Celebrates 150 Years of the Royal Albert Hall in New Video">
                        </div>
                    </div>
                </div>


                <div class="row justify-content-center my-3">
                    <div class="col-10">
                        <div class="row align-items-end px-0 mx-0">
                            <div class="col-lg-4 col-12 form-group new-post-thumbnail p-0 m-1">
                                <div class="row m-0 p-0">
                                    <div class="col mx-0 mb-1 px-0">
                                        <label for="new-post-thumbnail" class="px-0"><i class="fas fa-camera"></i>
                                            Select post image</label>

                                    </div>
                                </div>
                                <div class="row m-0 p-0">
                                    <div class="col mx-0 px-0">
                                        <input type="file" class="form-control-file px-0 mb-0" id="new-post-thumbnail">

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-5 col-12 form-group category-dropdown p-0 m-1">
                                <select class="form-select edit-post-page-category-select" id="category-dropdown">
                                    <option value="" disabled selected hidden>Category</otion>
                                    <option>Music</option>
                                    <option>Cinema</option>
                                    <option>TV Show</option>
                                    <option>Theater</option>
                                    <option>Literature</option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-sm-5 col-12 form-group topic-dropdown p-0 m-1">
                                <select class="form-select" id="topic-dropdown">
                                    <option value="" disabled selected hidden>Topic</otion>
                                    <option>News</option>
                                    <option>Article</option>
                                    <option>Review</option>
                                    <option>Suggestion</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-12 form-group spoiler-checkbox p-1 m-1">
                                <input type="checkbox" id="spoiler" name="spoiler-checkbox" value="spoiler">
                                <label for="spoiler">This post contains spoilers</label>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="container mx-0 px-0 mt-3 editor-post-editor-container">
                    <div class="row justify-content-center">
                        <div class="col-10">
                            <label for="mytextarea">Post</label>
                            <textarea id="mytextarea" class="editor-post-editor col-auto" name="mytextarea">
                            Mick Jagger narrates a new film on London’s Royal Alberts Hall in celebration of the iconic venue’s 150th birthday. Directed by Tom Harper, the 90-second film includes scenes of the empty venue during the pandemic.
    <br>“I would like to take this opportunity to wish the Royal Albert Hall a very happy 150th birthday and look forward to the future, seeing and listening to many fantastic artists and musicians performing onstage at this iconic venue,” Jagger says.
    <br>“I have desperately missed live performance — there is something electric and fundamentally human about the shared experience of being in a room surrounded by other people, part of an audience,” Harper added. “The Royal Albert Hall is a magnificent building even when it’s empty, but what makes it truly special is the connection it fosters through those shared experiences. That is what this film is about: Not only a celebration of performances from the Hall’s glorious past, but also the sense of anticipation of some of the things to look forward to when we can be together again.”
    <br>...<br>... <br>“I have desperately missed live performance — there is something electric and fundamentally human about the shared experience of being in a room surrounded by other people, part of an audience,” Harper added. “The Royal Albert Hall is a magnificent building even when it’s empty, but what makes it truly special is the connection it fosters through those shared experiences. That is what this film is about: Not only a celebration of performances from the Hall’s glorious past, but also the sense of anticipation of some of the things to look forward to when we can be together again.”

                        </textarea>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-1">
                        <div class="col-10">
                            <p><i class="fas fa-exclamation-triangle"></i> Keep in mind that if your post does not
                                follow all website's rules, it may be reported.</p>
                        </div>
                    </div>
                </div>


                <div class="container mx-0 px-0 mt-3 edit-post-tags-container">
                    <div class="row justify-content-center">
                        <div class="col-10">
                            <label for="tags" class="col-12 col-form-label">Tags</label>
                            <div class="bg-white rounded border justify-content-center form-control" id="tags"
                                style="height:4em;">
                                <div class="d-flex justify-content-start tags">
                                    <a class="btn btn-secondary btn-sm  d-flex justify-content-center m-2">Music <i
                                            class="bi bi-x ms-1"></i></a>
                                    <a class="btn btn-secondary btn-sm  d-flex justify-content-center m-2">News <i
                                            class="bi bi-x ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-1">
                        <div class="col-10">
                            <p>Min: 2 tags - Max 10 tags</p>
                        </div>
                    </div>
                </div>


                <div class="container mx-0 px-0 mt-3">
                    <div class="row justify-content-center">
                        <div class="col-10">
                            <label for="tags" class="col-auto ">Add co-authors</label>
                            <div class="bg-white rounded border justify-content-center form-control" id="tags"
                                style="height:4em;">
                                <div class="d-flex justify-content-start tags">
                                    <a class="btn btn-secondary btn-sm  d-flex justify-content-center m-2">Jane Doe <i
                                            class="bi bi-x ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row justify-content-center mt-5">
                    <div class="col-10">
                        <div class="row d-flex flex-row">
                            <div class="col-md-auto col-12 me-auto">
                                <button type="button" class="btn preview-post"><i class="far fa-eye"></i>
                                    Preview</button>
                            </div>
                            <div class="col-md-auto col-12">
                                <a href="mypost.php" type="button" class="btn cancel-post">Cancel</a>
                            </div>
                            <div class="col-md-auto col-12">
                                <a href="mypost.php" type="button" class="btn publish-post px-5">Publish</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php
    }

        include_once('./navbar.php');
      
        draw_navbar("authenticated_user");
        draw_edit_post();
        include_once('./mobilebar.php');
        draw_mobilebar();

    ?>


</body>


</html>