
<?php
 
 if(isset($_POST['email'])) {
  
  
     // EDIT THE 2 LINES BELOW AS REQUIRED
  
     $email_to = "godswillrichard110@gmail.com";
  
     $email_subject = "Goals Afika Contact Form Submission";
  
      
  
      
  
     function died($error) {
  
         // your error code can go here
  
        //  echo "<h1>There appears to be something wrong with your completed form.!</h1>";
 
  
         echo $error."<br /><br />";
  
        //  echo "<p><strong>Return to the form and try again<strong>.</strong></p><br />";
     echo "<p><a href='contact-us.html'>return to the homepage</a></p>";
         die();
     
  
     }
   
  
     $full_name = $_POST['full_name']; // required
  
     $email_from = $_POST['email']; // required
  
     $comments = $_POST['comments']; // required
  
      
  
     $error_message = "";
  
     $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  
   if(!preg_match($email_exp,$email_from)) {
  
     $error_message .= '<h2> - The completed e-mail address appears to be incorrect</h2>';
  
   }
  
     $string_exp = "/^[A-Za-z .'-]+$/";
  
   if(!preg_match($string_exp,$full_name)) {
  
     $error_message .= '<h2> - Full name appears to be wrong</h2>';
  
   }
  
 
   if(strlen($comments) < 7) {
  
     $error_message .= '<h2> - Message appears to be less than 7 charcters</h2>';
  
   }
  
   if(strlen($error_message) > 0) {
  
     died($error_message);
  
   }
  
     $email_message = "Form details are given below.\n\n";
  
      
  
     function clean_string($string) {
  
       $bad = array("content-type","bcc:","to:","cc:","href");
  
       return str_replace($bad,"",$string);
  
     }
  
 
  
     $email_message .= "Full name: ".clean_string($full_name)."\n";
  
     $email_message .= "Email Adress: ".clean_string($email_from)."\n";
     
     $email_message .= "Comments: ".clean_string($comments)."\n";
  
       
  
 // create email headers
  
 $headers = 'From: '.$email_from."\r\n".
  
 'Reply-To: '.$email_from."\r\n" .
  
 'X-Mailer: PHP/' . phpversion();
  
 @mail($email_to, $email_subject, $email_message, $headers);  
  
 ?>
 <!-- success message -->
 <style>
      body {
        background: #f1f1f1;
      }
      .success-box .icon {
        color: #198754;
      }
      .success-box {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #fff;
        text-align: center;
        width: 40%;
        margin: 0 auto;
        border-radius: 5px;
        padding: 2.5rem;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
      }
      h1 {
        color: #222;
        font-size: 29px;
        font-family: "Montserrat", sans-serif;
        text-transform: uppercase;
        font-weight: bold;
      }
      p {
        color: #222;
        font-size: 13px;
        font-family: "Montserrat", sans-serif;
        text-transform: uppercase;
        margin-top: 15px;
        font-weight: bold;
      }
      a.read_more {
        font-family: "Montserrat", sans-serif;
        text-decoration: none;
        text-transform: uppercase;
        outline: 0;
        display: inline-block;
        padding: 12px 35px;
        color: white;
        background-color: #000;
        text-align: center;
        cursor: pointer;
        border: 5px solid black;
        margin-left: -1px;
        margin-top: 2%;
        font-size: 8pt;
        letter-spacing: 5px;
        font-weight: bold;
        transition: 0.1 ease-in-out;
      }
      @media (max-width: 700px) {
        .success-box {
          width: 90%;
        }
      }
    </style>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
    <!-- google font Montserrat -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" />
    <!-- success message -->
    <div class="success-box">
      <h1>
        <span class="icon"><i class="fas fa-check-circle"></i></span>&nbsp;
        Thank you for your message!
      </h1>
      <p>We will contact you as soon as possible.</p>
      <a href="index.html" class="read_more">Back Home</a>
    </div>

 <?php
  
 }
  
 ?>
 