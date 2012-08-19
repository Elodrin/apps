<?php

$l = new OC_l10n('news');

$feed = isset($_['feed']) ? $_['feed'] : null;
$unreadItemsCount = isset($_['unreadItemsCount']) ? $_['unreadItemsCount'] : null;

$favicon = $feed->getFavicon();
if ($favicon == null) {
    $favicon = OCP\Util::imagePath('core', 'actions/public.svg');
}

if($unreadItemsCount == 0){
    $allReadClass = 'all_read';
} else {
    $allReadClass = '';
}

echo '<li class="feed" data-id="' . $feed->getId() . '" style="background-image: url(' . $favicon . ');">';
echo '<a href="#" " class="' . $allReadClass . '">' . htmlspecialchars_decode($feed->getTitle()) .'</a>';
	echo '<span class="unreaditemcounter ' . $allReadClass . '">' . $unreadItemsCount . '</span>';
echo '<button class="svg action feeds_delete" onClick="(News.Feed.delete(' . $feed->getId(). '))" title="' . $l->t('Delete feed') . '"></button>';
echo '</li>';
