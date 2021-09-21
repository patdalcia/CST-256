<form method="POST" action="{{ route('group.handleSearch') }}">
  @csrf

  {{-- Search Parameter --}}
  <div class="input-group">
      <input type="search" name="search" class="form-control rounded" placeholder="Search" aria-label="Search"
          aria-describedby="search-addon" />
      
      <input type="submit" class="btn btn-outline-primary" value="Search"/>
      
  </div>  
</form>

{{-- A more standard button, if needed...
  <div class="input-group">
    <div class="form-outline">
      <input type="search" id="form1" class="form-control" />
      <label class="form-label" for="form1">Search</label>
    </div>
    <button type="button" class="btn btn-primary">
      <i class="fas fa-search"></i>
    </button>
  </div> --}}