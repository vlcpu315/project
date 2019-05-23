<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/navbar-top-fixed.css">
    <link rel="stylesheet" href="css/sticky-footer.css"> -->
    <!-- <link rel="stylesheet" href="css/sticky-footer-navbar.css"> -->
    <!-- <link rel="stylesheet" href="css/signup.css"> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>


    <title>COMP4900 Project</title>

    <?php
        if(isset($_GET['i'])) {
            $referee = decrypt($_GET["i"]);
            
        } else {
            $referee = "";
        }

    


        //Decrypts email sent throught URL
        function decrypt($string, $key = 'mykey', $secret = 'SecretKey', $method = 'AES-256-CBC') {
            // hash
            $key = hash('sha256', $key);
            // create iv - encrypt method AES-256-CBC expects 16 bytes
            $iv = substr(hash('sha256', $secret), 0, 16);
            // decode
            $string = base64_decode($string);
            // decrypt
            return openssl_decrypt($string, $method, $key, 0, $iv);
        }

        
    ?>

</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="index.html">PigeonBox</a>
    </nav>

    <br/>

    <body>
        <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
            <div class="card card-signin flex-row my-5">
                <div class="card-body">
                <h5 class="card-title text-center">Sign Up</h5>
                <!-- <label>refered by:</label> -->
                <!-- <p id="referee"></p> -->
                <div class="form-signin">
                    <!-- <form action="api.php" method="post"> -->
                        <div class="form-label-group">
                        <label for="inputEmail">Email address:</label>
                        <input type="email" id="inputEmail" name="" class="form-control" placeholder="Email address" required>
                    
                        </div>
                        <br>



                        <button class="btn btn-lg btn-primary btn-block text-uppercase" id="signUpBtn" type="submit">Sign Up</button>
                    <!-- </form> -->

                    <script>
                            const singupBtn = document.getElementById("signUpBtn");
                            let jsonData;
                            const referee = "<?php echo $referee?>"

                            const emailInput = document.getElementById("inputEmail");
                            let email;

                            emailInput.addEventListener('change', (e) => {
                                e.preventDefault();
                                email = emailInput.value
                                //console.log(email)

                                jsonData ={email: email, referee: referee};
                               
                                console.log(jsonData)
                                
                            });

                            singupBtn.addEventListener('click', (e) => {

                                e.preventDefault();

                                createNewUser();
                                


                            })

                            function createNewUser() {

                                // console.log('adf')

                                let ajaxUrl = "../BackEnds/api/apiFunctions/create.php"

                                var t = "[" + JSON.stringify(jsonData) + "]";

                                let data = {'create' : t}

                                $.post(ajaxUrl, data, function(response) {
                                    
                                    console.log(response)
                                })

                                createSession()
                            }

                            function createSession(){
                                let ajaxUrl = "../BackEnds/signup.php"

                                var t = email;
                                console.log("t: " + t);

                                let data = {'email' : t}

                                $.post(ajaxUrl, data, function(response) {
                                    
                                    console.log("response: " + response)
                                    window.location.href = "home.html";
                                })
                            }
                        </script>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </body>


    <footer class="footer mt-auto py-3 fixed-bottom">
    <div class="container">
        <span class="text-muted"></span>
    </div>
    </footer>
</body>
</html>