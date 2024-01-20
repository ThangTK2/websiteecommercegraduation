<?php

namespace App\Services;

use App\Services\Interfaces\LanguageServiceInterface;
use App\Repositories\Interfaces\LanguageRepositoryInterface as LanguageRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class LanguageService
 * @package App\Services
 */
class LanguageService implements LanguageServiceInterface
{
    protected $languageRepository;
    public function __construct(LanguageRepository $languageRepository)
    {
        $this->languageRepository = $languageRepository;
    }

    public function paginate($request)
    {
        $condition['keyword'] = addslashes($request->input('keyword'));
        $condition['publish'] = $request->integer('publish');
        $perPage = $request->integer('perpage');
        $languages = $this->languageRepository->pagination(
            $this->paginateSelect(), $condition, [], ['path' => 'language/index'], $perPage, []
        );
        return $languages;
        dd($languages);
    }

    public function create($request){
        DB::beginTransaction();
        try {
            $payload = $request->except(['_token', 'send']);  //except: lấy tất cae ngoại trừ..
            $payload['user_id'] = Auth::id();
            $language = $this->languageRepository->create($payload);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function update($id, $request){
        DB::beginTransaction();
        try {
            $payload = $request->except(['_token', 'send']);  //except: lấy tất cae ngoại trừ..
            $language = $this->languageRepository->update($id, $payload);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function destroy($id){
        DB::beginTransaction();
        try {
            $language = $this->languageRepository->delete($id);  //foreDelete: thay chỗ delete nếu muốn xóa cứng
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function updateStatus($post = []){
        DB::beginTransaction();
        try {
            $payload = [
                $post['field'] => (($post['value'] == 1) ? 2 : 1)  //khac video
            ];
            $language = $this->languageRepository->update($post['modelId'], $payload);
            // $this->changeUserStatus($post, $post['field']);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function updateStatusAll($post){
        DB::beginTransaction();
        try {
            $payload = [
                $post['field'] => $post['value']
            ];
            $flag = $this->languageRepository->updateByWhereIn('id', $post['id'], $payload);
            // $this->changeUserStatus($post, $post['value']);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    // private function changeUserStatus($post, $value ){
    //     DB::beginTransaction();
    //     try {
    //         $array = [];
    //         if (isset($post['modelId'])) {
    //             $array[] = $post['modelId'];
    //         } else {
    //             $array = $post['id'];
    //         }
    //         $payload[$post['field']] = $value;
    //         $this->userRepository->updateByWhereIn('user_catalogue_id', $array, $payload);

    //         DB::commit();
    //         return true;
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return false;
    //     }

    // }

    private function paginateSelect(){
        return [
            'id',
            'name',
            'canonical',
            'publish',
            'image'
        ];
    }
}
