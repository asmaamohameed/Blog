<?php require 'partials/Navbar.php' ?>

<div class="bg-white py-10 sm:py-10">
  <div class="mx-auto max-w-7xl px-2 lg:px-8">
    <div class="flex justify-between gap-4 ">
      <h2 class="text-3xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-5xl">My blogs</h2>
      <a href="Blogs/AddBlog" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M12 4v16m8-8H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <span>Add Blog</span>
      </a>
    </div>
    <div
      class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
      <?php foreach ($blogs as $blog): ?>
        <article class="flex max-w-xl flex-col items-start justify-between">
          <div class="flex items-center gap-x-4 text-xs">
            <time datetime="<?= $blog['articleDate'] ?>" class="text-gray-500"><?= $blog['articleDate'] ?></time>
            <a href="#"
              class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100"><?= $blog['category'] ?></a>
          </div>
          <div class="group relative">
            <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600">
              <a href="/Blogs/EditBlog?id=<?= $blog['id']; ?>">
                <span class="absolute inset-0"></span>
                <?= $blog['title'] ?>
              </a>
            </h3>
            <p class="mt-5 line-clamp-3 text-sm/6 text-gray-600"><?= $blog['article'] ?></p>
          </div>
          <div class="relative mt-8 flex items-center gap-x-4">
            <div class="text-sm/6">
              <p class="font-semibold text-gray-900">
                <a href="#">
                  <span class="absolute inset-0"></span>
                  <?= $blog['publisher'] ?>
                </a>
              </p>
              <p class="text-gray-600"><?= $blog['publisherTitle'] ?></p>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
      <!-- More posts... -->
    </div>
  </div>
</div>
<?php require 'partials/Footer.php' ?>