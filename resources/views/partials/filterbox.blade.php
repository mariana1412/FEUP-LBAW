<script type="text/javascript" src="{{ URL::asset('js/filterBox.js') }}" defer></script>
<div class="custom-filterBox col-md-3  d-flex justify-content-center">
    <div class="container  ">
        <h4 class="text-center"> Search </h4>
        <form class="pt-2" action="" method="get">
            <div class="input-group rounded">
                <input type="text" id="search" class="form-control" placeholder="Search" aria-label="Search"
                       aria-describedby="search-addon" />
                <span class="input-group-text border-0" id="search-addon" style="background-color:#fcf3ee;">
                            <i class="fas fa-search"></i>
                        </span>
            </div>
            <select class="form-select mt-4" id="type" aria-label="Select a type" style="cursor:pointer;">
                <option selected value ="">Select a type</option>
                <option value="News">News</option>
                <option value="Article">Article</option>
                <option value="Review">Review</option>
                <option value="Suggestion">Suggestion</option>
            </select>
            <input type="date" class="form-control mt-4" id="startDate" aria-label="Start Date"
                   style="cursor:pointer;">
            <p class="text-center mt-1 mb-1">to</p>
            <input type="date" class="form-control mt-0" id="endDate" aria-label="End Date" style="cursor:pointer;">
            @auth
            <div class="form-check mt-4">
                <input class="form-check-input" type="checkbox" value="" id="checkPeople"
                       style="cursor:pointer;">
                <label class="form-check-label" style="margin-left: 10px;" for="checkPeople">
                    Only people I follow
                </label>
            </div>
            <div class="form-check mt-4">
                    <input class="form-check-input" type="checkbox" value="" id="checkTags" style="cursor:pointer;">
                    <label class="form-check-label" style="margin-left: 10px;" for="checkTags">
                        Only tags I follow
                    </label>
            </div>
            <div class="form-check mt-4">
                <input class="form-check-input" type="checkbox" value="" id="checkMyPosts" style="cursor:pointer;">
                <label class="form-check-label" style="margin-left: 10px;" for="checkMyPosts">
                    Only my posts
                </label>
            </div>
            @endauth
            <button type="button" class="filterButton w-100 mt-4 p-1">
                <i class="fa fa-circle-notch fa-spin d-none search-spinner"></i>
                <span class="search-span">Search</span>
            </button>

        </form>
    </div>
</div>
