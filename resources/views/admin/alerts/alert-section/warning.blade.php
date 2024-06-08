@if(session('alert-section-warning'))

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <p class="mb-0">
            {{ session('alert-section-warning') }}
        </p>
    </div>


@endif
