<x-layout>
@if (session('success'))
    <div class="mb-4 p-4 bg-green-500/20 border border-green-500 text-green-400 rounded-md text-sm">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="mb-4 p-4 bg-red-500/20 border border-red-500 text-red-400 rounded-md text-sm">
        <strong>Whoops!</strong> There were some problems with your input.
    </div>
@endif
    <form method="POST" action="/formtest">
        @csrf
<div class="space-y-12">
    <div class="border-b border-white/10">
      <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-12 p-10 bg-gray-800 rounded-lg">
        <div class="sm:col-span-4">
          <label for="email" class="block text-sm/6 font-medium text-white">Email</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
              <input id="email" type="email" name="email" placeholder="juandelacruz@umindanao.edu.ph" class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
              @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
              @enderror
            </div>
            <div class="mt-3 flex items-center gap-x-6 justify-end">
            <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
            </div>
        </form>
          </div>
          <div class="mt-3 p-5">
            <h2 class="text-lg font-semibold text-white">Emails</h2>
            <span class="text-xs {{ count(session('$emails', [])) >= 5 ? 'text-red-400' : 'text-gray-400' }}">
              {{ count(session('$emails', [])) }} / 5 Slots Used
            </span>
          <ul>
            @foreach (session('$emails', []) as $index => $email)
              <li class="flex items-center justify-between p-3 bg-white/5 rounded-lg border border-white/10">
                <span class="text-sm text-gray-200">{{ $email }}</span>

                <form action="/delete-email/{{ $index }}" method="POST">
                  @csrf
                  @method('DELETE') <button type="submit" class="text-xs font-bold text-red-400 hover:text-red-600 transition">
                    DELETE
                  </button>
                </form>
             </li>
            @endforeach
          </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-layout>