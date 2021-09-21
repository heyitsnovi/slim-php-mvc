<?php

namespace AppControllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;



class Blog {

  private $renderer;
  private $db = NULL;


	public function __construct(){

		$this->renderer = new PhpRenderer(VIEW_PATH);
		$this->db = db();

	}

	public function index(Request $request, Response $response,$args){
 
       $artists = $this->db->from('artist_info')->fetchAll();

       $this->db->close();

        return $this->renderer->render($response, "blogs/blogs.php", [
        	'base_url' => '',
        	'artists'=>$artists
        ]);
	 	
		return $response;
	}


	public function add_blog(Request $request, Response $response ,$args){

		return $this->renderer->render($response, "blogs/add-blog.php", []);

	}



	public function view_blog(Request $request, Response $response , $args){


	    $artist_info = $this->db->from('artist_info')->where('id', $args['blog_id'])->fetch();

	    $this->db->close();

        return $this->renderer->render($response, "blogs/view-blog.php", ['artist_details' =>$artist_info  ]);

	}



	public function save_blog(Request $request, Response $response , $args){

		$post_params = (array) $request->getParsedBody();

		$new_artist_info = [
			'name' =>$post_params['artist_name'],
			 'age' => $post_params['artist_age'], 
			 'photo' =>$post_params['artist_photo'],
			 'gender'=>$post_params['artist_gender']
			];       

	    $query = $this->db->insertInto('artist_info')->values($new_artist_info);    

	    $insert_id = $query->execute();

		    if($insert_id){

		    	  return $response->withHeader('Location', '/blogs/view/'.$insert_id);
		    }
	
	}

}