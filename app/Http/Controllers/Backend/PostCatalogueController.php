<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\PostCatalogueServiceInterface as PostCatalogueService;
use App\Repositories\Interfaces\PostCatalogueRepositoryInterface as PostCatalogueRepository;
use App\Http\Requests\StorePostCatalogueRequest;
use App\Http\Requests\UpdatePostCatalogueRequest;

class PostCatalogueController extends Controller
{
    protected $postCatalogueService;
    protected $postCatalogueRepository;

    public function __construct(
        PostCatalogueService $postCatalogueService, PostCatalogueRepository $postCatalogueRepository
    )
    {
        $this->postCatalogueService = $postCatalogueService;
        $this->postCatalogueRepository = $postCatalogueRepository;
    }

    public function index(Request $request)
    {
        $postCatalogue = $this->postCatalogueService->paginate($request);

        $config = [
            'js' => [
                'backend/js/plugins/switchery/switchery.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js'
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ]
        ];
        $config['seo'] = config('apps.postcatalogue');
        $template = 'backend.post.catalogue.index';
        return view('backend.dashboard.layout', compact('template', 'config', 'postCatalogue'));
    }

    public function create(){
        $config = $this->configData();
        $config['seo'] = config('apps.postcatalogue');
        $config['method'] = 'create';
        $template = 'backend.post.catalogue.store';
        return view('backend.dashboard.layout', compact('template', 'config'));
    }

    public function store(StorePostCatalogueRequest $request) {
        if($this->postCatalogueService->create($request)) {
            return redirect()->route('post.catalogue.index')->with('success', "Thêm mới bản ghi thành công");
        }
        return redirect()->route('post.catalogue.index')->with('error', "Thêm mới bản ghi không thành công");
    }

    public function edit($id){
        $postCatalogue = $this->postCatalogueRepository->findById($id);
        $config = $this->configData();
        $config['seo'] = config('apps.postcatalogue');
        $config['method'] = 'edit';
        $template = 'backend.post.catalogue.store';
        return view('backend.dashboard.layout', compact('template', 'config', 'postCatalogue'));
    }

    public function update($id, UpdatePostCatalogueRequest $request){
        if($this->postCatalogueService->update($id, $request)) {
            return redirect()->route('post.catalogue.index')->with('success', "Cập nhật bản ghi thành công");
        }
        return redirect()->route('post.catalogue.index')->with('error', "Cập nhật bản ghi không thành công");
    }

    public function delete($id){
        $postCatalogue = $this->postCatalogueRepository->findById($id);
        $config['seo'] = config('apps.postcatalogue');
        $template = 'backend.post.catalogue.delete';
        return view('backend.dashboard.layout', compact('template', 'config', 'postCatalogue'));
    }

    public function destroy($id){
        if($this->postCatalogueService->destroy($id)) {
            return redirect()->route('post.catalogue.index')->with('success', "Xóa bản ghi thành công");
        }
        return redirect()->route('post.catalogue.index')->with('error', "Xóa bản ghi không thành công");
    }

    private function configData(){
        return [
            'js' => [
                'backend/plugins/ckeditor/ckeditor.js',
                'backend/plugins/ckfinder_2/ckfinder.js',
                'backend/libary/finder.js',
                'backend/libary/seo.js',
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js'
            ],
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'
            ]
        ];
    }
}
