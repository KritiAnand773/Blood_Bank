<?php
include 'db_con.php';
session_start();
$data = [];
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['select_city']) && isset($_POST['blood_group'])){
    $city = $_POST['select_city'];
    $blood_group = $_POST['blood_group'];
    $sql = "select * from users where town = ? and bloodtyp = ?";
    //prepare statement
    $stmt = $conn->prepare($sql);
    //bind parameters
    $stmt->bind_param("ss", $city, $blood_group);
    //execute statement
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation</title>
    <link rel="stylesheet" href="style.css">
    <!-- swiper css link  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <style>
        .dataTables_wrapper {
            position: relative;
            clear: both;
            margin-top: 5rem;
        }
    </style>
</head>
<body>

<section class="home">
    <!-- Header -->
    <section class="header">
        <nav>
            <ul>
                <li>Blood Donation Initiative</li>
                <li><a href="home.php">Home</a><a href="stock_available.php">Available Stock</a><a href="blood_donation_camp.php">Blood Donation</a><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </section>

    <!-- Blood Availability -->
    <div class="container">
        <div class="stock_blood">
            <h1>BLOOD STOCK AVAILABILITY</h1>
            <hr>
            <h3>Search Blood Stock</h3>
            <section class="stock_data">
                <div class="stock_item">
                <form action="" method="post">
                    <div class="form-group">
                        <select class="stock" name="select_state" required>
                            <option>Select State</option>
                            <option>Uttar Pradesh</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="stock" name="select_city" required>
                            <option>Select city</option>
                            <option value="Agra">Agra</option>
                            <option value="Ambedkar Nagar">Ambedkar Nagar</option>
                            <option value="Amethi">Amethi</option>
                            <option value="Amroha">Amroha</option>
                            <option value="Auraiya">Auraiya</option>
                            <option value="Ayodhya">Ayodhya</option>
                            <option value="Azamgarh">Azamgarh</option>
                            <option value="Baghpat">Baghpat</option>
                            <option value="Bahraich">Bahraich</option>
                            <option value="Ballia">Ballia</option>
                            <option value="Balrampur">Balrampur</option>
                            <option value="Banda">Banda</option>
                            <option value="Bara Banki">Bara Banki</option>
                            <option value="Bareilly">Bareilly</option>
                            <option value="Basti">Basti</option>
                            <option value="Bhadohi">Bhadohi</option>
                            <option value="Bijnor">Bijnor</option>
                            <option value="Budaun">Budaun</option>
                            <option value="Bulandshahr">Bulandshahr</option>
                            <option value="Chandauli">Chandauli</option>
                            <option value="Chitrakoot">Chitrakoot</option>
                            <option value="Deoria">Deoria</option>
                            <option value="Etah">Etah</option>
                            <option value="Etawah">Etawah</option>
                            <option value="Ghazipur">Ghazipur</option>
                            <option value="Gonda">Gonda</option>
                            <option value="Ghaziabad">Ghaziabad</option>
                            <option value="Varanasi">Varanasi</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <select class="stock" name="blood_group" required>
                            <option>Select Blood Group</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>
                    </div>
                    <div class="submit">
                        <button>Search</button>
                    </div>
                </form>
            </section>

            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Donor Name</th>
                        <th>Blood Type</th>
                        <th>Contact</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Loop through your data and display it in the table
                        if (!empty($data)) {
                            foreach ($data as $index => $row) {
                                if($row['fname'] == $_SESSION['name']){
                                    continue;
                                }
                                echo 
                                '<tr>
                                    <td>' . ($index + 1) . '</td>
                                    <td>' . htmlspecialchars($row["fname"] . ' ' . $row["lname"]) . '</td>
                                    <td>' . htmlspecialchars($row["bloodtyp"]) . '</td>
                                    <td>' . htmlspecialchars($row["phoneno"]) . '</td>
                                    <td>' . htmlspecialchars($row["house"] . ', ' . $row["town"] . ', ' . $row["district"] . ', ' . $row["pin"]) . '</td>
                                </tr>';
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.1.js" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    })
</script>

</body>
</html>
