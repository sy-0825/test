<?php
mb_internal_encoding("utf8");
session_start();

//mypage.phpからの導線以外は自動的にリダイレクト

if(empty($_POST['from_mypage'])){
        header("Location:login_error.php");
    }
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8"/>
        <title>マイページ登録</title>
        <link rel="stylesheet" type="text/css" href="mypage.css">
    </head>
    
    <body>
        <header>
            <img src="4eachblog_logo.jpg">
        </header>        
        
        <main>
            <div class="box">
                <form action="mypage_update.php" method="post" class="form_center">
                <h2>会員情報</h2>
                <div class="hello">
                <?php echo "こんにちは！".$_SESSION['name']."さん";?>
                </div>
                <div class="profile_pic">
                    <img src="<?php echo $_SESSION['picture'];?>">
                </div>
                <div class="basic_info">
                    <p>氏名：<input type="text" size="30" value="<?php echo $_SESSION['name'];?>" name="name"></p>
                    <p>メール：<input type="text" size="30" value="<?php echo $_SESSION['mail'];?>" name="mail"></p>
                    <p>パスワード：<input type="text" size="30" value="<?php echo $_SESSION['password'];?>" name="password"></p>
                </div>
                <div class="comments">
                    <textarea rows="5" cols="45" name="comments"><?php echo $_SESSION['comments']; ?></textarea>
                </div>
                    <input type="hidden" value="<?php echo $_SESSION['id'];?>" name="id">
                
                <div class="hensyubutton">
                    <input type="submit" class="submit_button" size="20" value="この内容に変更する">    
                </div>
                </form>
            </div>
        </main>
        
        <footer>
            © 2018 InterNous.inc All rights reserved
        </footer>   
    </body>
</html>