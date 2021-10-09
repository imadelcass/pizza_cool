<form method="GET" action="#">
    <div class="form-flex">
        <div>
            <input type="text" name="search" class="form-control" 
            value="{!!request('search')!!}">
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
</form>