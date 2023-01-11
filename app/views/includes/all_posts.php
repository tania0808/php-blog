<?php
if(count($posts) > 0){
foreach ($posts as $post) { ?>
    <div class="bg-white w-9/12 md:w-8/12 my-6 mx-auto rounded-xl pt-2.5 px-6 pb-6 mb-10">
        <div class="flex items-center justify-between">
            <div class="flex">
                <img class="h-10 rounded-sm mr-2" src="<?= ROOT . '/assets/' . $_SESSION['USER']->image ?>" alt="">
                <div>
                    <h3 class="font-bold text-sm"><?= $post->user->user_name ?></h3>
                    <span class="text-xs"><?= get_date($post->date) ?></span>
                </div>
            </div>

            <?php if (Auth::is_own_content($post)) : ?>
                <div class="w-4">
                    <div class="flex items-center" id="dropdownDefaultButton" data-dropdown-toggle="post-<?=$post->id?>">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </div>
                    <!-- Dropdown menu -->
                    <div id="post-<?=$post->id?>"
                         class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownDefaultButton">

                            <a href="<?= ROOT ?>/post/edit/<?= $post->post_id ?>"
                               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-black">Edit</a>

                            <a href="<?= ROOT ?>/post/delete/<?= $post->post_id ?>"
                               class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-black">Delete</a>

                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <p class="my-4"><?= $post->text ?></p>
        <?php if ($post->image !== null) : ?>
            <img class="rounded-lg w-full object-cover max-h-64 m-auto"
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
<?php }} ?>