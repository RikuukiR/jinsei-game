<?php

require_once('config/occupations.php');
require_once('config/events.php');

echo "プレイヤー名を入力してください。" . PHP_EOL;
echo ">>";
$name = trim(fgets(STDIN));

while (empty($name)) {
    echo "" . PHP_EOL;
    echo "入力されていません。" . PHP_EOL;
    echo "再入力してください。" . PHP_EOL;
    echo ">>";
    $name = trim(fgets(STDIN));
}

echo "" . PHP_EOL;
echo "あなたの名前は、{$name}ですね。" . PHP_EOL;
echo "それでは、人生ゲームスタートです。大富豪を目指して頑張りましょう。" . PHP_EOL;
echo "まず職業を決めましょう。" . PHP_EOL;
echo "Enterを押して職業を決めてください。" . PHP_EOL;
fgets(STDIN);

$job_num = mt_rand(0,3);
$occupation = $occupations[$job_num]['occupation'];
$income = $occupations[$job_num]['income'];
$asset = $income;

echo "職業は、{$occupation}です。" . PHP_EOL;
echo "資産は、{$asset}万円です。" . PHP_EOL;

$car = 0;
$pc = 0;
$house = 0;

for ($event_count = 1; $event_count <= 10; $event_count++) {
    if ($event_count === 4 || $event_count === 8) {
    echo "" . PHP_EOL;
    echo "給料日になりました。" . PHP_EOL;
    echo "{$income}万円の給料をもらう。" . PHP_EOL;
    $asset = $asset + $income;
    echo "資産が{$asset}万円になりました。" . PHP_EOL;
    }
    if ($asset >= 2000) {
    echo "" . PHP_EOL;
    echo "{$asset}万円貯まった。何かやってみようかな？" . PHP_EOL;
    echo "1: 車を買う。" . PHP_EOL;
    echo "2: パソコンを買う。" . PHP_EOL;
    echo "3: 家を買う。" . PHP_EOL;
    echo "数字を入力してください。" . PHP_EOL;
    echo ">>";

    $choice = trim(fgets(STDIN));
    while (!is_numeric($choice)) {
        echo "" . PHP_EOL;
        echo "数字が入力されていません。" . PHP_EOL;
        echo "再度入力してください。" . PHP_EOL;
        echo ">>";
        $choice = trim(fgets(STDIN));
    }
    switch ($choice) {
        case 1:
            echo "車を購入する。1000万円払う" . PHP_EOL;
            $asset = $asset - 1000;
            $car = $car + 1;
            break;
        case 2:
            echo "パソコンを購入する。100万円払う" . PHP_EOL;
            $asset = $asset - 100;
            $pc = $pc + 1;
            break;
        case 3:
            echo "全資産で家を購入する。" . PHP_EOL;
            $asset = 0;
            $house = $house + 1;
            break;
        default:
            echo "全資産で家を購入する。" . PHP_EOL;
            $asset = 0;
            $house = $house + 1;
            break;
    }
    }
    echo "" . PHP_EOL;
    echo "{$event_count}回目のイベントです。" . PHP_EOL;
    echo "Enterを押してルーレットを回してください。" . PHP_EOL;
    fgets(STDIN);
    $event_num = mt_rand(0, 9);
    $event = $events[$event_num]['event'];
    $profit = $events[$event_num]['profit'];
    $asset = $asset + $profit;
    echo $event . PHP_EOL;
    echo "資産が{$asset}万円になりました。" . PHP_EOL;
}

?>
