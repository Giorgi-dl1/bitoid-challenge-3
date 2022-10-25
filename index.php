<?php include 'includes/index.inc.php' ?>

<?php include 'header.php' ?>
<div class="flex items-center justify-center p-12">
  <div class="mx-auto w-full max-w-[45rem]">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
      <div class="mb-5">
        <label
          for="name"
          class="mb-3 block text-base font-medium text-[#07074D]"
        >
          Search github user
        </label>
        <input
          type="text"
          name="name"
          id="name"
          placeholder="username..."
          class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
        />
      </div>
      <div>
        <button
          class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
          name="submit"
        >
          Submit
        </button>
      </div>
    </form>
  </div>
</div>

<?php if($user): ?>
  <div class="container px-6 mt-5 mx-auto">
        <div class="flex justify-center ">
            <div class="lg:flex">
                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="<?php echo $user['avatar_url'] ?>" alt="">

                <div class="flex flex-col justify-between py-6 lg:mx-6">
                    <a href="<?php echo $user['html_url'] ?>" class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">
                        <?php echo $user['login'] ?>
                    </a>
                    <div class="felx flex-col gap-1">
                        <span class="text-sm text-gray-500 dark:text-gray-300">Followers: <?php echo $user['followers'] ?></span>
                        <span class="text-sm text-gray-500 dark:text-gray-300">Repositories: <?php echo $user['public_repos'] ?></span>
                    </div>
             
                </div>
            </div>
        </div>
  </div>
<?php endif; ?>

<?php include 'header.php' ?>
