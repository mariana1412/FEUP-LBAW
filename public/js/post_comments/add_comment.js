let add = document.getElementById("add_comment_button");
let content = document.getElementsByClassName("add-comment")[0];


if(add!=null){
    add.addEventListener("click",function (e){
        e.preventDefault();
        addComment();

    });
}

function addComment(){
    var getUrl = window.location;
    var request = new XMLHttpRequest();
    console.log( getUrl .protocol + "//" + getUrl.host + "/" + "api/post/" + id.innerText + "/add_comment");
    request.open('post', getUrl .protocol + "//" + getUrl.host + "/" + "api/post/" + id.innerText + "/add_comment", true);
    request.onload = function (){
        result = "";
        if(request.status==400){
            alert("Error adding comment");
            return;
        }
        else if(request.status==200){
            let temp = request.responseText;
            temp+=document.getElementById("comment-section").innerHTML;
            document.getElementById("comment-section").innerHTML = temp;
            content.value = "";
            addListeners();
            addDeleteCommentListeners();
            addEditListeners();
            addShowThreadListeners();
            updateCommentCount(1);
            EmptyCommentsVisibility(true);
            let comments = document.querySelectorAll('.comment-container');
            if(comments != null) comments.forEach((comment) => addCommentsEventListeners(comment));
        }
        
        
    };
    request.setRequestHeader('X-CSRF-TOKEN',token.getAttribute("content"));
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    if(content.value=="" || content.value.match("^\\s+$")){
        //alert("Empty comments are not allowed!");
        empty_warning.show();
        return;
    }
    request.send(encodeForAjax({content:content.value,post_id:id.innerText,user_id:userID.innerText}));
}