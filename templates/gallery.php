<h2>Галлерея</h2>
<div class="gallery">
<? foreach ($gallery as $item):?>

    <a class='gallery__item' href='/?page=image&id=<?=$item['id']?>'>
        <img src='<?=GALLERY_DIR?>/small/<?=$item['name']?>' alt="<?=$item?>">
    </a>

    <?endforeach;?>
</div>