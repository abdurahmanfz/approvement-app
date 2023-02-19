<div class="mb-6">
  <label for="tasks_name" class="font-bold block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task Name</label>
  <input type="text" id="detail_tasks_name" name='tasks_name' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="My first task" value="" required>
  @error('tasks_name')
  <div class="grid justify-items-center my-2 py-2 rounded-md bg-red-600 text-white">
    {{$message}}
  </div>
  @enderror
</div>

<div class="mb-6">
  <label for="description" class="font-bold block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
  <textarea id="detail_description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
  @error('description')
  <div class="grid justify-items-center my-2 py-2 rounded-md bg-red-600 text-white">
    {{$message}}
  </div>
  @enderror
</div>

<div class="mb-6">
  <label class="font-bold block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file">Attachment</label>
  <input name="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="detail_file" type="text">
  @error('file')
  <div class="grid justify-items-center my-2 py-2 rounded-md bg-red-600 text-white">
    {{$message}}
  </div>
  @enderror
</div>

<div class="mb-6">
  <label for="status" class="font-bold block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
  <div id="detail_task_history">
    
  </div>
</div>