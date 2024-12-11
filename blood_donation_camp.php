<?php
include 'db_con.php';
$data = [];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $city = $_POST['select_city'];
    $state = $_POST['select_state'];
    $sql = "select * from donation_camps where town=?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s",$city);
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
        /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f7f7f7;
    color: #333;
}

/* Header Section */
.header {
    background-color: #bf2229;
    color: white;
    padding: 15px 0;
    text-align: center;
}

.header nav ul {
    list-style-type: none;
    display: flex;
    justify-content: center;
    gap: 30px;
}

.header nav ul li {
    font-size: 1.1rem;
    /* font-weight: bold; */
}

.header nav ul li a {
    color: white;
    text-decoration: none;
    transition: color 0.3s ease;
}

.header nav ul li a:hover {
    color: #f0f0f0;
}
.logo{
    display:flex;
    margin-right:700px;
}

/* Blood Donation Camp Section */
.container {
    display: flex;
    justify-content: center;
    padding: 2rem;
}

.stock_blood {
    background-color: white;
    border-radius: 8px;
    padding: 2rem;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 800px;
}

.stock_blood h1 {
    text-align: center;
    font-size: 2.5rem;
    margin-bottom: 1rem;
    color: #333;
}

.stock_blood h3 {
    text-align: center;
    color: #bf2229;
    font-size: 1.4rem;
    margin-bottom: 1rem;
}

hr {
    margin: 1rem 0;
    border: 1px solid #ddd;
}

/* Form Section */
.stock_data {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group label {
    font-size: 1rem;
    color: #333;
    margin-bottom: 5px;
}

select {
    padding: 12px;
    border-radius: 5px;
    border: 1px solid #ddd;
    font-size: 1rem;
    width: 100%;
}

.submit {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.submit button {
    padding: 12px 30px;
    background-color: #bf2229;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 1.2rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.submit button:hover {
    background-color: #a83f3f;
}

/* Table Section */
.table-container {
    margin-top: 2rem;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    padding: 2rem;
    width: 100%;
    max-width: 1000px;
}

.table-container h3 {
    text-align: center;
    font-size: 2rem;
    margin-bottom: 1rem;
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 1rem;
}

table th,
table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

table th {
    background-color: #f4f4f4;
    color: #bf2229;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tr:hover {
    background-color: #f1f1f1;
}

/* DataTable Styling */
.dataTables_wrapper .dataTables_filter input {
    font-size: 1rem;
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #ddd;
}

        </style>
</head>
<body>

<section class="home">
    <!-- Header -->
    <section class="header">
        <nav>
            <ul>
                <li class="logo">Blood Donation Initiative</li>
                <li><a href="home.php">Home</a></li>
                <li><a href="stock_available.php">Available Stock</a><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </section>

    <!-- Blood Donation Camp Section -->
    <div class="container">
        <div class="stock_blood">
            <h1>BLOOD DONATION CAMP</h1>
            <hr>

            <h3>Search Donation Camp</h3>
            <form method="POST" action="">
                <section class="stock_data">
                    <div class="form-group">
                        <label for="state">Select State</label>
                        <select id="state" name="select_state" required>
                            <option>Select State</option>
                            <option>Uttar Pradesh</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="district">Select District</label>
                        <select id="district" name="select_city" required>
                            <option>Select District</option>
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
                </section>

                <div class="submit">
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>

        <!-- Blood Donation Camp Table -->
        <div class="table-container">
            <h3>Camp Details</h3>
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Camp Name</th>
                        <th>City</th>
                        <th>District</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Loop through your data and display it in the table
                        if (!empty($data)) {
                            foreach ($data as $index => $row) {
                                echo 
                                '<tr>
                                    <td>' . ($index + 1) . '</td>
                                    <td>' . htmlspecialchars($row["hospital"]) . '</td>
                                    <td>' . htmlspecialchars($row["town"]) . '</td>
                                    <td>' . htmlspecialchars($row["district"]) . '</td>
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
