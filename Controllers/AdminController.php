<?php

class AdminController {

    private $_model;

    public function __construct(){

        try{

            $this->_model = new AdminModel;

        }catch(PDOException $e){

            throw Exception($e->getMessage(), 0, $e);

        }
    }
        
    public function login(){
        self::landingConnection();
    }

    public function check($post){
        self::userConnect($post);
    }

    public function dashboard(){
        self::mainMenu();
    }

    public function manageSection(){
        self::section();  
    }

    public function manageGalerie(){
        self::galeriebis();
    }

    public function manageCarousel($id){   
        self::carouselbis($id);
    }

    public function manageCategorie(){
        self::categorie();    
    }

    public function manageForm($status){
        self::formulaire($status);
    }

    public function manageEvent(){
        self::evenement();     
    }

    public function editSection($id){
        self::edit($id); 
    }

    public function editGalerie($id){
        self::modify($id);
    }

    // public function editCategorie($id){
    //     // self::change($id);
    //     self::carousel($id);
    // }

    public function deleteGalerie($id){
        // $ModelName = 'Galleries';
        self::delete($id);
        // self::delete($id, $ModelName);
    }

    private function landingConnection(){

        # Check  if user already connected in session and give him access to the dashboard else redirect to login form
        if(empty($_SESSION[APP_TAG]['connected'])){

            include './Views/Login/index.php';

        }else{

        header('Location:./index.php?ctrl=admin&action=dashboard');
        exit;
        }

    }

    private function userConnect($post){
        try{

            $this->_model = new LoginModel;
            
            extract($post);

            if(empty($_SESSION[APP_TAG]['connected'])){

                    if(!empty($login) && !empty($password)){

                            $userCheck = $this->_model->connexion($login, $password);
                            
                            if(($userCheck) !== false){

                                $user = new Login($userCheck);

                                if($user){
                                    
                                    $_SESSION[APP_TAG]['connected'] = serialize($user);

                                    header('Location: ./index.php?ctrl=admin&action=dashboard');

                                }else{
                                    header('Location: ./index.php?ctrl=admin&action=login');
                                    exit;
                                }
                                
                            }else{
                                header('Location: ./index.php?ctrl=admin&action=login');
                                exit;
                                } 
                   
                    }else{

                        header('Location: ./index.php?ctrl=admin&action=login');
                        exit;
                    } 

            }else{
                header('Location: ./index.php?ctrl=admin&action=dashboard');
            }

        }catch(PDOException $e){
      
            throw new Exception($e->getMessage(), 0 , $e);

        } 

    }

    private function mainMenu(){
    
        $page = 'Dashboard';

        include './Views/Login/welcome.php';

    }

    private function section(){

        $page = 'section';
        try{

            $this->_model = new SectionsModel;
            $datas = $this->_model->readAll();
            $sections = [];

            if(count($datas) > 0 ){
                foreach ($datas as $data) {
                  $sections[] = new Sections($data);
                }
            }

            include './Views/Section/main.php';  

            

        }catch(PDOException $e){
 
        throw new Exception($e->getMessage(), 0 , $e);
        }

    }

    private function edit($id){

        $page = 'section';
        try{
            $this->_model = new SectionsModel;
            $datas = $this->_model->readOne($id);

            if(count($datas) > 0 ){
            $section = new Sections($datas);
            }
            
            include './Views/Section/edit.php';

        }catch(PDOException $e){
 
            throw new Exception($e->getMessage(), 0 , $e);
        }
        
    }

    private function modify($id){

        $page = 'galerie';
        try{
            $this->_model = new GalleriesModel;
            $datas = $this->_model->readOne($id);

            if(count($datas) > 0 ){
            $galerie = new Galleries($datas);
            }
            
            include './Views/Gallery/edit.php';

        }catch(PDOException $e){
 
            throw new Exception($e->getMessage(), 0 , $e);
        }

    }


    private function galerie(){

        $page = 'galerie';

        try{

            $this->_model = new GalleriesModel;
            $datas = $this->_model->readAllAdmin();
            $galeries = [];

            if(count($datas) > 0 ){
                foreach ($datas as $data) {
                  $galeries[] = new Galleries($data);
                }
            }

            include './Views/Gallery/main.php';

        }catch(PDOException $e){
 
        throw new Exception($e->getMessage(), 0 , $e);
        }
    }

