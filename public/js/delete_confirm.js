let currentPage = 1;

let confirm = document.getElementById("confirm");
let yes = confirm.getElementsByClassName("confirm_button")[0];
let id = document.getElementById("post_ID");
let token = document.getElementsByName("csrf-token")[0];
let empty_warning = new bootstrap.Modal(document.getElementById('empty_comment_warning'));
let toaster_basic_obj = new bootstrap.Toast(document.getElementById("liveToast"));
let toaster_basic_node = document.getElementById("liveToast");
if(yes)
    yes.addEventListener("click",delete_post);

function delete_post(){
    const getUrl = window.location;
    const baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    let request = new XMLHttpRequest();
    request.open('delete', baseUrl+'/' + id.innerText, true);
    request.onload = function (){
        console.log(baseUrl+"/" + request.responseText);
        window.location.href = getUrl .protocol + "//" + getUrl.host + "/"+ request.responseText;
    }
    request.setRequestHeader('X-CSRF-TOKEN',token.getAttribute("content"));
    request.send();
}

function show_toaster(text){
    toaster_basic_node.getElementsByClassName("toast-body")[0].innerText = text;
    toaster_basic_obj.show();
}
