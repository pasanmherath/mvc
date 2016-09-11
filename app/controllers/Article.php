<?php

class Article extends Base_Controller{
    
    public function __construct() 
    {
        parent::__construct();
        if(empty($this->session->get('user_id')))
        {
            header('location: ../auth');
        }
    }
    
    public function addArticle()
    {
        if(isset($_POST['submit_btn']))
        {
            unset($_POST['submit_btn']);
            
            $this->loadLibrary('Gump');

            $gump = new GUMP();
            
            $gump->validation_rules(array(
                'title'    => 'required|max_len,100|min_len,6',
                'description' => 'required',
                'category' => 'required'
            ));

            $validated_data  = $gump->run($_POST);
            
            $imageValidation = $this->imageValidate($_FILES);

            if($validated_data === false || $imageValidation) 
            {
                $this->session->set('message', json_encode(array_merge($gump->get_readable_errors(false),$imageValidation)));
                header("location: ../article/addArticle");
            } else 
            {
                $_POST = $gump->sanitize($_POST);
                $_POST = $gump->xss_clean($_POST);
            
                $article = $this->loadModel('Article_model');
                
                $_POST['created_date'] = date('Y-m-d');
                $_POST['user_id']      = $this->session->get('user_id');
                          
                $articleId = $article->insertData('articles', $_POST);
                
                $temp        = explode(".", basename($_FILES["image"]["name"]));
                $newFileName = $articleId . '.' . end($temp);
                $uplodPath   = "public/uploads/" . $newFileName;
                move_uploaded_file($_FILES['image']['tmp_name'], $uplodPath);
                
                $article->updateData('articles', array('image_path' => $uplodPath), ' id='.$articleId);
               
                $this->session->set('message', 'Successfully article added.');
                header('location: ../article/manageArticles');
            }
        }
        
        $header['header']           = 'Add Article';
        $header['activeController'] = 'article';
        $header['activemethod']     = 'addArticle';
        
        $data['body']   = 'body';
        $this->loadView('includes/header',$header);
        $this->loadView('article/add_article', $data);
        $this->loadView('includes/footer');
    }
    
    public function manageArticles()
    {
        $data['category'] = "";
        $data['user']     = "";
        $data['status']   = "";
        $paramString      = "";
        
        if(isset($_GET['submit_btn']))
        {
            $data['category'] = $_GET['category'];
            $data['user']     = $_GET['user'];
            $data['status']   = $_GET['status'];
                       
        }
        
        if(isset($_GET['category']) && $_GET['category'] != "")
        {
            $paramString = "category=" . $_GET['category'] . "&";
            $data['category'] = $_GET['category'];
        }
        
        if(isset($_GET['status']) && $_GET['status'] != "")
        {
            $paramString .= "status=" . $_GET['status'] . "&";
            $data['status'] = $_GET['status'];
        }
        
        if(isset($_GET['user']) && $_GET['user'] != "")
        {
            $paramString .= "&user=" . $_GET['user'] . "&";
            $data['user'] = $_GET['user'];
        }
      
        $article = $this->loadModel('Article_model');
        $this->loadLibrary('Pagination');
        
        $pagination = new Pagination;
        
        $totalCount = $article->getArticleCount($data['category'], $data['user'], $data['status']);
        
        $currentPage = isset($_GET['pageNumber']) ? $_GET['pageNumber'] : 1;
        
        $startPage = ($currentPage-1)*PER_PAGE;
        
        if($startPage < 0) 
            $startPage = 0;
        
        
        $href = "../article/manageArticles?".$paramString;

        $data['articles'] = $article->getAllArticles($data['category'], $data['user'], $data['status'], $startPage, PER_PAGE);
        
        $data["pageLinks"] = $pagination->paginateResults($totalCount,$href);
        
        $data['users'] = $article->getUsers('id, full_name');
     
        $header['header']           = 'Manage Article';
        $header['activeController'] = 'article';
        $header['activemethod']     = 'manageArticles';
        
        $this->loadView('includes/header',$header);
        $this->loadView('article/manage_article', $data);
        $this->loadView('includes/footer');
        
    }
    
    private function imageValidate($data)
    {
        $errors= array();
        if(!empty($data['image']['name']))
        { 
            $fileName = $data['image']['name'];
            $fileSize = $data['image']['size'];
            $fileTmp  = $data['image']['tmp_name'];
            $fileType = $data['image']['type'];
            $imageFileType = pathinfo($data['image']['name'],PATHINFO_EXTENSION);

            $expensions= array("jpeg","jpg","png");

            if(in_array($imageFileType,$expensions)=== false)
            {
               $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }

            if($fileSize > MAX_FILE_SIZE*1024)
            {
               $errors[]='File size must be less or equel ' . MAX_FILE_SIZE . ' KB';
            }
        }
        return $errors;
    }
    
    public function deleteArticle($id)
    {
        $article = $this->loadModel('Article_model');
        //$article->deleteData('articles', 'id='.$id);
        
        header('location: ../manageArticles');
    }
    
    public function editArticle($id)
    {
        $article = $this->loadModel('Article_model');
        
        $data['article']  = $article->getArticleById($id);
        
        $data['body'] = 'body'; 
        $header['header']           = 'Edit Article';
        $header['activeController'] = 'article';
        $header['activemethod']     = 'editArticle';
        
        $this->loadView('includes/header',$header);
        $this->loadView('article/add_article', $data);
        $this->loadView('includes/footer');
    }

}

