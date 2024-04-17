<?php
// RSS dosyasının URL'si
$url = "http://aksehirportal.rf.gd/rss/category/Son";

// RSS içeriğini çek
$xml = simplexml_load_file($url);

// XML başlığını belirle
header('Content-type: text/xml');

// XML dosyasının başlangıcı
echo "<?xml version='1.0' encoding='UTF-8'?>
<rss version='2.0'>
<channel>
<title>Akşehir Portal RSS</title>
<description>Akşehir Portal RSS</description>
<link>http://aksehirportal.rf.gd</link>";

// RSS içeriğini döngüye alarak XML dosyasına ekleyin
foreach ($xml->channel->item as $item) {
    echo "<item>
    <title>" . $item->title . "</title>
    <description>" . $item->description . "</description>
    <link>" . $item->link . "</link>
    <pubDate>" . $item->pubDate . "</pubDate>
    </item>";
}

// XML dosyasının sonu
echo "</channel>
</rss>";
?>
