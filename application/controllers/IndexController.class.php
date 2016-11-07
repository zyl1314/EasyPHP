<?php

class IndexController extends Controller
{
    
    public function index()
    {
        $this->assign('title', 'Todolist');
    }
	
	public function infor($id){
		$this->assign('title', '详情');
		switch($id){
			case '1' : 
				$this->assign('content','记得做数学作业');
				break;
			case '2' :
				$this->assign('content','明早去跑步');
				break;
			case '3' :
				$this->assign('content','后天有其中考试');	
		}

	}
	
}