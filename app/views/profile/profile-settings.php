<?php include_once '../app/views/includes/header.php' ?>
<?php include_once '../app/views/includes/navbar.php' ?>
<div class="h-40 w-10/12 md:w-8/12 m-auto mt-10">
    <img class="h-full w-full object-cover rounded-tl-extra-large " src="<?=ROOT?>/assets/settings-background.webp" alt="">
</div>
<form class=" w-10/12 md:w-8/12 m-auto bg-white flex flex-col" method="post" enctype="multipart/form-data">

    <!--HEADER OF THE PAGE -->
    <div class="flex justify-between">
        <div class="flex flex-col lg:flex-row">
            <img class="h-24 w-24 rounded-full border-solid border-2 border-white mr-2 -translate-y-6 translate-x-10" src="<?= ROOT ?>/assets/user_female.jpg" alt="">
            <div class="flex flex-col pr-4 translate-x-10 mt-4">
                <h1 class="font-bold text-xl">Profile</h1>
                <span>Update your photo and personal details</span>
            </div>
        </div>
        <div class="flex mt-6 mr-6 gap-4">
            <a href="<?= ROOT ?>/home" class="h-10 px-2 py-1.5 rounded-lg text-black border-solid border border-black">
                Cancel
            </a>
            <button name="save-changes" type="submit" class="h-10 text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-gray-900 dark:focus:ring-blue-800">Save</button>
        </div>
    </div>
    <div class="mt-16 mx-6">

        <!-- USERNAME INPUT -->
        <div class="mb-6">
            <div class="flex justify-between items-center">
                <label for="user_name" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                <input value="<?=isset($data->user_name) ? $data->user_name : ''?>" type="user_name" id="username" name="user_name" class="w-3/5 border border-gray-300 text-gray-900 text-sm bg-gray-50 focus:border-transparent rounded-lg block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jane Doe" required>
            </div>
            <div class="h-px bg-gray-200 my-6"></div>
             <?php
            if(isset($errors['user_name'])) :?>
                <div class="flex p-4 mb-4 mt-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-gray-800 dark:text-blue-400" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <?=$errors['user_name']?>
                    </div>
                </div>
            <?php endif ?>
        </div>

        <!-- EMAIL INPUT -->
        <div class="mb-6">
            <div class="flex justify-between items-center">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input value="<?=isset($data->email) ? $data->email : ''?>" type="email" id="email" name="email" class="w-3/5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required>
            </div>
            <div class="h-px bg-gray-200 my-6"></div>
            <?php
            if(isset($errors['email'])) :?>
                <div class="flex p-4 mb-4 mt-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-gray-800 dark:text-blue-400" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <?=$errors['email']?>
                    </div>
                </div>
            <?php endif ?>
        </div>


        <!-- PHOTO PROFILE INPUT -->
        <div class="mb-6">
            <div class="flex justify-between items-center">
                <div class="flex gap-10">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        <h3>Your photo</h3>
                        <span class="text-gray-500 font-light">This will be displayed on your profile</span>
                    </label>

                    <div id="image-container">
                        <!-- image to delete -->
                        <img id="image-to-delete" src="<?= ROOT . '/assets/' . $data->image ?>" alt="" class="h-14 w-14 rounded-full">
                    </div>
                   </div>
                <div class="flex flex-col gap-4 align-center ">
                    <!-- delete image button -->
                    <button name="delete-profile-image" class="h-10 px-2 py-1.5 rounded-lg text-black border-solid border border-black" onclick="deleteImage('image-to-delete')" type="button">Delete</button>
                    <div class="flex justify-between items-center">
                        <label for="image"><i class="fa-solid fa-image pr-2"></i></label>
                        <!-- new image input -->
                        <input id="profile-image" value="<?=$data->image?>" name="image" class="w-20"  type="file" onchange="showImage.call(this)">
                    </div>
                </div>
            </div>
            <div class="h-px bg-gray-200 my-6"></div>
            <?php
            if(isset($errors['email'])) :?>
                <div class="flex p-4 mb-4 mt-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-gray-800 dark:text-blue-400" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <?=$errors['email']?>
                    </div>
                </div>
            <?php endif ?>
        </div>

        <!-- PROFILE BIO INPUT -->
        <div class="mb-6">
                <div class="flex justify-between">
                    <label for="bio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        <h3>Your bio</h3>
                        <span class="text-gray-500 font-light">Write a short introduction</span>
                    </label>
                    <input name="bio" value="<?=isset($data->bio) ? $data->bio : ''?>" class="w-3/5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            <div class="h-px bg-gray-200 my-6"></div>
            <?php
            if(isset($errors['email'])) :?>
                <div class="flex p-4 mb-4 mt-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-gray-800 dark:text-blue-400" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <?=$errors['email']?>
                    </div>
                </div>
            <?php endif ?>
        </div>

        <!-- PASSWORD INPUT -->
        <div class="mb-6">
            <div class="flex justify-between items-center">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                <input type="password" id="password" name="password" class="w-3/5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
            </div>
            <div class="h-px bg-gray-200 my-6"></div>
            <?php
            if(isset($errors['password'])) :?>
                <div class="flex p-4 mb-4 mt-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-gray-800 dark:text-blue-400" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <?=$errors['password']?>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
</form>

<script>
    function deleteImage(name) {
        $.ajax({
            url: '/php-blog/public/settings/resetImage/<?=$data->user_id?>'
        }).done(function() {
            document.getElementById(name).src = "<?= ROOT . '/assets/user_female.jpg' ?>";
            document.getElementById('profile-image').value = '';
        });
    }
</script>

<?php include_once '../app/views/includes/footer.php' ?>
