<section id="contact-section">
    <style>
        .contact-section {
            height: 130vh;
            align-items: center;
            justify-content: center;
            background: #202A5B;
            color: #fff;
            text-align: center;
            height: 100%;
            
        }

        .contact-form {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .contact-form h2 {
            margin-bottom: 30px;
            text-align: center;
        }

        .contact-form input[type="text"],
        .contact-form input[type="email"],
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        .contact-form textarea {
            resize: none;
        }

        .contact-form button[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;

            cursor: pointer;
            transition: background-color 0.3s;
        }

        .contact-form button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .alert {
            margin-top: 20px;
        }


        .contact-form label {
            text-align: left;
            display: block;
            margin-bottom: 5px;
            color: black;
        }
    </style>
    <div class="contact-section">

        <div class="container mt-5 ">
            <h2 class="titles font-weight-bold">Contact</h2>
            <h5 class="mb-5">Feel free to reach out to me through the contact form.</h5>
            <div class="row justify-content-center">
                <div class="col-md-5 contact-form mb-4">
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $name = mysqli_real_escape_string($conn, $_POST['name']);
                        $email = mysqli_real_escape_string($conn, $_POST['email']);
                        $message = mysqli_real_escape_string($conn, $_POST['message']);

                        if (!empty($email) && !empty($message)) {
                            $sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";
                            if (mysqli_query($conn, $sql)) {
                                echo '<div class="alert alert-success">Your message has been saved successfully.</div>';
                                echo '<script>window.location.href = "#contact-section";</script>';
                            } else {
                                echo '<div class="alert alert-danger">Sorry, there was an error saving your message. Please try again later.</div>';
                                echo '<script>window.location.href = "#contact-section";</script>';
                            }
                        } else {
                            echo '<div class="alert alert-danger">Please fill in all required fields.</div>';
                            echo '<script>window.location.href = "#contact-section";</script>';
                        }

                        mysqli_close($conn);
                    }
                    ?>
                    <form class="needs-validation" novalidate method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Optional">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="example@email.com" required>
                            <div class="invalid-feedback">
                                Please enter a valid email address.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" placeholder="Enter your message..." required></textarea>
                            <div class="invalid-feedback">
                                Please enter your message.
                            </div>
                        </div>
                        <button type="submit" style="background-color: #202a5b; color: white;">Submit</button>
                    </form>
                </div>

                <div class="col-md-5 mb-4 rounded ml-5"style="background-color: transparent;">
                    <div class="container pt-5 pb-5 justify-content-center align-items-center" style="height: 100%;">
                        <div class="row mb-5">
                            <div class="col-md-2" style="color: white;  font-size: 24px;">
                                <i class="bi bi-geo-fill"></i>
                            </div>
                            <div class="col-md-10" style="color: white; font-weight: bold; font-size: 18px;">
                                Barangay Canda, Balayan, Batangas
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-2" style="color: white;  font-size: 24px;">
                                <i class="bi bi-telephone-fill"></i>
                            </div>
                            <div class="col-md-10" style="color: white;  font-size: 18px;font-weight: bold; ">
                                <div class="row">
                                    <div class="col-md-6">Secretary: 09998877666</div>
                                    <div class="col-md-6">Chairwoman: 09995544333</div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-2" style="color: white;  font-size: 24px;">
                                <i class="bi bi-envelope-fill"></i>
                            </div>
                            <div class="col-md-10" style="color: white;  font-size: 18px; font-weight: bold;">
                                candabalayanbatangas@gmail.com
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>