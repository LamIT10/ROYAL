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
    public function detail()
    {
        $title = "Chi tiết bình luận";
        $list = $this->comment->getCommentDetail($_GET['id']);
        $content = "admin/comment/detail";
        $layoutPath = "admin_layout";
        $this->renderView($layoutPath, $content, ['list' => $list, 'title' => $title]);
    }
    public function delete()
    {
        $this->comment->delete("comment_id = :comment_id", ["comment_id" => $_GET['id']]);
        $_SESSION['success'] = true;
        $_SESSION['message'] = "Xóa bình luận thành công";
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
}
