{{-- Shared form partial for create & edit user --}}

<style>
    /* The switch - the box around the slider */
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    /* Hide default HTML checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>

<!-- User Name -->
<div>
    <label for="name" class="block text-sm font-medium text-slate-300 mb-1.5">
        Name <span class="text-red-400">*</span>
    </label>
    <input type="text" id="name" name="name"
           value="{{ old('name', $user->name ?? '') }}"
           required maxlength="255"
           placeholder="e.g., Lecture Hall A"
           class="w-full rounded-xl border bg-slate-900/50 px-4 py-3 text-sm text-white
                  placeholder:text-slate-500 transition-colors outline-none
                  {{ $errors->has('name') ? 'border-red-500' : 'border-slate-700 focus:border-blue-500' }}">
    @error('name')
        <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
    @enderror
</div>

<!-- Email -->
<div>
    <label for="email" class="block text-sm font-medium text-slate-300 mb-1.5">
        Email <span class="text-red-400">*</span>
    </label>
    <input type="email" id="email" name="email"
           value="{{ old('email', $user->email ?? '') }}"
           required
           placeholder="johndoe@gmail.com"
           class="w-full rounded-xl border bg-slate-900/50 px-4 py-3 text-sm text-white
                  placeholder:text-slate-500 transition-colors outline-none
                  {{ $errors->has('email') ? 'border-red-500' : 'border-slate-700 focus:border-blue-500' }}">
    @error('email')
        <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
    @enderror
</div>

<!-- Phone -->
<div>
    <label for="phone" class="block text-sm font-medium text-slate-300 mb-1.5">
        Phone Number <span class="text-red-400">*</span>
    </label>
    <input type="text" id="phone" name="phone"
           value="{{ old('phone', $user->phone ?? '') }}"
           required
           placeholder="0123456789"
           class="w-full rounded-xl border bg-slate-900/50 px-4 py-3 text-sm text-white
                  placeholder:text-slate-500 transition-colors outline-none
                  {{ $errors->has('email') ? 'border-red-500' : 'border-slate-700 focus:border-blue-500' }}">
    @error('phone')
        <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
    @enderror
</div>

<!-- Office Phone -->
<div>
    <label for="office_no" class="block text-sm font-medium text-slate-300 mb-1.5">
        Ext <span class="text-slate-500">(optional)</span>
    </label>
    <input type="text" id="office_no" name="office_no"
           value="{{ old('office_no', $user->office_no ?? '') }}"
           placeholder="301"
           class="w-full rounded-xl border bg-slate-900/50 px-4 py-3 text-sm text-white
                  placeholder:text-slate-500 transition-colors outline-none
                  {{ $errors->has('office_no') ? 'border-red-500' : 'border-slate-700 focus:border-blue-500' }}">
    @error('office_no')
        <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
    @enderror
</div>

@if (auth()->user()->is_admin)
    <!-- Password -->
    <div>
        <label for="password" class="block text-sm font-medium text-slate-300 mb-1.5">
            {!! $user ? 'New Password <span class="text-slate-500">(optional)</span>' : 'Password <span class="text-red-400">*</span>' !!}
        </label>
        <input type="password" id="password" name="password" {{ $user ? '' : 'required' }}
               class="w-full rounded-xl border bg-slate-900/50 px-4 py-3 text-sm text-white
                  placeholder:text-slate-500 transition-colors outline-none
                  {{ $errors->has('password') ? 'border-red-500' : 'border-slate-700 focus:border-blue-500' }}">
        @error('password')
            <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
        @enderror
    </div>
@endif

<!-- Description -->
<div>
    <label for="description" class="block text-sm font-medium text-slate-300 mb-1.5">
        Description <span class="text-slate-500">(optional)</span>
    </label>
    <textarea id="description" name="description" rows="3"
              placeholder="User's office location, department, etc."
              class="w-full rounded-xl border border-slate-700 focus:border-blue-500
                     bg-slate-900/50 px-4 py-3 text-sm text-white
                     placeholder:text-slate-500 transition-colors outline-none resize-none">{{ old('description', $user->description ?? '') }}</textarea>
    @error('description')
        <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
    @enderror
</div>

<!-- Active Toggle -->
{{--<div class="flex items-center gap-3">--}}
{{--    <label class="text-sm text-slate-300">Status</label>--}}
{{--    <input type="hidden" name="is_active" value="0">--}}
{{--    <input type="checkbox" id="is_active" name="is_active" value="1"--}}
{{--           {{ old('is_active', isset($user) ? $user->is_active : true) ? 'checked' : '' }}--}}
{{--           class="h-4 w-4 rounded border-slate-600 bg-slate-700 text-blue-600 cursor-pointer">--}}
{{--    <label id="status_label" for="is_active" class="text-sm text-slate-300 cursor-pointer">--}}
{{--        {{ old('is_active', isset($user) ? $user->is_active : true) ? 'Active' : 'Inactive' }}--}}
{{--    </label>--}}
{{--</div>--}}

<!-- Active Toggle -->
<div>
    <label for="description" class="block text-sm font-medium text-slate-300 mb-1.5">Status</label>
    <label class="switch">
        <input type="checkbox" id="is_active" name="is_active" value="1"
            {{ old('is_active', isset($user) ? $user->is_active : true) ? 'checked' : '' }}>
        <span class="slider round"></span>
    </label>
</div>

