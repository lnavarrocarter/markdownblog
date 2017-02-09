<section id="services-sec" class="padding-60">
    <div class="container">
        <?php echo $parsedown->text(file_get_contents('app/data/md/'.$mdfile.'.md'));?>
    </div>
</section>
