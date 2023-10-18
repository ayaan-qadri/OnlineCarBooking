<!DOCTYPE html>
<html lang="en">
    <?php
    if (!isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION['AdminLoginUsername'])) {
        header("Location: ../login.php");
    }
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKING</title>
    <link rel="stylesheet" href="../css/booking.css">
    <script src="../JS/booking.js" defer></script>
</head>

<body>
    <?php
        include 'sidebar.php';
        include("../connection.php");

    ?>

    <h1 class="mainTitle">BOOKINGS</h1>
    <div class="userTable">


        <table class="titles">

            <tr class='headlineRow'>
                <th>Name</th>
                <th>Number</th>
                <th>Email</th>
                <th>Address</th>
                <th>Car</th>
                <th>Status</th>
                <th class='rm'></th>
            </tr>
            <?php
                $que = "SELECT * FROM booking";
                $res = mysqli_query($conn, $que);
                $id = '';
                foreach ($res as $row) 
                {
                    $id = $row['id'];
                    echo "<div class='userFetchedData'>

                            <tr class='tableRow'>
                                <td>$row[name]</td>
                                <td>$row[number]</td>
                                <td>$row[email]</td>
                                <td>$row[address]</td>
                                <td>$row[car]</td>
                                <td>
                                    <span class='status$id'>$row[status]</span>

                                    <form method='POST' id = 'form$id' action='updateSelected.php'>

                                        <select name='status' class='selectStatus$id defaultOff'>
                                            <option value='pending'>pending</option>
                                            <option value='onprocess'>onprocess</option>
                                            <option value='waiting for car'>waiting for car</option>
                                            <option value='completed'>completed</option>
                                            <input type='hidden' name='id' value=$id>

                                        </select>
                                    </form>
                                
                                </td>
                                <td class='rm'>
                                    <form method='POST'>
                                        <button name='remove' class='removeBtn fas fa-times-circle'> Remove </button>
                                        <input type='hidden' name='id' value=$id>
                                    </form>
                                </td>

                                <td class='rm'>
                                            <button id='$id' class='removeBtn fas fa-times-circle' onClick='clicked(this)'> Edit Status </button>
                                            <form method='POST' class='editStatus'>
                                                <span name='submit' class='submitBtn fas fa-times-circle' onClick='submitSelect($id)'> submit </span>    
                                                <input type='hidden' name='id' value=$id>
                                            </form>
                                </td>
                            </tr>";
                }
            ?>
        </table>
    </div>

    <?php
    if (isset($_POST['remove'])) {
        $que = "DELETE FROM booking WHERE id='$_POST[id]'";

        $res = mysqli_query($conn, $que);

        if ($res) {
            echo "<script>window.location.href = window.location.href;</script>";
        } else {
            echo "Can not delete";
        }
    }
    ?>
</body>

</html>