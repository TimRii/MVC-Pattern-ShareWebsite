<?php //Verstanden
class Home extends Controller{ //Erbt vom Papa Controller
	protected function Index(){
		$viewmodel = new HomeModel();
		$this->returnView($viewmodel->Index(), true); //Wird in der main.php aufgerufen
	}
}