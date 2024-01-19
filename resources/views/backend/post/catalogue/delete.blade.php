@include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['create']['title']])
<form action="{{ route('post.catalogue.destroy', $postCatalogue->id) }}" method="POST" class="box">
    @csrf
    @method('DELETE')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head"></div>
                <div class="panel-title">Thông tin chung</div>
                <div class="panel-description">
                    <p>- Bạn đang muốn xóa ngôn ngữ: <span class="text-danger">{{ $postCatalogue->name }}</span></p>
                    <p>- Lưu ý: Không thể khôi phục ngôn ngữ sau khi xóa. Hãy chắc chắn rằng bạn vẫn muốn tiếp tục thực hiện.</p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Tên nhóm <span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{{ old('name', ($postCatalogue->name) ?? '') }}" class="form-control" placeholder="..." autocomplete="off" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right">
            <button class="btn btn-danger" type="submit" name="send" value="send">Xóa dữ liệu</button>
        </div>
    </div>
</form>
