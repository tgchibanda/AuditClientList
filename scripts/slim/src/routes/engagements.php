<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$app = new \Slim\App;

//Get all engagements

$app->get('/api/engagements', function(Request $request, Response $response){
	 $sql = "SELECT
				clients.date,
				clients.company_name,
				engagements.id,
				clients.company_reg_number,
				engagements.assurance,
				engagements.date_resigned,
				engagements.editable,
				engagements.engagement_date,
				services.`name` AS service_name,
				services.type AS service_type
				FROM
				clients ,
				engagements ,
				services
				WHERE
				(clients.engagement_status = '1' OR
				clients.engagement_status = '2') AND
				clients.active_status = '1' AND
				clients.id = engagements.client AND
				engagements.engagement_type = services.id";
	 
	 try{
		 //Get database object
		 $db = new db();
		 //Connect
		 $db = $db->connect();
		 
		 $stmt = $db->query($sql);
		 $engagements = $stmt->fetchAll(PDO::FETCH_OBJ);
		 $db = null;
		 echo json_encode($engagements);
	 }
	 catch(PDOException $e){
		 echo '{"error": {"text": '.$e->getMessage().'}}';
	 }
});



//Get single customer

$app->get('/api/customer/{id}', function(Request $request, Response $response){
	
	 $id = $request->getAttribute('id');
	
	 $sql = "select * from users where id = $id";
	 
	 try{
		 //Get database object
		 $db = new db();
		 //Connect
		 $db = $db->connect();
		 
		 $stmt = $db->query($sql);
		 $customer = $stmt->fetchAll(PDO::FETCH_OBJ);
		 $db = null;
		 echo json_encode($customer);
	 }
	 catch(PDOException $e){
		 echo '{"error": {"text": '.$e->getMessage().'}}';
	 }
});


//Add customer

$app->post('/api/customer/add', function(Request $request, Response $response){
	 
	 $name = $request->getParam('name');
	 $surname = $request->getParam('surname');
	 
	 $sql = "insert into users (name, surname) values(:name, :surname)";
	 
	 try{
		 //Get database object
		 $db = new db();
		 //Connect
		 $db = $db->connect();
		 
		 $stmt = $db->prepare($sql);
		 
		 $stmt->bindParam(':name', $name);
		 $stmt->bindParam(':surname', $surname);
		 
		 $stmt->execute();
		 
		 echo '{"notice": {"Text": "Customer Added"}}';
	 }
	 catch(PDOException $e){
		 echo '{"error": {"text": '.$e->getMessage().'}}';
	 }
});


//Update engagement

$app->put('/api/engagements/update/{id}', function(Request $request, Response $response){
	
	 $id = $request->getAttribute('id');
	 
	 
	 $date_resigned = $request->getParam('date_resigned');
	 
	 $sql = "update engagements set date_resigned = :date_resigned where id = '$id'";
	 
	 try{
		 //Get database object
		 $db = new db();
		 //Connect
		 $db = $db->connect();
		 
		 $stmt = $db->prepare($sql);
		 
		 $stmt->bindParam(':date_resigned', $date_resigned);
		 
		 $stmt->execute();
		 
		 echo '{"notice": {"Text": "Engagement Updated"}}';
	 }
	 catch(PDOException $e){
		 echo '{"error": {"text": '.$e->getMessage().'}}';
	 }
});


//Delete single customer

$app->delete('/api/engagements/delete/{id}', function(Request $request, Response $response){
	
	 $id = $request->getAttribute('id');
	
	 $sql = "delete from users where id = $id";
	 
	 try{
		 //Get database object
		 $db = new db();
		 //Connect
		 $db = $db->connect();
		 
		 $stmt = $db->prepare($sql);
		 $stmt->execute();
		 $db = null;
		 
		 echo '{"notice": {"Text": "Customer deleted"}}';
	 }
	 catch(PDOException $e){
		 echo '{"error": {"text": '.$e->getMessage().'}}';
	 }
});

?>
