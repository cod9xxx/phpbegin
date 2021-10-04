<?php

ini_set('display_errors',true);

$firstPlayerPoints = 125.24;
$secondPlayerPoints = 550.68;

$word = 'СОЛНЦЕ';
$lettersInWordsOnScoreboard = mb_str_split($word);

$openedLettersOnScoreboard = ['Б','О', 'К', 'С', 'И'];

$wrongLetter = false;

$firstPlayerName = 'xcodya';
$secondPlayerName = 'bot';

$rusLetters = 'АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ';
$letters = mb_str_split($rusLetters);
$openedLetters = 'ЮПРВЦУСМЯЧ';

$score = 1000;
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <meta name="author" content="Волков Михаил">
    
    <title>наебинар</title>
    
    <link href="/tailwind.min.css" rel="stylesheet">
    <style>
        .word-cell {
            min-width: 1em;
        }
    </style>
</head>
<body class="antialiased sans-serif bg-blue-50" style="min-width: 375px">
    <main class="mx-auto max-w-4xl h-screen flex flex-col justify-between">
        <div class="block sm:flex justify-between items-center border bg-gray-100">
            <div class="text-left p-4 flex justify-center sm:justify-items-start items-center">
                <div class="pr-8">Очки: </div>
                <div>
                    <div><span class="text-sm text-gray-700"><span class="text-red-600"><?=$firstPlayerName?></span>:</span> <span class="text-xl text-red-600"><?=$firstPlayerPoints?></span></div>
                    <div><span class="text-sm text-gray-700"><span class="text-blue-800"><?=$secondPlayerName?></span>:</span> <span class="text-xl text-blue-800"><?=$secondPlayerPoints?></span></div>
                </div>
            </div>
            <div class="mx-auto text-center">
                Ходит: <span class="text-xl text-red-600"><?=$firstPlayerName?></span>
            </div>
            <div class="text-right p-4 flex justify-center space-x-2">
                <form method="post" action="">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded text-sm" name="help">Подсказка</button>
                </form>
                <form method="post" action="">
                    <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded text-sm" name="restart">Начать заново</button>
                </form>
            </div>
        </div>
        <div class="flex flex-col flex-1 justify-around">
            <div class="border flex justify-center class bg-white p-4 space-x-2 sm:space-x-4 text-3xl sm:text-4xl md:text-6xl">
                <?php foreach ($lettersInWordsOnScoreboard as $key => $letterOnScoreboard)
                {
                    if(in_array($letterOnScoreboard, $openedLettersOnScoreboard)) {?>
                        <div class="word-cell border text-center"><?=$letterOnScoreboard?></div>
                    <?php } else{?>
                        <div class="word-cell border text-center bg-black">&nbsp;</div>
                <?php }
                }?>
<!--                <div class="word-cell border text-center">С</div>-->
            </div>
            <div class="flex flex-col items-center p-4 space-y-4">

                <?php if($wrongLetter) {?>
                    <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-red-700 bg-red-100 border border-red-300 ">
                        <div class="text-xl font-normal max-w-full flex-initial">Нет такой буквы</div>
                    </div>
                <?php }
                else {?>
                    <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-700 bg-green-100 border border-green-300 ">
                        <div class="text-xl font-normal max-w-full flex-initial">Такая буква есть</div>
                    </div>
                <?php }?>
                <div class="flex justify-between items-center">
                    <span class="text-gray-700 pr-2">Очков за ход:</span> <span class="text-3xl"><?=$score?></span>
                </div>
                <div>
                    <form method="post" action="">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" name="spin">Крутить барабан</button>
                    </form>
                </div>
            </div>
            <div class="flex justify-center px-4">
                <form method="post" action="">
                    <div class="grid grid-cols-8 sm:grid-cols-12 gap-2 text-md sm:text-xl md:text-3xl">
                        <?php foreach ($letters as $key => $openedLetters)
                        {
                        if(in_array($openedLetters, $letters)) {?>
                            <button type="submit" class="word-cell p-2 bg-white hover:bg-blue-700 text-center" name="letter" value="А"><?=$openedLetters?></button>
                        <?php } else {?>
                            <span class="word-cell p-2 text-center bg-black">Т</span>
                        <?php }
                        }?>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>