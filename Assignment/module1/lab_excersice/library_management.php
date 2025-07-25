<?php
// Default password (can be changed using option 5)
$password = "admin123";

// Store books in array
$books = [];

// Run main program
main();

function main() {
    global $password;

    echo "===== LIBRARY MANAGEMENT SYSTEM =====\n";
    echo "Enter Password to Login: ";
    $input = trim(fgets(STDIN));

    if ($input !== $password) {
        echo "Incorrect password! Access Denied.\n";
        return;
    }

    while (true) {
        echo "\n========= MAIN MENU =========\n";
        echo "1. Add Book\n";
        echo "2. Delete Book\n";
        echo "3. Search Book\n";
        echo "4. View All Books\n";
        echo "5. Change Password\n";
        echo "6. Exit\n";
        echo "Choose an option (1-6): ";
        $choice = trim(fgets(STDIN));

        switch ($choice) {
            case "1": addBook(); break;
            case "2": deleteBook(); break;
            case "3": searchBook(); break;
            case "4": viewBooks(); break;
            case "5": changePassword(); break;
            case "6": echo "Exiting... Goodbye!\n"; exit;
            default: echo "Invalid option. Try again.\n";
        }
    }
}

function addBook() {
    global $books;

    echo "\n-- Select Book Category --\n";
    $categories = ["Fiction", "Non-Fiction", "Science", "Math", "Biography"];
    foreach ($categories as $index => $cat) {
        echo ($index + 1) . ". $cat\n";
    }
    echo "Choose category: ";
    $catChoice = (int)trim(fgets(STDIN)) - 1;
    $category = $categories[$catChoice] ?? "General";

    echo "Enter Book Title: ";
    $title = trim(fgets(STDIN));
    echo "Enter Author Name: ";
    $author = trim(fgets(STDIN));
    echo "Enter ISBN: ";
    $isbn = trim(fgets(STDIN));

    $books[] = [
        "title" => $title,
        "author" => $author,
        "isbn" => $isbn,
        "category" => $category
    ];

    echo "Book added successfully!\n";
}

function deleteBook() {
    global $books;

    if (empty($books)) {
        echo "No books to delete.\n";
        return;
    }

    echo "\n-- Book List --\n";
    foreach ($books as $index => $book) {
        echo ($index + 1) . ". " . $book['title'] . " by " . $book['author'] . "\n";
    }

    echo "Enter the number of the book to delete: ";
    $choice = (int)trim(fgets(STDIN)) - 1;

    if (isset($books[$choice])) {
        unset($books[$choice]);
        $books = array_values($books); // reindex
        echo "Book deleted successfully.\n";
    } else {
        echo "Invalid selection.\n";
    }
}

function searchBook() {
    global $books;

    if (empty($books)) {
        echo "No books available to search.\n";
        return;
    }

    echo "Enter keyword to search (title/author/category): ";
    $keyword = strtolower(trim(fgets(STDIN)));

    $results = array_filter($books, function($book) use ($keyword) {
        return strpos(strtolower($book['title']), $keyword) !== false ||
               strpos(strtolower($book['author']), $keyword) !== false ||
               strpos(strtolower($book['category']), $keyword) !== false;
    });

    if ($results) {
        echo "\n-- Search Results --\n";
        foreach ($results as $book) {
            displayBook($book);
        }
    } else {
        echo "No books found matching '$keyword'.\n";
    }
}

function viewBooks() {
    global $books;

    if (empty($books)) {
        echo "No books found.\n";
        return;
    }

    echo "\n-- Book List --\n";
    foreach ($books as $book) {
        displayBook($book);
    }
}

function displayBook($book) {
    echo "Title   : {$book['title']}\n";
    echo "Author  : {$book['author']}\n";
    echo "ISBN    : {$book['isbn']}\n";
    echo "Category: {$book['category']}\n";
    echo "--------------------------\n";
}

function changePassword() {
    global $password;

    echo "Enter Old Password: ";
    $old = trim(fgets(STDIN));

    if ($old !== $password) {
        echo "Incorrect old password.\n";
        return;
    }

    echo "Enter New Password: ";
    $newPass = trim(fgets(STDIN));
    $password = $newPass;

    echo "Password changed successfully!\n";
}
