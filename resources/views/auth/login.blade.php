<x-layout>
    <div class="w-full h-full flex flex-col items-center">
        <form action="/login" method="POST">
            @csrf
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
                <legend class="fieldset-legend">Login</legend>
                <label class="label">Email</label>
                @error('email')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <input type="email" name='email' class="input" placeholder="Your Email" required />

                <label class="label">Password</label>
                @error('password')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <input type="password" name='password' class="input" placeholder="Password" required />
                <x-forms.error name='email' />
                <button class="btn btn-neutral mt-4">Log in</button>
            </fieldset>
        </form>
    </div>
</x-layout>
