<?php
// RSS dosyasının URL'si
$url = "http://aksehirportal.rf.gd/rss/category/Son";

// RSS içeriğini çek
$xml = simplexml_load_file($url);

// XML başlığını belirle
header('Content-type: application/rss+xml');

// RSS başlığını yazdır
echo "<?xml version='1.0' encoding='UTF-8'?>
<rss version='2.0'>
<channel>
<title>Akşehir Portal RSS</title>
<description>Akşehir Portal RSS</description>
<link>http://aksehirportal.rf.gd</link>";

// RSS içeriğini döngüye alarak XML dosyasına ekleyin
foreach ($xml->channel->item as $item) {
    echo "<item>
    <title>" . htmlspecialchars($item->title) . "</title>
    <description>" . htmlspecialchars($item->description) . "</description>
    <link>" . htmlspecialchars($item->link) . "</link>
    <pubDate>" . htmlspecialchars($item->pubDate) . "</pubDate>
    </item>";
}

// RSS dosyasının sonu
echo "</channel>
</rss>";
?>





<?php
// RSS dosyasının URL'si
$url = "http://aksehirportal.rf.gd/rss/category/Son";

// RSS içeriğini çek
$xml = simplexml_load_file($url);

// XML dosyasını oluştur
$netXML = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><rss version="2.0"><channel></channel></rss>');

// RSS içeriğini döngüye alarak XML dosyasına ekle
foreach ($xml->channel->item as $item) {
    $newItem = $netXML->channel->addChild('item');
    $newItem->addChild('title', htmlspecialchars($item->title));
    $newItem->addChild('description', htmlspecialchars($item->description));
    $newItem->addChild('link', htmlspecialchars($item->link));
    $newItem->addChild('pubDate', htmlspecialchars($item->pubDate));
}

// XML dosyasını kaydet
$netXML->asXML('net.xml');

// XML başlığını belirle
header('Content-type: application/rss+xml');

// RSS başlığını yazdır
echo $netXML->asXML();
?>

