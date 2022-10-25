<?php include 'includes/index.inc.php' ?>

<?php include 'header.php' ?>
<div class="flex items-center justify-center p-12">
  <div class="mx-auto w-full max-w-[550px]">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
      <div class="mb-5">
        <label
          for="name"
          class="mb-3 block text-base font-medium text-[#07074D]"
        >
          Search star wars character
        </label>
        <input
          type="text"
          name="name"
          id="name"
          placeholder="name"
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
<?php include 'header.php' ?>
