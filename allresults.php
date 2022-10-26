<?php 
    include 'includes/db.inc.php'; 
    include 'includes/functions.php';
    $data = fetchAllDb($conn);
?>

<?php include 'header.php'?>
    <?php if($data): ?>
        <section class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-10 mx-auto">
        <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">All users from database</h1>

        <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">
            <?php foreach($data as $user): ?>
                    <div class="lg:flex">
                        <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="<?php echo $user['avatar_url'] ?>" alt="">
                        <div class="flex flex-col justify-between py-6 lg:mx-6">
                            <a href="<?php echo $user['html_url'] ?>" target="_blank" class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">
                                <?php echo $user['name'] ?>
                            </a>
                            <div class="felx flex-col gap-1">
                                <span class="text-sm text-gray-500 dark:text-gray-300">Followers: <?php echo $user['followers'] ?></span>
                                <span class="text-sm text-gray-500 dark:text-gray-300">Repositories: <?php echo $user['repositories'] ?></span>
                            </div>
                    
                        </div>
                    </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
    <?php else: ?>
        <div class="mt-5 p-2">
            <div class="bg-red-600 border-l-8 border-red-900 mb-2 p-2">
            <p class="px-6 py-4 font-semibold text-lg text-white">No users found!</p>
            </div>
        </div>
    <?php endif; ?>

      


<?php include 'footer.php' ?>