<?php foreach ($posts as $post) :?>
    <div class="bg-white w-9/12 my-6 mx-auto rounded-xl pt-2.5 px-6 pb-6">
        <div class="flex items-center">
            <img class="h-8 rounded-sm mr-2" src="<?= ROOT . '/assets/' . $_SESSION['USER']->image ?>" alt="">
            <div>
                <h3 class="font-bold text-sm"><?=$post->user->user_name?></h3>
                <span class="text-xs"><?=get_date($post->date)?></span>
            </div>
        </div>
        <p class="my-4"><?=$post->text?></p>
        <p class="my-4"><?=$post->post_id?></p>
        <?php if($post->image !== null) :?>
        <img class="rounded-lg w-full object-contain max-h-64 m-auto"
             src="<?= ROOT . '/assets/' . $post->image ?>">
        <?php endif; ?>
        <div class="text-slate-600 text-sm flex justify-end gap-4 my-4">
            <span>449 Comments</span>
            <span>59k Retweets</span>
            <span>234 Saved</span>
        </div>
        <div class="h-0.5 bg-gray-200 mb-6"></div>
        <div class="text-grayBtn flex justify-around">
            <button class="py-3 px-5 hover:bg-hoverBtn rounded-lg transition ease-in-out duration-300"><i
                        class="fa-solid fa-message mr-2"></i>Comment
            </button>
            <button class="py-3 px-5 hover:bg-hoverBtn rounded-lg transition ease-in-out duration-300"><i
                        class="fa-solid fa-retweet mr-2"></i>Retweet
            </button>
            <button class="py-3 px-5 hover:bg-hoverBtn rounded-lg transition ease-in-out duration-300"><i
                        class="fa-regular fa-heart mr-2"></i>Like
            </button>
            <button class="py-3 px-5 hover:bg-hoverBtn rounded-lg transition ease-in-out duration-300"><i
                        class="fa-regular fa-bookmark mr-2"></i>Save
            </button>

        </div>
    </div>
<?php endforeach; ?>