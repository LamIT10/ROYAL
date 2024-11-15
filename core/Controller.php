<?php
class Controller{
    public function renderView($layoutPath, $content = "",$data = []){
      extract($data);
      $content = VIEW_FOLDER . $content . ".php";
      require VIEW_FOLDER . "layout/" . $layoutPath . ".php";
    }
    public function loadModel($modeName){
      require MODEL_FOLDER . $modeName . ".php";
    }
}
?>