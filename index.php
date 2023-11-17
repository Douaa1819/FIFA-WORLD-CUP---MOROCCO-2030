<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>FIFA WORLD CUP</title>
</head>

<body class="  bg-blue-200 p-7 flex  flex-wrap  gap-2  ">
    

        <?php
        // Connect to the database 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "worldcup";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Execute the query
        $sql = "SELECT equipe.id_equipe, equipe.nom_equipe,equipe.drapeaux_equipe, `groupe`.nom_groupe
                FROM equipe
                INNER JOIN `groupe` ON equipe.groupe_id = `groupe`.groupe_id
                ORDER BY `groupe`.nom_groupe"; 
                // Order by groupe name to group teams together

        $result = $conn->query($sql);

        // Initialize variables for group comparison
        $currentGroup = null;

        echo "<style>
            table {
                border-collapse: collapse;
                width: 22%;
                margin-bottom: 20px;
            }

            th, td {
                border: 2px solid #e2e8f0;
                text-align: left;
                padding: 8px;
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
            // Start a new table when a new group is encountered
            if ($row['nom_groupe'] !== $currentGroup) {
                if ($currentGroup !== null) {
                    echo "</table>";
                }

                $currentGroup = $row['nom_groupe'];
                echo "<table class='mt-8 '>
                        <tr>
                            <th colspan='2' class='bg-indigo-500 text-white py-2 text-lg font-semibold rounded-t-md '>
                                Groupe " . $currentGroup . "
                            </th>
                        </tr>
                        ";
            }

            echo "<tr>
            <td class='bg-gray-200 p-2 font-poppins text-base font-semibold '>
            <img src='" . $row['drapeaux_equipe'] . "' alt=''>
            " . $row['nom_equipe'] . "
        </td>
                  </tr>";
}

        // Close the last table
        if ($currentGroup !== null) {
            echo "</table>";
        }

        // Close the connection
        $conn->close();
        ?>
  

</body>

</html>
