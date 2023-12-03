<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h6>Setting</h6>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach($items as $item)
            <div class="col-sm-4">
                <div class="card item">
                    <div class="card-body d-flex justify-center align-center" class="position-relative">
                        <video controls width="100%">
                            <source src="{{ asset($item->video_url) }}">
                        </video>
                        <i class="fa fa-close position-absolute  z-10  btn-close"></i>
                    </div>
                    <div class="card-footer">
                        <h6 class="mt-0 pb-0">Title</h6>
                        <div class="button-control d-flex justify-content-end">

                            <a href="javascript:;" data-id="{{ $item->id }}"
                                data-action="{{ route('admin.banners.update',$item->id) }}"
                                class="pt-1 pb-1 pl-3 pr-3 bg-danger mr-2 show-form-edit">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="javascript:;" class="pt-1 pb-1 pl-3 pr-3 bg-warning mr-2 delete-item"
                                data-action="{{ route('admin.banners.destroy',$item->id) }}">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>