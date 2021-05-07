addDeleteCommentListeners();
function addDeleteCommentListeners(){
    let x = document.getElementsByClassName("delete_comment_button");
    if(x!=null){
        for(let i = 0;i<x.length;i++){
                element = x[i];
                let parent = element.parentNode;
                let container = parent.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
                let comment_id = parent.parentNode.parentNode.getElementsByClassName("comment_id")[0].innerText;
                element.addEventListener("click",function(e){
                    e.preventDefault();
                    deleteComment(comment_id,container);
                });
        }        
    }
}


function deleteComment(comment_id,container){
    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    var request = new XMLHttpRequest();
    console.log(getUrl .protocol + "//" + getUrl.host + "/api/" + "comment/"+comment_id);
    request.open('delete', getUrl .protocol + "//" + getUrl.host + "/api/" + "comment/"+comment_id, true);
    request.onload = function (){
        result = "";
        if(request.responseText == "SUCCESS"){
            container.innerHTML = "";
        }
        else{
            alert("Failed to delete comment!");
            return;
        }
        
    };
    request.setRequestHeader('X-CSRF-TOKEN',token.getAttribute("content"));
    request.send();
}