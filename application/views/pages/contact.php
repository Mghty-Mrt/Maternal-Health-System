<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Maternal Health System</title>

    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/fav.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <link rel="stylesheet" href="../assets/libs/bootstrap/dist/css/boostrap.min.css" />
    <!-- <link rel="stylesheet" href="../assets/css/custom.css" />   -->
    <link rel="stylesheet" href="../assets/css/fontawesome.css" />
    <script src="../assets/libs/jquery/dist/jquery-3.6.0.min.js"></script>
    <script src='../assets/fullcalendar/index.global.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            color: rgb(17, 82, 114, 1);
        }

        .blue-bg {
            background-color: #115272;
        }

        .section1Title {
            font-size: 30px;
            align-items: start;
        }

        .section1SubTitle {
            font-size: 50px;
            align-items: start;
        }

        .left-padding {
            padding-left: 100px;
        }


        .container {
            display: flex;
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .contact-info {
            flex: 1;
            padding-left: 40px;
            padding-right: 20px;
        }

        .contact-info h2 {
            margin-top: 0;
        }

        .contact-info p {
            margin: 10px 0;
        }

        .contact-form {
            flex: 1;
            padding-left: 20px;
        }

        h1 {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        iframe {
            width: 100%;
            height: 200px;
            border: 0;
            border-radius: 5px;
        }

        footer {

            padding: 20px;
            text-align: center;
            color: rgb(17, 82, 114, 1);
        }

        input[type="submit"] {
            background-color: #115272;
            /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #007bff;
        }
    </style>
</head>

<body>
    <header class="mt-4">
        <nav class="navbar navbar-expand-lg navbar-light blue-bg text-white">
            <a class="navbar-brand text-white font-weight-bold" href="#"><img src="../assets/images/logos/fav.png" alt="logo" width="55px" height="50px"> Maternal Health System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold text-white" href="#">Pre-Registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold text-white" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold text-white" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold text-white" href="#">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container">
        <!-- <div class="contact-form">
            <h1 class="section1Title font-weight-bolder">CONTACT US</h1>
            <form action="../home/sendq" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="email">Reason:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="5" required></textarea>

                <input type="submit" value="Submit">
            </form>
        </div> -->

        <div class="contact-info"><br><br>
            <h2>Contact Information</h2>
            <p><strong>Telephone:</strong> (632) 9884242</p>
            <p><strong>Email:</strong> <a href="mailto:citylegal@quezoncity.gov.ph">maternalhealth389@gmail.com</a></p>
            <p><strong>Address:</strong> Elliptical Road, Barangay Central, Diliman Quezon City</p>
            <p><strong>Website:</strong> <a href="https://quezoncity.gov.ph/">Quezon City Government</a></p>
            <div>

            </div><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30882.738182895613!2d121.01151877975776!3d14.636502135928298!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b70950b66739%3A0xa0f8a709cb1843a7!2sQuezon%20City%20Hall!5e0!3m2!1sfil!2sph!4v1713041924012!5m2!1sfil!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <footer>
        <p>Maternal Health System &copy; 2024</p>
        <p>Email: <a href="mailto:maternalhealth@gmail.com">maternalhealth@gmail.com</a> / Phone: +639216548677</p>
    </footer>
</body>

</html>