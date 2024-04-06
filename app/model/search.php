<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

function connectdb()
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "cozastore-master";

	try {
		$conn = new PDO("mysql:host=$servername;port=3306;dbname=" . $database, $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo "Connected successfully";
		return $conn;
	} catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
}

$conn = connectdb();

//prepare sql query
if (isset($_POST["query"])) {
	$search = $_POST["query"];
	$sql = "SELECT * FROM product 
			WHERE name LIKE '%" . $search . "%'";
} else {
	$sql = "SELECT * FROM product ORDER BY id";
}

$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll(); // lấy nhiều dòng

$output = '';
if (count($result) > 0) {
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Customer Name</th>
						</tr>';
	foreach ($result as $row) {
		$output .= '
			<tr>
				<td>' . $row["name"] . '</td>
			</tr>
		';
	}
	echo $output;
} else {
	echo 'Data Not Found';
}
