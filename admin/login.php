<?php
session_start();
require_once "db.php";  // Include DB connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);  // Hash input password before comparison

    $sql = "SELECT * FROM `admin_login` WHERE admin_name=? AND password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php"); // Redirect to dashboard
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-500 to-indigo-600 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold text-center text-gray-700 mb-6">Admin Login</h1>
        <form method="POST" class="space-y-4">
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" id="username" name="username" 
                       class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                       placeholder="Enter your username" required>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" 
                       class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                       placeholder="Enter your password" required>
            </div>
            <button type="submit" 
                    class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md font-bold shadow-md hover:bg-indigo-700 transition duration-200">
                Login
            </button>
        </form>

        <?php if (isset($error)): ?>
            <p class="mt-4 text-red-500 text-center font-semibold"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <p class="mt-4 text-sm text-gray-600 text-center">
            Forgot your password? 
            <a href="#" class="text-indigo-500 hover:underline">Reset it here</a>.
        </p>
    </div>
</body>
</html>
