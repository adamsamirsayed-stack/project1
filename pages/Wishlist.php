<?php
session_start();

$db = mysqli_connect('localhost', 'root', '', 'wishlist');

if (!$db) {
    die("DB connection failed: " . mysqli_connect_error());
}

$errors = "";

$editMode = false;
$editId = 0;
$editWish = "";

if (isset($_POST['submit'])) {
    $wish = mysqli_real_escape_string($db, $_POST['wish']);

    if (empty($wish)) {
        $errors = "You must add something to your wishlist";
    } else {
        mysqli_query($db, "INSERT INTO wishes (name) VALUES ('$wish')");
        header("Location: Wishlist.php");
        exit();
    }
}

if (isset($_POST['update'])) {
    $id = (int) $_POST['id'];
    $wish = mysqli_real_escape_string($db, $_POST['wish']);

    if (!empty($wish)) {
        mysqli_query($db, "UPDATE wishes SET name='$wish' WHERE id=$id");
        header("Location: Wishlist.php");
        exit();
    }
}

if (isset($_GET['del_wish'])) {
    $id = (int) $_GET['del_wish'];
    mysqli_query($db, "DELETE FROM wishes WHERE id=$id");

    header("Location: Wishlist.php");
    exit();
}

if (isset($_GET['edit_wish'])) {
    $editMode = true;
    $editId = (int) $_GET['edit_wish'];

    $res = mysqli_query($db, "SELECT * FROM wishes WHERE id=$editId");
    $row = mysqli_fetch_assoc($res);

    $editWish = $row['name'];
}

$result = mysqli_query($db, "SELECT * FROM wishes");

if (!$result) {
    die("Query error: " . mysqli_error($db));
}

$wishes = $result;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Wishlist</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">

    <style>
        .btn-success,
        .btn-primary {
            background-color: #28a745 !important;
            border-color: #28a745 !important;
            color: white !important;
        }

        .btn-success:hover,
        .btn-primary:hover {
            background-color: #218838 !important;
            border-color: #1e7e34 !important;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .wishWrapper,
        .addWish {
            width: 100%;
            max-width: 900px;
        }

        table {
            text-align: center;
        }
    </style>

</head>

<body>

<?php include("layout/navbar.php"); ?>

<div class="wrapper">

    <nav class="navbar navbar-light bg-light justify-content-center w-100">
        <span class="navbar-brand mb-0 h1">My Wishlist</span>
    </nav>

    <div class="main w-100 d-flex flex-column align-items-center">

        <div class="addWish text-center">

            <h1 class="display-4">My Wishlist</h1>

            <form method="POST" action="Wishlist.php">

                <?php if (!empty($errors)) { ?>
                    <p class="text-danger"><?php echo $errors; ?></p>
                <?php } ?>

                <div class="form-row justify-content-center align-items-center">

                    <div class="col-md-6">

                        <input type="hidden" name="id" value="<?php echo $editId; ?>">

                        <input type="text"
                               class="form-control mb-2 text-center"
                               name="wish"
                               value="<?php echo $editMode ? $editWish : ''; ?>"
                               placeholder="e.g. PS5, new phone, new airpods...">
                    </div>

                    <div class="col-auto">

                        <?php if ($editMode): ?>
                            <button type="submit" class="btn btn-primary mb-2" name="update">
                                Update Wish
                            </button>
                        <?php else: ?>
                            <button type="submit" class="btn btn-success mb-2" name="submit">
                                + Add Wish
                            </button>
                        <?php endif; ?>

                    </div>

                </div>

            </form>

        </div>

        <div class="wishWrapper mt-4">

            <div class="jumbotron jumbotron-fluid text-center">

                <div class="container">

                    <table class="table table-bordered">

                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Wish</th>
                            <th>Actions</th>
                        </tr>
                        </thead>

                        <tbody>

                        <?php $i = 1; while ($row = mysqli_fetch_array($wishes)) { ?>

                            <tr>
                                <th><?php echo $i; ?></th>
                                <td><?php echo $row['name']; ?></td>

                                <td>

                                    <a class="btn btn-success btn-sm"
                                       href="Wishlist.php?edit_wish=<?php echo $row['id']; ?>">
                                        Edit Wish
                                    </a>

                                    <a class="btn btn-success btn-sm"
                                       href="Wishlist.php?del_wish=<?php echo $row['id']; ?>">
                                        Remove Wish
                                    </a>

                                </td>
                            </tr>

                            <?php $i++; } ?>

                        </tbody>

                    </table>

                </div>
            </div>

        </div>

    </div>

</div>

</body>
</html>