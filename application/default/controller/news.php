<?php
class Default_Controller_News extends Default_Controller_Base{

    public function init(){
            $this->view->setLayout("default");
    }

    public function index(){
        $alias = Fw_Request::request("alias");
        $item = News::model()->find("alias=:alias and status = 0", array("alias" => $alias));
        if(!$item){
            $this->view->param =  array('code' => '404', 'message' => $alias.' not found!');
            $this->view->renderPartial('index/error');
            return;
        }
        $relConditions = "";
        $relParam = array();
        $keys = explode(",", Fw_Helper::tagToKeywords($item->tags));
        $cnt = 1;
        foreach ($keys as $k) {
            $relConditions .= ($cnt == 1 ? "((" : ($cnt % 2 == 0 ? ") or (" : " and")) . " tags like :k{$cnt}";
            $relParam[":k$cnt"] = '%' . $k . '%';
            $cnt++;
        }
        $relConditions .= ($relConditions == "" ? "" : ")) and") . " status = 0 and id != {$item->id} order by inserted DESC, views DESC";

        $relates = News::model()->findAll($relConditions, $relParam, 0, 3);
        $this->view->relates = $relates;
        $this->view->item = $item;
        $this->view->owned = Fw_Helper::getActivedUser($item->updater);
        $this->view->renderPartial("detail");
    }

    public function popular(){
        $news = News::model()->findAll('status = :status order by inserted DESC, views DESC', array(':status' => 0));
        $this->view->news = $news;
        $this->view->renderPartial('popular');
    }

}