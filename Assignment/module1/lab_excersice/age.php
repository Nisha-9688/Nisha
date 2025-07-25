        <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                 $dob = $_POST['dob'];

                  $birthDate =new DateTime($dob);
                 $today =new DateTime();

                 $age = $today->diff($birthDate);

                 echo "Your age is: " . $age->y;  
                }
        ?>