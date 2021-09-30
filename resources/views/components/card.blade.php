    <link rel="stylesheet" href="../public/css/card.styles.css">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $data->title }}</h4> 
            <h6 class="text-muted card-subtitle mb-2">Job Description:</h6>
            <p class="card-text">{{ $data->description }}</p>
            <div class="card-links">
            	<a class="card-link" href={{ route('job.show', ['job' =>$data->id]) }} >View Details?</a><a class="card-link" href="#">Apply? (NOT IMPLEMENTED)</a>
            </div>
        </div>
    </div>
    <script src="public/js/bootstrap.min.js"></script>


