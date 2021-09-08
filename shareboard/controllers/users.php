<?php //Verstanden
class Users extends Controller{
	protected function register(){ //Register Action
	    $viewmodel = new UserModel();
	    $this->returnView($viewmodel->register(), true);
    }
    protected function login(){ //Login Action
        $viewmodel = new UserModel();
        $this->returnView($viewmodel->login(), true);
    }
    protected function logout(){ //Logout Action
	    unset($_SESSION['is_logged_in']); //Entfernung/Löschung
        unset($_SESSION['user_data']);
        session_destroy();
        //Zurück auf Hauptseite
        header("Location: ".ROOT_URL);
    }
}