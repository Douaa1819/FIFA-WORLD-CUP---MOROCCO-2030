<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>FIFA WORLD CUP</title>
</head>

<body class="bg-blue-200 p-7">

    <header class="bg-indigo-500 p-4 fixed top-0 left-0 right-0  h-20">

        <h1 class="text-white   px-4 py-2 rounded    font-bold pt-2 text-center text-4xl w-auto">FIFA WORLD CUP</h1>

    </header>
     <div class="relative mt-20 ">
     <form class="pt-3 text-center" method="post">
        <input type="text" name="group_name" placeholder="Enter Le Groupe" class="text-black h-4 bg-white bg-opacity-20 p-12 border-2 border-black">
        <input type="submit" value="Search" class="text-white bg-indigo-500 p-2 ml-2">
    </form>
    </div>

    <div class="flex flex-wrap gap-14 mt-16 p-4">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "worldcup";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $searchTerm = mysqli_real_escape_string($conn, $_POST['group_name']);

            $sql = "SELECT equipe.id_equipe, equipe.nom_equipe, equipe.drapeaux_equipe, `groupe`.nom_groupe
                    FROM equipe
                    INNER JOIN `groupe` ON equipe.groupe_id = `groupe`.groupe_id
                    WHERE `groupe`.nom_groupe LIKE '%$searchTerm%'
                    ORDER BY `groupe`.nom_groupe";
        } else {
            $sql = "SELECT equipe.id_equipe, equipe.nom_equipe, equipe.drapeaux_equipe, `groupe`.nom_groupe
                    FROM equipe
                    INNER JOIN `groupe` ON equipe.groupe_id = `groupe`.groupe_id
                    ORDER BY `groupe`.nom_groupe";
        }
        $result = $conn->query($sql);


        $currentGroup = null;
 

        echo "<style>
                table {
                    border-collapse: collapse;
                    width: 20%;
                    margin-bottom: 10px;
                }

                th, td {
                    border: 1px solid #adb3ba;
                    text-align: left;
                    padding: 89px; 
                }

                th {
                    background-color: #4299e1;
                    color: white;
                }

                td {
                    background-color: #f8fafc;
                }
              </style>";
      

              
              
        while ($row = $result->fetch_assoc()) {
            if ($row['nom_groupe'] !== $currentGroup) {
                if ($currentGroup !== null) {
                    echo "</table>";
                }

                $currentGroup = $row['nom_groupe'];
                echo "<table class='mt-8  '>
                        <tr>
                            <th colspan='2' class='bg-indigo-500 text-white py-2 text-lg font-semibold'>
                                Groupe " . $currentGroup . "
                            </th>
                        </tr>";
            }

            echo "<tr>
                    <td class='bg-gray-200 p-2 font-poppins text-base font-semibold'>
                        <div class='flex items-center'>
                            <img src='" . $row['drapeaux_equipe'] . "' alt='' class='mr-2'>
                            " . $row['nom_equipe'] . "
                        </div>
                    </td>
                  </tr>";
        }
        if ($currentGroup !== null) {
            echo "</table>";
        }

        $conn->close();
        ?>

    </div>

   

</body>

</html>
