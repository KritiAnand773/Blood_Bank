
<!-- // include 'db_con.php';
//  if(isset($_POST['submit'])){
//      $state=$_POST['select_state'];
//      $city=$_POST['select_city'];
//      $bgroup=$_POST['blood_group'];
//      $sql="insert into blood_groups(state,city,blood_group) values('$state','$city','$bgroup')";
//      if(mysqli_query($conn,$sql)){
//         echo "<script>alert('new record inserted')</script>";
//     }
//     else{
//          echo "error:".$sql."<br>".mysqli_error($conn);
//     }
//     mysqli_close($conn); 
// } -->
<?php
include 'db_con.php'; // Ensure this file establishes $conn

if (isset($_POST['submit'])) {
    // Check if all the fields are set and retrieve the data
    $state = isset($_POST['select_state']) ? $_POST['select_state'] : null;
    $city = isset($_POST['select_city']) ? $_POST['select_city'] : null;
    $bgroup = isset($_POST['blood_group']) ? $_POST['blood_group'] : null;

    // Validate inputs
    if ($state === "select_state" || $city === "select_city" || $bgroup === "blood_group" || !$state || !$city || !$bgroup) {
        echo "<script>alert('Please select valid options');</script>";
        exit;
    }

    // Debugging: Output received data for confirmation
    echo "State: $state, City: $city, Blood Group: $bgroup<br>";

    // Use prepared statement to insert data
    try {
        $stmt = $conn->prepare("INSERT INTO blood_groups (state, city, blood_group) VALUES (?, ?, ?)");
        if (!$stmt) {
            throw new Exception("Failed to prepare statement: " . $conn->error);
        }

        $stmt->bind_param("sss", $state, $city, $bgroup);

        if ($stmt->execute()) {
            echo "<script>alert('New record inserted successfully');</script>";
        } else {
            throw new Exception("Execution failed: " . $stmt->error);
        }

        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
} else {
    echo "<script>alert('Form not submitted correctly.');</script>";
}
?>

