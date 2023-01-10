<div class="bg-white w-9/12 md:w-7/12 my-6 mx-auto rounded-xl pt-2.5 px-6 pb-6">
    <h3 class="font-bold mb-2">Tweet something</h3>
    <?php
    if($error){
        show($error);
    };
    ?>
    <div class="h-0.5 bg-gray-200 mb-6"></div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="flex">
            <img class="h-8 rounded-sm mr-2" src="<?= ROOT. '/assets/' . $_SESSION['USER']->image?>" alt="">
            <textarea name="text" rows="3" class="w-2/3 border-transparent focus:border-transparent focus:ring-0 text-sm text-gray-500 dark:text-gray-400 focus:border-0" placeholder="What's happening ?"></textarea>
        </div>
        <div class="flex justify-between align-center mt-6">
            <label for="image"><i class="fa-solid fa-image"></i></label>
            <input name="image" type="file" class="hidden" id="image">
            <button class="text-white bg-cyan-600 hover:bg-cyan-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-4 py-2 text-center0">Post</button>
        </div>
    </form>
</div>