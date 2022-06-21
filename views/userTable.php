<!DOCTYPE html>
<html lang="en">

<body>

    <form method="post">
        <input type="text" name="username" placeholder="Find by user" />
        <input type="submit" value="search" />
    </form>

    <table border="1">
        <tbody>
            <?php
            include(__DIR__ . '../../server/connection.php');
            include(__DIR__ . '../../server/crud/read.php');

            if ($_POST) {
                echo "<tr>";
                echo "<td>ID</td>";
                echo "<th>USERNAME</th>";
                echo "<th>Actions</th>";
                echo "</tr>";
                echo "<br/>";

                $search = $_POST['username'];

                $users = findByUser($client, $search);

                foreach ($users as $user) {
                    $userId = $user['id_user'];
                    $username = $user['username'];

                    echo "<tr>";
                    echo "<td>" . $userId . "</td>";
                    echo '<td id="username">' . $username . "</td>";
                    echo '<td><button onclick="' . "editUser($userId)" . '">Edit</button></td>';
                    echo "</tr>";
                }
            }
            ?>



        </tbody>
    </table>

    <script>
        async function editUser(userId) {
            let currentName = prompt('Please enter the new name');
            console.log(currentName);

            let data = new FormData();
            data.set("userId", userId);
            data.set("username", currentName);


            let response = await fetch('http://localhost/FocusTimer/server/crud/update.php', {
                method: "POST",
                body: data,
            });

            let body = await response.json();

            if (!body) {
                return alert('Action edit failed, show again');
            }

            let element = document.getElementById('username');
            element.innerText = currentName;
        }
    </script>
</body>

</html>