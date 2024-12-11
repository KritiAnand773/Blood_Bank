<?php
    session_start();
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
    
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

</head>
<body>

<section class="home">
    
    <!-- Header -->
    <section class="header">
        <nav>
            <ul>
                <li>Blood Donation Initiative</li>
                <li>
                    <a href="index.php">Home</a>
                    <?php
                        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                            echo '
                            <a href="index.php" style="pointer-events:none;cursor:default;text-decoration:none;">Welcome &nbsp' . $_SESSION['name'] . ' </a>
                            <a href="logout.php" class="login-btn">Logout</a>
                            ';                    
                        }
                        else{
                            echo '
                            <a href="donor-register.php">Register</a>
                            <a href="login.php" class="login-btn">Login</a>
                            ';
                        }
                    ?>
                </li>
                
            </ul>
        </nav>
    </section>

    <!-- Landing Page Content -->
    
        <div class="swiper home-slider">
            <div class="swiper-wrapper">
              <div class="swiper-slide"><img src="images/image1.jpg" alt=""></div>
              <div class="swiper-slide"><img src="images/image2.jpeg" alt=""></div>
              <div class="swiper-slide"><img src="images/image3.jpeg" alt=""></div>
              <div class="swiper-slide"><img src="images/image2.jpeg" alt=""></div>
            </div>
            <div class="swiper-button-next text-danger"></div>
            <div class="swiper-button-prev text-danger"></div>
            <div class="swiper-pagination"></div>
          </div>
    
    
    <div class="info">
        <p class="heading">About Our Work</p>
        <div class="title-dash"></div>
        <p>We have successfully organized multiple blood donation camps and saved countless lives. Join us in making a difference.
        We never charge for blood donations. Don't pay for blood; it's a selfless act.<hr>
        
        हमने कई रक्तदान शिविरों का सफलतापूर्वक आयोजन किया है और अनगिनत लोगों की जान बचाई है। बदलाव लाने में हमारे साथ जुड़ें।
        हम रक्तदान के लिए कभी शुल्क नहीं लेते। खून के लिए भुगतान मत करो; यह एक निस्वार्थ कार्य है.
        </p>
    </div>
    <div class="options">
        <a href="donor-register.php" class="btn">Register as Donor</a>
        <a href="stock_available.php" class="btn">Find a Donor</a>
    </div>
    <p class="heading">About Us</p>
    <div class="title-dash"></div>

    <div class="content">
        <div class="image">
            <img src="images/image5.jpeg" alt="error">
        </div>
        <div class="column">
            <div class="item">
                <div class="logo"><i class="fa-brands fa-searchengin"></i></div>
                <div class="details">
                    <p class="points">quick search:</p>
                    <p>Search feature finds blood donors for you easily. Enter your location and you will find all the donors in the area.<hr>      
                    खोज सुविधा आपके लिए रक्तदाताओं को आसानी से ढूंढ लेती है। अपना स्थान दर्ज करें और आपको क्षेत्र के सभी दानदाता मिल जाएंगे।</p>
                </div>
            </div>
            <div class="item">
                <div class="logo"><i class="fa-solid fa-heart-pulse"></i></div>
                <div class="details">
                    <p class="points">Real-time connect:</p>
                    <p>No delays in receiving blood anymore. Connect with donors and recipients in real-time.<hr>
                    रक्त प्राप्त करने में अब कोई देरी नहीं होगी। वास्तविक समय में दाताओं और प्राप्तकर्ताओं से जुड़ें।</p>
                </div>
            </div>
            <div class="item">
                <div class="logo"><i class="fa-solid fa-bell"></i></div>
                <div class="details">
                    <p class="points">Notifications:</p>
                    <p>Get updates on blood requests so that you are informed the moment a donor is available or a request is made.<hr>
                    रक्त अनुरोधों पर अपडेट प्राप्त करें ताकि दाता उपलब्ध होने या अनुरोध किए जाने पर आपको सूचित किया जा सके।</p>
                </div>
            </div>
        </div>
    </div>

    

    <section class="packages">
        <div class="info">
            <p class="heading">Tips</p>
            <div class="para" style="margin-bottom: .5rem;">Here are some tips to put your mind at ease during the blood donation process</div>
            <div class="title-dash" style="width:20rem;"></div>
        </div>

        <div class="box-container">
            <div class="box">
                <h3>The day before</h3>
                <div class="title-dash" style="width:6rem;"></div>
                
                <ul class="list">
                    <li>Have an iron-rich diet such as beans, spinach or meat, poultry.<br>
                        आयरन युक्त आहार जैसे बीन्स, पालक या मांस, पोल्ट्री लें।
                    </li>
                    <hr>
                    <li>Have a proper sleep of at least 8 hours.<br>
                        कम से कम 8 घंटे की उचित नींद लें।
                    </li>
                    <hr>
                    <li>Include more liquids in your diet.<br>
                        अपने आहार में अधिक तरल पदार्थ शामिल करें।
                    </li>
                </ul>
            </div>

            <div class="box">
                <h3>On the donation day</h3>
                <div class="title-dash" style="width:6rem;"></div>
                
                <ul class="list">
                    <li>Do carry your identify identification forms e.g. driver’s license<br>
                        अपना पहचान पत्र अवश्य साथ रखें, जैसे ड्राइवर का लाइसेंस
                    </li>
                    <hr>
                    <li>Drink 2 cups of water before donating blood<br>
                        रक्तदान करने से पहले 2 कप पानी पियें
                    </li>
                    <hr>
                    <li>Wear a half sleeve shirt so that you can easily roll it up avoid fast food before donation<br>
                        आधी बाजू की शर्ट पहनें ताकि आप इसे आसानी से लपेट सकें, दान से पहले फास्ट फूड से बचें
                    </li>
                </ul>
            </div>

            <div class="box">
                <h3>After the donation</h3>
                <div class="title-dash" style="width:6rem;"></div>
                
                <ul class="list">
                    <li>Reward yourself with a snack as refreshment immediately.<br>
                        तुरंत अपने आप को ताज़गी के रूप में नाश्ता देकर पुरस्कृत करें।
                    </li>
                    <hr>
                    <li>Drink more liquids over a period of 24 hours<br>
                        24 घंटे की अवधि में अधिक तरल पदार्थ पियें
                    </li>
                    <hr>
                    <li>Remove the bandage after few hours<br>      
                        कुछ घंटों के बाद पट्टी हटा दें
                    </li>
                    <hr>
                    <li>Don’t do vigorous workout & give your body rest<br>
                        ज़ोरदार कसरत न करें और अपने शरीर को आराम दें
                    </li>
                </ul>
            </div>

        </div>
    </section>
</section>

    <!-- Footer -->
    <section class="footer">
        <p>&copy; 2024 Blood Donation Initiative. All rights reserved.</p>
    </section>


    <!-- <script src="scripts.js"></script> -->
    <!-- swiper js link  -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>


    <script>
        var swiper = new Swiper(".home-slider", {
        loop: true,
        spaceBetween: 20,
        speed: 1500,
        effect: 'fade',
        autoplay: {
        delay: 3500,
        },
        grabCursor: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            dynamicBullets: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    </script>
</body>
</html>