<div class="mb-6">
  <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
  <input type="text" id="username" name='username' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="johndoe123" value="{{ old('username', $type == 'update' ? $user->username : '') }}" required>
  @error('username')
    <div class="grid justify-items-center my-2 py-2 rounded-md bg-red-600 text-white">
      {{$message}}
    </div>
  @enderror
</div>
<div class="mb-6">
  <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
  <input type="password" id="password" name='password' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" value="{{ old('password') }}" {{$type == 'create' ? 'required' : ''}}>
  @error('password')
    <div class="grid justify-items-center my-2 py-2 rounded-md bg-red-600 text-white">
      {{$message}}
    </div>
  @enderror
</div>
<div class="mb-6">
  <label for="fullname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fullname</label>
  <input type="text" id="fullname" name='fullname' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John Doe" value="{{ old('fullname', $type == 'update' ? $user->fullname : '') }}" required>
  @error('fullname')
    <div class="grid justify-items-center my-2 py-2 rounded-md bg-red-600 text-white">
      {{$message}}
    </div>
  @enderror
</div>
<div class="mb-6">
  <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a role</label>
  <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option selected>Role</option>
    @if( $type == 'update')
    <option {{ $user->role == "admin" ? 'selected' : ''}} value="admin">Admin</option>
    <option {{ $user->role == "employee" ? 'selected' : ''}} value="employee">Employee</option>
    <option {{ $user->role == "manager" ? 'selected' : ''}} value="manager">Manager</option>
    <option {{ $user->role == "director" ? 'selected' : ''}} value="director">Director</option>
    @else 
    <option value="admin">Admin</option>
    <option value="employee">Employee</option>
    <option value="manager">Manager</option>
    <option value="director">Director</option>
    @endif
  </select>
  @error('role')
    <div class="grid justify-items-center my-2 py-2 rounded-md bg-red-600 text-white">
      {{$message}}
    </div>
  @enderror
</div>
<div class="flex justify-end">
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</div>