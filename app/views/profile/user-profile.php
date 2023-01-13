<?php include_once '../app/views/includes/header.php' ?>
<?php include_once '../app/views/includes/navbar.php' ?>
<div class="h-72">
    <img class="h-full w-full object-cover" src="<?=ROOT?>/assets/background.jpeg" alt="">
</div>
<div class="w-11/12 md:w-9/12 h-44 m-auto bg-white rounded-lg -translate-y-10 flex">
    <img class="h-32 w-32 object-cover rounded-lg border-solid border-2 border-white mr-2 -translate-y-14 translate-x-10" src="<?= ROOT ?>/assets/<?=$currentUser->image?>" alt="">
    <div class=" pl-14">
        <div class="flex mt-4 justify-between items-center pr-4 gap-6">
            <h1 class="font-bold text-lg"><?=$currentUser->user_name?></h1>
            <p><span class="font-semibold">2,569 </span>Following</p>
            <p><span class="font-semibold">10,8K </span>Followers</p>
        </div>
        <p class="pt-5"><?=$currentUser->bio?></p>
    </div>


</div>
<?php include_once '../app/views/includes/all_posts.php' ?>
<?php include_once '../app/views/includes/footer.php' ?>
