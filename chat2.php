<?php
session_start();

// Check if user is logged in
if(!isset($_SESSION['xx'])){
    header("Location: login.php");
    exit();
}

$sender = $_SESSION['xx'];

// Check if receiver email is passed
if(!isset($_GET['receiver_email'])){
    die("No receiver selected.");
}

$receiver = $_GET['receiver_email'];

// --- Database connections ---
// Messages DB
$conn_msg = mysqli_connect("localhost","root","","simple_chat");
if(!$conn_msg){ die("Connection failed: ".mysqli_connect_error()); }

// Users DB
$conn_user = mysqli_connect("localhost","root","","matrimony");
if(!$conn_user){ die("Connection failed: ".mysqli_connect_error()); }

// Fetch receiver info
$sql_receiver = "SELECT * FROM userdata WHERE email='$receiver'";
$result_receiver = mysqli_query($conn_user, $sql_receiver);
if(!$result_receiver){ die("Query failed: ".mysqli_error($conn_user)); }
$receiver_info = mysqli_fetch_assoc($result_receiver);
if(!$receiver_info){ die("Receiver not found."); }

// Insert new message
if(isset($_POST['message'])){
    $message = mysqli_real_escape_string($conn_msg, $_POST['message']);
    if($message != ''){
        mysqli_query($conn_msg, "INSERT INTO messages (sender_email, receiver_email, message) VALUES ('$sender','$receiver','$message')");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Chat with <?php echo htmlspecialchars($receiver_info['fullname'] ?? $receiver); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body{
            margin:0;
            font-family: 'Poppins', sans-serif;
            background: #f2f4f7;
            display:flex;
            justify-content:center;
            align-items:flex-start;
            padding-top:50px;
        }

        .chat-container{
            width: 400px;
            height: 500px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            display:flex;
            flex-direction:column;
            overflow:hidden;
        }

        .chat-header{
            background: linear-gradient(90deg, #6c5ce7, #a29bfe);
            color: #fff;
            padding: 15px;
            text-align: center;
            font-weight: 600;
            font-size: 16px;
            letter-spacing: 0.5px;
        }

        .chat-box{
            flex:1;
            padding: 15px;
            overflow-y:auto;
            background: #f8f9fa;
        }

        .message{
            max-width: 75%;
            padding: 10px 15px;
            margin: 8px 0;
            border-radius: 12px;
            font-size: 14px;
            word-wrap: break-word;
            position: relative;
        }

        .me{
            background: #6c5ce7;
            color: #fff;
            margin-left:auto;
            border-bottom-right-radius: 3px;
        }

        .you{
            background: #dfe6e9;
            color: #2d3436;
            margin-right:auto;
            border-bottom-left-radius: 3px;
        }

        .chat-input{
            display:flex;
            padding:10px;
            border-top:1px solid #eee;
            background:#fff;
        }

        .chat-input input{
            flex:1;
            padding:10px 15px;
            border-radius:20px;
            border:1px solid #ccc;
            outline:none;
            font-size:14px;
        }

        .chat-input button{
            margin-left:10px;
            padding:10px 20px;
            border:none;
            border-radius:20px;
            background: #6c5ce7;
            color:white;
            cursor:pointer;
            font-weight:500;
            transition:0.3s;
        }

        .chat-input button:hover{
            background: #341f97;
        }

        /* Scrollbar */
        .chat-box::-webkit-scrollbar {
            width: 6px;
        }
        .chat-box::-webkit-scrollbar-thumb {
            background-color: rgba(108, 92, 231, 0.5);
            border-radius: 3px;
        }
    </style>
</head>
<body>

<div class="chat-container">
    <div class="chat-header">
        Chat with <?php echo htmlspecialchars($receiver_info['fullname'] ?? $receiver); ?>
    </div>

    <div class="chat-box" id="chatBox">
        <?php
        // Fetch messages
        $query = "SELECT * FROM messages 
                  WHERE (sender_email='$sender' AND receiver_email='$receiver') 
                     OR (sender_email='$receiver' AND receiver_email='$sender')
                  ORDER BY id ASC";
        $result = mysqli_query($conn_msg, $query);
        if($result){
            while($row = mysqli_fetch_assoc($result)){
                if($row['sender_email'] == $sender){
                    echo "<div class='message me'>".htmlspecialchars($row['message'])."</div>";
                } else{
                    echo "<div class='message you'>".htmlspecialchars($row['message'])."</div>";
                }
            }
        }
        ?>
    </div>

    <form method="POST" class="chat-input">
        <input type="text" name="message" placeholder="Type a message..." required>
        <button type="submit">Send</button>
    </form>
</div>

<script>
    // Auto scroll to bottom
    var chatBox = document.getElementById("chatBox");
    chatBox.scrollTop = chatBox.scrollHeight;
</script>

</body>
</html>