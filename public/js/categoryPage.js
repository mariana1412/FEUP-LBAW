let loadMoreCategory = document.querySelector('.category .pagination-loadmore .loadmore')
let page = 2
const url = new URL(window.location.href)
let category = url.searchParams.get('category')
if(category == null) category = "Music"

if(loadMoreCategory != null) loadMoreCategory.addEventListener('click', loadHandlerCategory)

/*window.addEventListener('scroll', function(){
    if((document.body.offsetHeight + document.body.scrollTop) >= document.body._scrollHeight){
        loadHandlerCategory()
    }
})*/

let top_button = document.querySelector("#go-top")
if(top_button != null){
    top_button.addEventListener('click', function(){
        window.scrollTo(0,0)
    })
}

function loadHandlerCategory(e){
    e.preventDefault()
    let pag = document.querySelector('.category .pagination-loadmore')
    let parent = pag.parentNode
    parent.removeChild(pag)

    let outerDiv = addLoadSpinner(parent)

    const loadRequest = new XMLHttpRequest()
    loadRequest.onreadystatechange = function(){
        if(loadRequest.readyState === XMLHttpRequest.DONE){
            if(loadRequest.status === 200){
                parent.removeChild(outerDiv)
                const response = JSON.parse(loadRequest.responseText)
                const posts = response['posts']
                const number_res = response['number_res']
                let postDiv = document.querySelector('.category .postsCards')
                let newDiv = document.createElement('div')
                newDiv.innerHTML= posts

                while (newDiv.firstChild)
                    postDiv.appendChild(newDiv.firstChild)

                if(number_res > 15){
                    if(number_res % 15 === 0) {
                        if (Math.floor(number_res) / 15 > page) addLoadMoreCategory(postDiv)
                    }
                    else if(Math.floor(number_res / 15 + 1) > page) addLoadMoreCategory(postDiv)
                }
                page++
            }
            else alert('Error fetching api: ' +  loadRequest.status)
        }
    }
    loadRequest.open('GET',window.location.protocol +"//" + window.location.host +'/api/category/loadMore/'+ category + '/' + page , true)
    loadRequest.send()
}


function addLoadMoreCategory(postDiv){
    let pagination = document.createElement('div')
    pagination.className = "pagination-loadmore d-flex justify-content-center"

    let load = document.createElement('a')
    load.className = "loadmore"
    load.innerHTML = "Load More"

    pagination.appendChild(load)
    postDiv.appendChild(pagination)
    let loadMore = document.querySelector('.category .pagination-loadmore .loadmore')
    if(loadMore != null) loadMore.addEventListener('click', loadHandlerCategory)
}
