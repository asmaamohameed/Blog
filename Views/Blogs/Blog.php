<?php require '../Views/partials/Navbar.php'?>

<div class="isolate bg-white px-6 py-12 sm:py-16 lg:px-8">
<div class="absolute inset-x-0 top-[0rem] sm:top-[0rem] -z-10 transform-gpu overflow-hidden blur-3xl" aria-hidden="true">
  <div class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none 
              -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 
              sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]"
       style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 
              72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 
              27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
  </div>
</div>

  <div class="mx-auto max-w-2xl text-center">
    <h2 class="text-4xl font-semibold tracking-tight text-balance text-gray-900 sm:text-5xl">Add Blog</h2>
  </div>
  <form action="#" method="POST" class="mx-auto mt-10 max-w-xl sm:mt-10">
    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">  
      <div class="sm:col-span-2">
        <label for="Title" class="block text-sm/6 font-semibold text-gray-900">Title</label>
        <div class="mt-1.5">
          <input type="text" name="company" id="company" autocomplete="organization" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
        </div>
      </div>
      <div class="sm:col-span-2">
        <label for="category" class="block text-sm/6 font-semibold text-gray-900">Category</label>
        <div class="mt-1.5">
          <div class="rounded-md bg-white outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
            <div class="grid shrink-0 grid-cols- focus-within:relative">
              <select id="category" name="category" autocomplete="category" aria-placeholder="Category" aria-label="category" class="col-start-1 row-start-1 w-full appearance-none rounded-md py-2 pr-7 pl-3.5 text-base text-gray-900 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                <option>Markting</option>
                <option>Healt&Care</option>
                <option>Sports</option>
                <option>Politics</option>
              </select>
              <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
              </svg>
            </div>
          </div>
        </div>
      </div>
      <div class="sm:col-span-2">
        <label for="message" class="block text-sm/6 font-semibold text-gray-900">Artical</label>
        <div class="mt-1.5">
          <textarea name="message" id="message" rows="4" class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600"></textarea>
        </div>
      </div>
    </div>
    <div class="mt-5 flex justify-center">
      <button type="submit" class="flex justify-center w-60 rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add</button>
    </div>
  </form>
</div>
<?php require '../Views/partials/Footer.php'?>