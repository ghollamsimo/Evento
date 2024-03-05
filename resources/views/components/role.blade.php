<x-input-label for="role" :value="__('role')" />

<select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option value="Client">Client</option>
    <option value="Organizer">Organizer</option>
    <option value="Admin">Admin</option>
</select>

<x-input-error :messages="$errors->get('role')" class="mt-2" />
