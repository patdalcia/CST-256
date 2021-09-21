<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" ></script>

<div class="card" style="width: 18rem;">

    <img class="card-img-top" src="..." alt="Card image cap">
    
    <div class="card-body">
      <h5 class="card-title" :value="__('Job Title')">{{ $job->title }}</h5>
      <p class="card-text">{{ $job->description }}</p>
    </div>

    <ul class="list-group list-group-flush">
      <li class="list-group-item">{{ $job->requirements }}</li>
      {{-- <li class="list-group-item">Posted By: {{ $job->user_id }} </li> 
      This would require expanding the Job DB table with a FK linking each job 
      at creation to userID
      The migration is updated, just uncomment & run --}}
    </ul>
    
    <div class="card-body">
      <a href="#" class="card-link">Apply</a>
      {{-- <a href="#" class="card-link">Another Link</a> --}}
    </div>

</div>