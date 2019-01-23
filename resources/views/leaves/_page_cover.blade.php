<header class="page-cover">
    <div class="text-center">
        <a href="#" class="user-avatar user-avatar-xl">
            <img src="{{ Avatar::create($Leave->employee->full_name)->toBase64() }}" />
        </a>
        <h2 class="h4 mt-3 mb-0">{{ $Leave->employee->full_name }}</h2>
        <div class="my-1">
            <i class="fa fa-star text-yellow"></i>
            <i class="fa fa-star text-yellow"></i>
            <i class="fa fa-star text-yellow"></i>
            <i class="fa fa-star text-yellow"></i>
            <i class="far fa-star text-yellow"></i>
        </div>
        <p class="text-muted"> Employee </p>
    </div>
</header>