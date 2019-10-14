<h2>Галлерея</h2>
<div class="gallery">
<? foreach ($gallery as $item):?>

    <a class='gallery__item' href='<?=GALLERY_DIR?>/big/<?=$item?>'>
        <img src='<?=GALLERY_DIR?>/small/<?=$item?>' alt="<?=$item?>">
    </a>

    <?endforeach;?>
</div>