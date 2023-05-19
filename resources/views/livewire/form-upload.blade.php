<div>
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Form Upload</h6>
            {{-- <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                    aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Dropdown Header:</div>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div> --}}
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <form wire:submit.prevent="save" enctype="multipart/form-data">
                <div class="mb-3">

                    <label for="formFile" class="form-label">Import Excel Disini..</label>
                    <input class="form-control" type="file" id="formFile" wire:model="file">
                    @error('file')
                        
                        <span id="helpBlock" class="help-block" style="color:red;">{{ $message }}</span>
                    @enderror
                </div>

                <button class="btn btn-primary btn-icon-split btn-sm" type="submit">
                    <span class="icon text-white-50">
                        <i class="fas fa-file-upload"></i>
                    </span>
                    <span wire:loading.remove>Upload</span>
                    <span wire:loading>Uploading...</span>
                </button>
            </form>
        </div>
    </div>
</div>
