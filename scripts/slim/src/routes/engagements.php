<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$app = new \Slim\App;

//Get all engagements

$app->get('/api/engagements', function(Request $request, Response $response){
	$sql = "SELECT
	clients.date,
	clients.company_name,
	clients.relationship_owner,
	clients.ref,
	clients.company_reg_number,
	engagements.id,
	engagements.assurance,
	engagements.date_resigned,
	engagements.editable,
	engagements.companies_act,
	engagements.engagement_date,
	services.`name` AS service_name,
	services.type AS service_type
FROM
	clients ,
	engagements ,
	services
WHERE
	clients.active_status = '1' AND
	(clients.ref = engagements.client or clients.id = engagements.client) AND
	engagements.engagement_type = services.id AND engagements.resigned='No'
ORDER BY
engagements.id DESC
";
	
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







//Get all clients

$app->get('/api/clients', function(Request $request, Response $response){
	$sql = "SELECT
	*
FROM
	clients 
WHERE
	clients.active_status = '1' 
ORDER BY
clients.company_name ASC
";
	
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




//Search client name

$app->get('/api/clientSearch', function(Request $request, Response $response){
	$name = $request->getParam('name');
	$sql = "SELECT
	*
FROM
	clients 
WHERE
	clients.active_status = '1' AND 
	clients.company_name like '$name%'
ORDER BY
clients.company_name ASC
";
	
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









//Get engagements by client name

$app->get('/api/search_engagements_name', function(Request $request, Response $response){
	
	$name = $request->getParam('name');
	
	
	$sql = "SELECT
	clients.date,
	clients.company_name,
	clients.relationship_owner,
	clients.ref,
	clients.company_reg_number,
	engagements.id,
	engagements.assurance,
	engagements.date_resigned,
	engagements.editable,
	engagements.companies_act,
	engagements.engagement_date,
	services.`name` AS service_name,
	services.type AS service_type
FROM
	clients ,
	engagements ,
	services
WHERE
clients.active_status = '1' AND
	(clients.ref = engagements.client or clients.id = engagements.client) AND
	engagements.engagement_type = services.id AND 
	clients.company_name like '$name%' AND engagements.resigned='No'
ORDER BY
engagements.id DESC
";
	
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







$app->get('/api/test', function(Request $request, Response $response){
	$sql = "SELECT * FROM `engagements`";
	
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



//Terminate engagement

$app->put('/api/engagements/terminate/{id}', function(Request $request, Response $response){
	
	$id = $request->getAttribute('id');
	
	
	$resigned = "Yes";
	
	$sql = "update engagements set resigned = :resigned where id = '$id'";
	
	try{
		//Get database object
		$db = new db();
		//Connect
		$db = $db->connect();
		
		$stmt = $db->prepare($sql);
		
		$stmt->bindParam(':resigned', $resigned);
		
		$stmt->execute();
		
		echo '{"notice": {"Text": "Engagement Resigned"}}';
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
