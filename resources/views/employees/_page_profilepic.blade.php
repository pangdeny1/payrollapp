
         <div class="page-sidebar border-left bg-white">
            <header class="sidebar-header d-sm-none">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">
                    <a href="#" onclick="Looper.toggleSidebar()">
                        <i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back</a>
                    </li>
                </ol>
                </nav>
            </header>
            <div class="sidebar-section">
                 <div class="text-center">
       <div class="user-avatar user-avatar-xl fileinput-button">
                                    <div class="fileinput-button-label"> Change photo </div>
                                    @if ($employee->hasMedia())
                                    <img src="{{ $employee->getFirstMedia()->getFullUrl() }}" alt="">
                                    @else
                                    <img src="{{ Avatar::create($employee->full_name)->toBase64() }}" alt="">
                                    @endif
                                     
                                    <input id="fileupload-avatar" type="file" name="avatar">
                                </div><!-- /avatar -->
        <h2 class="h4 mt-3 mb-0">{{ $employee->full_name }}</h2>
        <div class="my-1">
            <i class="fa fa-star text-yellow"></i>
            <i class="fa fa-star text-yellow"></i>
            <i class="fa fa-star text-yellow"></i>
            <i class="fa fa-star text-yellow"></i>
            <i class="far fa-star text-yellow"></i>
        </div>
        <p class="text-muted"> Employee </p>
    </div>
            </div>
        </div>
  
