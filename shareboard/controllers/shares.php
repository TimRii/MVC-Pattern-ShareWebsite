<?php //Verstanden
class Shares extends Controller{ //besitzt zwei Actions index und add
	protected function Index(){
		$viewmodel = new ShareModel();
		$this->returnView($viewmodel->Index(), true); //Wird in der main.php aufgerufen
	}
    protected function add(){
	    if(!isset($_SESSION['is_logged_in'])){
            header("Location: ".ROOT_URL.'shares');
        }
        $viewmodel = new ShareModel();
        $this->returnView($viewmodel->add(), true); //Wird in der main.php aufgerufen
    }
}