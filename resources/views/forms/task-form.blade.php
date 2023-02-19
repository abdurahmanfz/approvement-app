<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
<div class="mb-6">
  <label for="tasks_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task Name</label>
  <input type="text" id="{{$type}}_tasks_name" name='tasks_name' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="My first task" value="" required>
  @error('tasks_name')
  <div class="grid justify-items-center my-2 py-2 rounded-md bg-red-600 text-white">
    {{$message}}
  </div>
  @enderror
</div>

<div class="mb-6">
  <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
  <textarea id="{{$type}}_description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
  @error('description')
  <div class="grid justify-items-center my-2 py-2 rounded-md bg-red-600 text-white">
    {{$message}}
  </div>
  @enderror
</div>

<div class="mb-6">
  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file">Attachment <span class="text-blue-900" id="{{$type}}_filebefore"></span></label>
  <input name="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file" type="file" accept="application/msword, application/pdf">
  @error('file')
  <div class="grid justify-items-center my-2 py-2 rounded-md bg-red-600 text-white">
    {{$message}}
  </div>
  @enderror
</div>

@if ($type == 'update_task')
<div class="flex justify-end">
  <button type="button" onclick="updateTask()" class="font-bold text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</div>
@else
<div class="flex justify-end">
  <button type="submit" class="font-bold text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</div>
@endif