<?php
   $filename = 'file.txt';
   $name = $_POST['name'];
   $email = $_POST['email'];
   $password = $_POST['password'];

   // Validate fields
   isEmpty($name, $password, $email);
   isValidEmail($email, $filename);
   isValidPassword($password);

   // get fields
    $data = [
        "name" => $name,
        "email" => $email,
        "password" => password_hash($password, PASSWORD_DEFAULT)
    ];

    $jsonData = json_encode($data);

    try {
        if (!file_exists($filename)) {
            $file = fopen($filename, 'w');
            if ($file) {
                echo "File created (or existed already)";
                $content  = [$jsonData];
                file_put_contents($filename, json_encode($content));
                fclose($file);
            } else {
                throw new Exception("Unable to create file");
            }
        } else {
            $content = file_get_contents($filename);
            $decode_content = json_decode($content);
            if (empty($decode_content)){
                $decode_content = [];
            }
            array_push($decode_content, $jsonData);
            file_put_contents($filename, json_encode($decode_content));
        }
    } catch (Exception $e){
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

    session_start();
    $_SESSION['success_message'] = 'YOUPI, Enregistrement reussi !';
    header('Location: http://localhost:8888/test/registration_success.php');
    exit;



   function isEmpty($name, $password, $email ){
       echo empty($name);
       try {
           if(empty($name) || empty($password) || empty($email)){
              throw new Exception("Veuillez remplir tous les champs vous plait!");
           }
       } catch (Exception $e){
           session_start();
           $_SESSION['error_message'] = $e->getMessage();
           header('Location: http://localhost:8888/test/registration_error.php');
           exit;
       }

   }

   function isValidEmail($email, $filename){
       try {
           if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
               throw new Exception("Email invalid");
           }

           if (file_exists($filename)) {
               $file = fopen($filename, 'r');
               if ($file) {
                   $file_content  = file_get_contents($filename);
                   $file_content = json_decode($file_content);

                   for($i=0; $i < count($file_content) ; $i++){
                       var_dump($file_content);
                       if($file_content[i]['email'] === $email){
                           throw new Exception("Cet utilisateur existe déjà");
                       }
                   }
                   fclose($file);
               } else {
                   throw new Exception("Unable to create file");
               }
           }

       } catch(Exception $e) {
           echo 'Caught exception: ',  $e->getMessage(), "\n";
       }

   }

   function isValidPassword($password){
       try {
           if(strlen($password) < 6) {
               throw new Exception("Le mot de passe doit contenir au moins 6 caractère");
           }
       } catch(Exception $e) {
           echo 'Caught exception: ',  $e->getMessage(), "\n";
       }
   }




