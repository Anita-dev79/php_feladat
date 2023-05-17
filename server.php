<?php
    $servername = "localhost";
    $dbName = "customer";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbName;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $get_list = isset($_POST['get_list']) ? $_POST['get_list'] : null;
    if ($get_list != null){
        if ($_POST['c_id'] == 0){
            $sql = $conn->query("select * from accounts");
        } else {
            $sql = $conn->query("select * from accounts where id=".$_POST['c_id']);
        }
        $customers = array();
        $i = 1;
        foreach ($sql as $row){
            $cust = array(
                "rowId" => $i,
                "id" => $row['id'],
                "name" => $row['name'],
                "address" => $row['address'],
                "accountId" => $row['accountId'],
                "date" => $row['contractDate']
            );
            $customers[] = $cust;
            $i++;
        }
        echo json_encode($customers);
    }
    $c_new = isset($_POST['c_new']) ? $_POST['c_new'] : null;
    if ($c_new != null){
        if (($_POST['name'] != "") && ($_POST['address'] !="") && ($_POST['contractDate'] != "")){
            try {
                $stmt = $conn->prepare('INSERT INTO accounts (name,address,accountId,contractDate) VALUES (?,?,?,?)');
                $stmt->execute([ $_POST['name'], $_POST['address'], $_POST['accountId'], $_POST['contractDate'] ]);
                echo "Success!";
            } catch(Exception $e) {
                echo "Unable to insert the record. Please try again!";
            }
        } else {
            if ($_POST['name'] == ""){
                echo "1";
                return;
            }
            if ($_POST['address'] == ""){
                echo "2";
                return; 
            }
            if ($_POST['contractDate'] == ""){
                echo "3";
            }
        }
    }
    $c_update = isset($_POST['c_update']) ? $_POST['c_update'] : null;
    if ($c_update != null){
        if (($_POST['name'] != "") && ($_POST['address'] !="") && ($_POST['contractDate'] != "")){
            try {
                $stmt = $conn->prepare('UPDATE accounts SET name=?,address=?,accountId=?,contractDate=? WHERE id=?');
                $stmt->execute([ $_POST['name'], $_POST['address'], $_POST['accountId'], $_POST['contractDate'],$_POST['id'] ]);
                echo "Success!";
            } catch(Exception $e) {
                echo "Unable to update the record. Please try again!";
            }
        } else {
            if ($_POST['name'] == ""){
                echo "1";
                return;
            }
            if ($_POST['address'] == ""){
                echo "2";
                return; 
            }
            if ($_POST['contractDate'] == ""){
                echo "3";
            }
        }
}
?>