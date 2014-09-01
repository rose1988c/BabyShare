<?php
/**
 * BabyPhotoController.php
 * 
 * @author: Cyw
 * @email: chenyunwen01@bianfeng.com
 * @created: 2014-9-1 下午5:44:37
 * @logs: 
 *       
 */
namespace App\Controllers\Manage;

use BaseController;
use View;
use \PhotoModel;
use \BabyModel;
use Input;

class PhotoController extends BaseController
{
    protected $layout = 'layouts.manage';
    private $resourceUrl = 'manage/photo/';
    
    // restfull
    /**
     * Display a listing of the resource.
     * GET /tags
     *
     * @return Response
     */
    public function index()
    {
        View::share('resourceUrl', $this->resourceUrl);
        
        $photos = PhotoModel::all()->toArray();
        $this->layout->with('title', '列表');
        $this->layout->content = View::make( $this->resourceUrl . 'index' )->with(compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     * GET /user/create
     *
     * @return Response
     */
    public function create()
    {
        $babys = BabyModel::all()->lists('nickname', 'id');
        
        return View::make($this->resourceUrl . 'create')->with(compact('babys'));
    }

    /**
     * Store a newly created resource in storage.
     * POST /tags
     *
     * @return Response
     */
    public function store()
    {
        if (is_super_admin()){
            $res = PhotoModel::create(Input::all());
            $code = is_object($res) ? 0 : 1;
            return $this->toJson('创建成功!', $code);
        } else {
            return $this->toJson('您没有权限!', 1);
        }
    }

    /**
     * Display the specified resource.
     * GET /user/{id}
     *
     * @param int $id            
     * @return Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     * GET /user/{id}/edit
     *
     * @param int $id            
     * @return Response
     */
    public function edit($id)
    {
        $photo = PhotoModel::find($id)->toArray();
        
        return View::make('manage.photo.edit')->with(compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     * PUT /user/{id}
     *
     * @param int $id            
     * @return Response
     */
    public function update($id)
    {
        if(is_super_admin()) {
            $res = PhotoModel::where('id', $id)->update(Input::all());
            $code = $res > 0 ? 0 : 1;
            return $this->toJson('更新成功!', $code);
        } else {
            return $this->toJson('您没有权限!', 1);
        }
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /user/{id}
     *
     * @param int $id            
     * @return Response
     */
    public function destroy($id)
    {
        if(is_super_admin()) {
            $res = PhotoModel::where('id', $id)->first();
            $res = $res->forceDelete();
            $code = $res > 0 ? 0 : 1;
            return $this->toJson('删除成功!', $code);
        } else {
            return $this->toJson('您没有权限!', 1);
        }
    }
}