    private function galeriebis(){

        $page = 'galerie';

        try{

            $pagination = PAGINATION;

            $currentPage = 1;
            if(!empty($_GET['page']) && ctype_digit($_GET['page'])) {
              $currentPage = $_GET['page'];
            }

            $limit = $pagination*($currentPage-1);            

            $this->_model = new GalleriesModel;
            $datas = $this->_model->readAllAdminPagination($limit, $pagination);
            $galeries = [];

            if(count($datas) > 0 ){
                foreach ($datas as $data) {
                  $galeries[] = new Galleries($data);
                }
            }

            include './Views/Gallery/main.php';

        }catch(PDOException $e){
 
        throw new Exception($e->getMessage(), 0 , $e);
        }
    }


    private function delete($id){

        try{
            
            $this->_model = new GalleriesModel;

            $del = $this->_model->delete($id);
    
            if($del){
            header('Location: ./index.php?ctrl=admin&action=manageGalerie');
            }else{
            header('Location: ./index.php?ctrl=admin&action=manageGalerie');
            }            

        }catch(PDOException $e){
 
            throw new Exception($e->getMessage(), 0 , $e);
        }

    }

    private function carousel($id){

        $page = 'categorie';

        try{

            $this->_model = new CarouselsModel;
            $datas = $this->_model->readAllFromCat($id);
            $carousels = [];

            if(count($datas) > 0 ){
                foreach ($datas as $data) {
                  $carousels[] = new Carousels($data);
                }
            }

            $this->_model = new CategoriesModel;
            $datas = $this->_model->readAll();
            $categories = [];

            if(count($datas) > 0 ){

                foreach ($datas as $data) {
                $categories[] = new Categories($data);
                }

            }

            include './Views/Carousel/list.php';

        }catch(PDOException $e){
 
        throw new Exception($e->getMessage(), 0 , $e);
        }

    }

    private function carouselbis($id){

        $page = 'categorie';

        try{

            $pagination = PAGINATION;

            $currentPage = 1;
            if(!empty($_GET['page']) && ctype_digit($_GET['page'])) {
              $currentPage = $_GET['page'];
            }

            $limit = $pagination*($currentPage-1);            

            $this->_model = new CarouselsModel;
            // $datas = $this->_model->readAllFromCat($id);
            $datas = $this->_model->readAllFromCatPagination($id, $limit, $pagination);
            $carousels = [];

            if(count($datas) > 0 ){
                foreach ($datas as $data) {
                  $carousels[] = new Carousels($data);
                }
            }

            $this->_model = new CategoriesModel;
            $datas = $this->_model->readAll();
            $categories = [];

            if(count($datas) > 0 ){

                foreach ($datas as $data) {
                $categories[] = new Categories($data);
                }

            }

            include './Views/Carousel/list.php';

        }catch(PDOException $e){
 
        throw new Exception($e->getMessage(), 0 , $e);
        }

    }

    private function categorie(){

        $page = 'categorie';

        try{

            $this->_model = new CategoriesModel;
            $datas = $this->_model->readAll();
            $categories = [];

            if(count($datas) > 0 ){

                foreach ($datas as $data) {
                $categories[] = new Categories($data);
                }

            }

            include './Views/Carousel/main.php';

        }catch(PDOException $e){
 
            throw new Exception($e->getMessage(), 0 , $e);

        }
    }


    private function formulaire($status){

        $page = 'formulaire';

        try{

            $status = 1;
            $this->_model = new OrdersModel;
            $datas = $this->_model->readOrdersBy($status);
            $orders = [];

            if(count($datas) > 0 ){
                foreach ($datas as $data) {
                  $orders[] = new Orders($data);
                }
            }

            include './Views/Form/main.php';

        }catch(PDOException $e){
 
        throw new Exception($e->getMessage(), 0 , $e);
        }

    }

    public function evenement(){

        $page = 'event';

        try{

            $this->_model = new EventsModel;
            $datas = $this->_model->readAll();
            $events = [];

            if(count($datas) > 0 ){
                foreach ($datas as $data) {
                $events[] = new Events($data);
                }
            }

        include './Views/Event/index.php';

        }catch(PDOException $e){
 
        throw new Exception($e->getMessage(), 0 , $e);
        }
    }


}
