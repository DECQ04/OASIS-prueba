<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    /*Clase formulario*/ 
    class Formulario
     {
         #Propiedades del formulario
      private $nameErr = "";
      private $emailErr = "";
      private $genderErr = "";
      private $websiteErr = "";
      private $name = "";
      private $email = "";
      private $gender = "";
      private $comment = "";
      private $website = "";
    

      #Escribe el formulario (se usa "$this->" para referirse a la propiedad del objeto, esto fue una modificacion del código original)
    public function escribirF()
    {  ?>
        <h2>PHP Form Validation Example</h2>
        <p><span class="error">* required field.</span></p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Name: <input type="text" name="name" value="<?php echo $this->name;?>">
        <span class="error">* <?php echo $this->nameErr;?></span>
        <br><br>
        E-mail: <input type="text" name="email" value="<?php echo $this->email;?>">
        <span class="error">* <?php echo $this->emailErr;?></span>
        <br><br>
        Website: <input type="text" name="website" value="<?php echo $this->website;?>">
        <span class="error"><?php echo $this->websiteErr;?></span>
        <br><br>
        Comment: <textarea name="comment" rows="5" cols="40"><?php echo $this->comment;?></textarea>
        <br><br>
        Gender:
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
        <span class="error">* <?php echo $this->genderErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
        </form>
        <?php
    }

    #Funcion que valida
    public function validar()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $this->nameErr = "Name is required";
            } else {
                $this->name = $this->test_input($_POST["name"]);
                // check if name only contains letters and whitespace
                #Revisa si name solo contiene letras y espacios en blanco
                if (!preg_match("/^[a-zA-Z ]*$/",$this->name)) {
                    $this->nameErr = "Only letters and white space allowed";
                }
            }
            if (empty($_POST["email"])) {
                $this->emailErr = "Email is required";
            } else {
                $this->email = $this->test_input($_POST["email"]);
                // check if e-mail address is well-formed
                # Revisa si la dirección e-mail esta bien echa 
                if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                    $this->emailErr = "Invalid email format";
                }
            }
            if (empty($_POST["website"])) {
                $this->website = "";
            } else {
                $this->website = $this->test_input($_POST["website"]);
                // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
                #Revisa si la sintaxis de la dirección URL es valida (es expresion regular permite guiones en la URL)
                if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$this->website)) {
                    $this->websiteErr = "Invalid URL";
                }
            }
            if (empty($_POST["comment"])) {
                $this->comment = "";
            } else {
                $this->comment = $this->test_input($_POST["comment"]);
            }
            if (empty($_POST["gender"])) {
                $this->genderErr = "Gender is required";
            } else {
                $this->gender = $this->test_input($_POST["gender"]);
            }
        }
    }
    #function test
    public function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    #function imprimir (tambien usa "this->")
    public function imprimir()
     {
       
        echo "<h2>Your Input:</h2>";
        echo $this->name;
        echo "<br>";
        echo $this->email;
        echo "<br>";
        echo $this->website;
        echo "<br>";
        echo $this->comment;
        echo "<br>";
        echo $this->gender;
        
         
     } 
    }


    $F = new Formulario();
    $F->validar();
    $F->escribirF();
    //$F->test_input(); no se usa
        $F->imprimir();/*no se como se usa bien el <?php ?>*/
    ?>
</body>