<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display all users (active and inactive) for admin management.
     */
    public function index(): View
    {
        $users = User::orderBy('name')->paginate(15);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form to create a new user.
     */
    public function create(): View
    {
        return view('admin.users.create', ['user' => null]);
    }

    /**
     * Store a newly created user.
     */
    public function store(Request $request): RedirectResponse {
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'email'       => ['required', 'email', 'max:255', 'unique:users,email'],
            'phone'       => ['required', 'regex:/^(?:\+?6?01)[0-46-9]-?[0-9]{7,8}$/',],
            'office_no'   => ['nullable', 'string', 'max:50'],
            'password'    => ['required', 'string', 'min:8'],
            'description' => ['nullable', 'string'],
        ]);

        User::create($validated);

        return redirect()->route('admin.users.index')
            ->with('success', 'User "' . $validated['name'] . '" has been created successfully.');
    }

    /**
     * Show the form to edit an existing user.
     */
    public function edit(User $user): View {
        return view('admin.users.create', compact('user'));
    }

    /**
     * Update an existing user.
     */
    public function update(Request $request, User $user): RedirectResponse {
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'email'       => ['required', 'email', 'max:255', 'unique:users,email'],
            'phone'       => ['required', 'regex:/^(?:\+?6?01)[0-46-9]-?[0-9]{7,8}$/',],
            'office_no'   => ['nullable', 'string', 'max:50'],
            'description' => ['nullable', 'string'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $user->update($validated);

        return redirect()->route('admin.users.index')
            ->with('success', 'User "' . $user->name . '" has been updated successfully.');
    }


    /**
     * Delete a user. Prevents deletion if it has pending/approved bookings.
     */
    public function destroy(User $user): RedirectResponse {
        if ($user->is_admin || $user->is_super) {
            return back()->with('error', 'Do not delete "' . $user->name . '" — user is one of the admins. Please set the user inactive instead.');
        }

        $activeBookings = $user->bookings()
            ->whereIn('status', ['pending', 'approved'])
            ->count();

        if ($activeBookings > 0) {
            return back()->with('error', 'Cannot delete "' . $user->name . '" — it has ' . $activeBookings . ' active/pending booking(s). Please reject or cancel those first.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User "' . $user->name . '" has been deleted.');
    }
}
