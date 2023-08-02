<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>network class</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css">

    <link href="img/favicon.ico" rel="icon">
</head>
<body>
    <header>
        <nav class="navbar bg-primary p-1 px-5">
            <div class="navbar-item d-flex align-items-center">
                <span style="font-size: 3em; color: white;" class="p-1">
                    <i class="fa-solid fa-network-wired"></i>
                </span>
                <div class="justify-content-center text p-1">
                    Raspberry Pi
                </div>
            </div>
            <ul id="navbar-menu" class="nav ms-auto justify-content-between">
                <li class="nav-item"><a id="nav-link" href="https://www.raspberrypi.com/documentation/">Documant</a></li>
                <li class="nav-item"><a id="nav-link" href="https://www.raspberrypi.com/news/">News</a></li>
                <li class="nav-item"><a id="nav-link" href="https://forums.raspberrypi.com/">Forums</a></li>
                <li class="nav-item"><a id="nav-link" href="https://www.raspberrypi.org/">Foundation</a></li>
            </ul>
            
        </nav>
    </header>
    

    <main>
        <!-- メインコンテンツのセクション -->
        <h1 id="title">ようこそ！ネットワーク特論<br>教室チームへ</h1>
        <div class="px-5 d-flex align-items-center justify-content-center">
        <?php

        $counter_file = 'counter.txt';
        $counter_lenght = 8;

        $fp = fopen($counter_file, 'r+');

        if ($fp){
            if (flock($fp, LOCK_EX)){
                
                $counter = fgets($fp, $counter_lenght);
                $counter += 1;

                rewind($fp);
                

                if (fwrite($fp,  $counter) === FALSE){
                    print('ファイル書き込みに失敗しました');
                }

                flock($fp, LOCK_UN);
                fclose($fp);
            }
        }


        $format = '%0'.$counter_lenght.'d';
        $new_counter = sprintf($format, $counter);

        for ($i = 0 ; $i <= 9 ; $i++){
            $num = (string)$i;
            $img_num = '<img id="count-img" src="./img/b'.$i.'.jpg">';
            $new_counter = str_replace($num, $img_num, $new_counter);
        }

        $size = ' width="16" height="18" border="0">';
        $new_counter = str_replace('>', $size, $new_counter);

        print('<p>あなたは訪問者:</p><div id="counter">'.$new_counter.'</div><p>人目です</p>');

        ?>
        </div>
        <br>
        
        <h2>現在の教室の状況</h2>
        <div class="d-flex align-items-center justify-content-center">
            <img src="#" width="1530" height="1200">
        </div>
        <br>

        <h2>これまでの学習の様子</h2>
    </main>

    <footer>
        <div id="footer-text">
            This project is realized by <a id="footer-link" href="https://www.raspberrypi.com/">Raspberry Pi</a>.
        </div>
        <ul>
            <li><a id="footer-link" href="https://www.raspberrypi.com/about/">About</a></li>
            <li><a id="footer-link" href="https://github.com/shunya9811">Contact</a></li>
            <li><a id="footer-link" href="https://www.raspberrypi.com/news/">News</a></li>
        </ul>
    </footer>
    
    <script src="https://kit.fontawesome.com/2b6c1584e9.js" crossorigin="anonymous"></script>
</body>
</html>
