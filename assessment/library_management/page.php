<?php
session_start();

$message = "";
$show_books = false;
$filtered_books = [];
$edit_index = $_POST['edit_index'] ?? -1;
$edit_mode = isset($_POST['action']) && $_POST['action'] === 'edit';

if (!isset($_SESSION['books'])) {
    $_SESSION['books'] = [];
}

$action = $_POST['action'] ?? '';
$search_query = strtolower(trim($_POST['search'] ?? ''));

switch ($action) {
    case 'add':
        add_book($_POST);
        $message = "Book added successfully.";
        break;

    case 'delete':
        $index = $_POST['index'];
        delete_book($index);
        $message = "Book deleted successfully.";
        break;

    case 'clear':
        $_SESSION['books'] = [];
        $message = "All books cleared.";
        break;

    case 'show':
        $filtered_books = $_SESSION['books'];
        $show_books = true;
        break;

    case 'search':
        if ($search_query !== '') {
            $filtered_books = array_filter($_SESSION['books'], function ($book) use ($search_query) {
                return strpos(strtolower($book['title']), $search_query) !== false ||
                       strpos(strtolower($book['author']), $search_query) !== false ||
                       strpos(strtolower($book['isbn']), $search_query) !== false ||
                       strpos(strtolower($book['category']), $search_query) !== false;
            });
            $show_books = true;
        }
        break;

    case 'update':
        $index = $_POST['edit_index'];
        $_SESSION['books'][$index] = [
            'title' => $_POST['title'],
            'author' => $_POST['author'],
            'isbn' => $_POST['isbn'],
            'category' => $_POST['category']
        ];
        $message = "Book updated successfully.";
        break;

    case 'logout':
        session_unset();
        session_destroy();
        header("Location: include.php?logged_out=1");
        exit;

    case 'change_password':
        header("Location: logout.php?logged_out=1");
        break;
}

function add_book($data) {
    $_SESSION['books'][] = [
        'title' => $data['title'],
        'author' => $data['author'],
        'isbn' => $data['isbn'],
        'category' => $data['category']
    ];
}

function delete_book($index) {
    unset($_SESSION['books'][$index]);
    $_SESSION['books'] = array_values($_SESSION['books']);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Library Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .search-input {
            width: 250px; /* Smaller width for search */
        }
        .action-buttons {
            display: flex;
            gap: 15px; /* Space between Logout and Change Password */
        }
    </style>
</head>

<body class="container mt-5">
    <div class="mb-4">
        <h2 class="text-center">Library Management Using PHP Session</h2>
        <?php if ($message): ?>
            <div class="alert alert-info text-center"><?= $message ?></div>
        <?php endif; ?>
    </div>

    <!-- Search -->
    <form method="post" class="row g-2 mb-4 justify-content-start">
        <div class="col-auto">
            <input type="text" name="search" placeholder="Search by title,author,isbn,categories" value="<?= htmlspecialchars($search_query) ?>" class="form-control search-input" required>
        </div>
        <div class="col-auto">
            <button type="submit" name="action" value="search" class="btn btn-warning">Search</button>
        </div>
    </form>

    <!-- Add/Edit Form -->
    <form method="post" class="row g-2 mb-4">
        <div class="col-md-3">
            <input name="title" class="form-control" placeholder="Title" value="<?= $edit_mode ? htmlspecialchars($_SESSION['books'][$edit_index]['title']) : '' ?>" required>
        </div>
        <div class="col-md-3">
            <input name="author" class="form-control" placeholder="Author" value="<?= $edit_mode ? htmlspecialchars($_SESSION['books'][$edit_index]['author']) : '' ?>" required>
        </div>
        <div class="col-md-2">
            <input name="isbn" class="form-control" placeholder="ISBN" value="<?= $edit_mode ? htmlspecialchars($_SESSION['books'][$edit_index]['isbn']) : '' ?>" required>
        </div>
        <div class="col-md-2">
            <select name="category" class="form-select" required>
                <?php
                $categories = ["Computer", "Electronics", "Electrical", "Civil", "Mechanical", "Architecture"];
                $selected = $edit_mode ? $_SESSION['books'][$edit_index]['category'] : '';
                foreach ($categories as $cat) {
                    echo "<option" . ($selected === $cat ? " selected" : "") . ">$cat</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-md-2">
            <?php if ($edit_mode): ?>
                <input type="hidden" name="edit_index" value="<?= $edit_index ?>">
                <button type="submit" name="action" value="update" class="btn btn-primary w-100">Update</button>
            <?php else: ?>
                <button type="submit" name="action" value="add" class="btn btn-success w-100">Add</button>
            <?php endif; ?>
        </div>
    </form>

    <!-- Show / Clear -->
    <form method="post" class="d-flex gap-3 mb-4">
        <button type="submit" name="action" value="show" class="btn btn-outline-primary">Show Books</button>
        <button type="submit" name="action" value="clear" class="btn btn-outline-danger">Clear All</button>
    </form>

    <!-- Table -->
    <?php if ($show_books): ?>
        <?php if (!empty($filtered_books)): ?>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>ISBN</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($filtered_books as $i => $book): ?>
                        <tr>
                            <td><?= htmlspecialchars($book['title']) ?></td>
                            <td><?= htmlspecialchars($book['author']) ?></td>
                            <td><?= htmlspecialchars($book['isbn']) ?></td>
                            <td><?= htmlspecialchars($book['category']) ?></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <form method="post">
                                        <input type="hidden" name="index" value="<?= $i ?>">
                                        <button type="submit" name="action" value="delete" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                    <form method="post">
                                        <input type="hidden" name="edit_index" value="<?= $i ?>">
                                        <button type="submit" name="action" value="edit" class="btn btn-sm btn-info">Edit</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-warning">No books found.</div>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Bottom Actions -->
    <div class="action-buttons mt-5">
        <form method="post">
            <button type="submit" name="action" value="logout" class="btn btn-danger">Logout</button>
        </form>
        <form method="post">
            <button type="submit" name="action" value="change_password" class="btn btn-secondary">Change Password</button>
        </form>
    </div>
</body>
</html>
