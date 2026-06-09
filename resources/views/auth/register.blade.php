<x-layout>
    <div class="w-full h-full flex flex-col items-center">
        <form action="/register" method="POST">
            @csrf
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
                <legend class="fieldset-legend">Register</legend>

                <label class="label">Name</label>
                <input type="text" name='name' class="input" placeholder="Your name" required />
                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
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

                <button class="btn btn-neutral mt-4">Register</button>
            </fieldset>
        </form>
    </div>
</x-layout>
