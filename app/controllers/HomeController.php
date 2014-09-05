<?php
class HomeController extends BaseController
{
    protected $layout = 'layouts.index';
    
    public function index()
    {
        $photos = PhotoModel::orderBy('take_at', 'desc')->get()->toArray();
        $babys = BabyModel::all()->lists('nickname', 'id');
        $this->layout->with('title', 'index');
        $this->layout->content = View::make('index')->with(compact('photos', 'babys'));
    }
}