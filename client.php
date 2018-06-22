<?php
session_start();
include "dbconnect.php";

list($trash,$nickname)= explode(":",$_SESSION['testuser']);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Chat</title>
    <style>
      .chat_log{ width: 95%; height: 200px; }
      .name{ width: 10%; }
      .message{ width: 70%; }
      .chat{ width: 10%; }
    </style>
  </head>
  <body>
    <div>
      <textarea id="chatLog" class="chat_log" readonly></textarea>
    </div>
    <form id="chat">
      <input id="name" class="name" type="text" readonly>
      <input id="message" class="message" type="text">
      <input type="submit" class="chat" value="chat"/>
    </form>
    <div id="box" class="box">
    <script src="/socket.io/socket.io.js"></script> <!-- 1 -->
    <script src="//code.jquery.com/jquery-1.11.1.js"></script>
    <script>
      var socket = io(); //1
      $('#chat').on('submit', function(e){ //2
        socket.emit('send message', $('#name').val(), $('#message').val());
        $('#message').val('');
        $('#message').focus();
        e.preventDefault();
      });
      socket.on('receive message', function(msg){ //3
        $('#chatLog').append(msg+'\n');
        $('#chatLog').scrollTop($('#chatLog')[0].scrollHeight);
      });
      socket.on('change name', function(name){ //4
        $('#name').val(name);
      });
    </script>
  </body>
</html>
