<div
    x-data="{ open: false }"
    x-on:open-modal.window="open = true"
    x-on:close-modal.window="open = false"
    x-show="open"
    style="display: none;"
    class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center"
>
    <div class="bg-white rounded p-6 shadow-md w-96">
        <h2 class="text-lg font-bold mb-4">Assign Crew to Project</h2>

        <form wire:submit.prevent="assign">
            <label class="block mb-2 font-semibold">Project</label>
            <select wire:model="project_id" class="w-full mb-4 border rounded px-2 py-1">
                <option value="">-- Select Project --</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
            @error('project_id') <span class="text-red-600">{{ $message }}</span> @enderror

            <label class="block mb-2 font-semibold">Crew</label>
            <div class="max-h-40 overflow-y-auto border rounded mb-4 p-2">
                @foreach ($users as $user)
                    <label class="flex items-center mb-1">
                        <input type="checkbox" wire:model="user_ids" value="{{ $user->id }}" class="mr-2">
                        {{ $user->name }}
                    </label>
                @endforeach
            </div>
            @error('user_ids') <span class="text-red-600">{{ $message }}</span> @enderror

            <div class="flex justify-end space-x-2">
                <button type="button" @click="open = false" class="px-4 py-2 border rounded">Cancel</button>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Assign</button>
            </div>
        </form>
    </div>
</div>
