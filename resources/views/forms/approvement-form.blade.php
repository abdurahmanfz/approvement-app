<input type="hidden" name="taskid" id="taskid">
<input type="hidden" name="task_name" id="task_name">
<label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a status</label>
<select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
  <option selected value="approved">Approved</option>
  <option value="rejected">Rejected</option>
  <option value="finished">Finished</option>
</select>
@error('status')
<div class="grid justify-items-center my-2 py-2 rounded-md bg-red-600 text-white">
  {{$message}}
</div>
@enderror

<div class="flex justify-end mt-6">
  <button type="submit" class="font-bold text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</div>