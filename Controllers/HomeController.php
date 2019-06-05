    <?php

class HomeController {

    private $_model;

    public function __construct(){

        try{

            $this->_model = new HomeModel;

        }catch(PDOException $e){

            throw Exception($e->getMessage(), 0, $e);

        }
    }
        
    public function index(){

      self::landing();
      self::section();
      self::galerie();
      self::carousel();

    }

    private function landing(){

        include './Views/Landing/index.php';

    }

    private function section(){

        try{

            $this->_model = new SectionsModel;
            $datas = $this->_model->readAll();
            $sections = [];

            if(count($datas) > 0 ){
                foreach ($datas as $data) {
                  $sections[] = new Sections($data);
                }
            }

            include './Views/Section/index.php';

        }catch(PDOException $e){
 
        throw new Exception($e->getMessage(), 0 , $e);
        }

    }

    private function galerie(){

        try{

            $this->_model = new GalleriesModel;
            $datas = $this->_model->readAll();
            $galleries = [];

            if(count($datas) > 0 ){
                foreach ($datas as $data) {
                 $galleries[] = new Galleries($data);
                }
            }

            include './Views/Gallery/index.php';

        }catch(PDOException $e){

        throw new Exception($e->getMessage(), 0 , $e);
        }

    }

    private function carousel(){
       
        try{

            $this->_model = new CarouselsModel;

            
            $datas = $this->_model->readVisible();
            $carousels = [];

            if(count($datas) > 0 ){
                foreach ($datas as $data) {
                 $carousels[] = new Carousels($data);
                }
            }

            include './Views/Carousel/index.php';

        }catch(PDOException $e){
 
        throw new Exception($e->getMessage(), 0 , $e);
        }
    }

    private function form(){

    }





}
