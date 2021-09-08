<?php //Verstanden
abstract class Controller{
	protected $request;
	protected $action;

	public function __construct($action, $request){
		$this->action = $action;
		$this->request = $request;
	}

	public function executeAction(){
		return $this->{$this->action}(); // Das was in $this->action drin steht, wird in $this hineingesetzt und zurückgegeben.
	}

	protected function returnView($viewmodel, $fullview){ //Seiten werden aufgerufen
		$view = 'views/'. get_class($this). '/' . $this->action. '.php'; //Beispiel localhost/shareboard/shares/add
		if($fullview){
			require('views/main.php');
		} else {
			require($view);
		}
	}
}