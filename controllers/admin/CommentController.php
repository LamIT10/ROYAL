<?php
class CommentController extends Controller
{
    public $comment;
    public function __construct()
    {
        $this->loadModel("CommentModel");
        $this->comment = new CommentModel();
    }
    public function index()
    {
        $list = $this->comment->getAll();
        $title = "Quản lý bình luận";
        $content = "admin/comment/index";
        $layoutPath = "admin_layout";
        $this->renderView($layoutPath, $content, ['list' => $list, 'title' => $title]);
    }
}
